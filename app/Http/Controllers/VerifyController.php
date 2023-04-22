<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use PDOException;

class VerifyController extends Controller
{
    public function verify(Request $request){

        $data = $request->input('data');
        $signature = $request->input('signature');
        $issuerKey = $data['issuer']['identityProof']['key'];
        $dnsLocation = $data['issuer']['identityProof']['location'];
        $dnsRecords = dns_get_record($dnsLocation, DNS_TXT);
        $validIssuer = False;
        $userId = $data['id'];
        $fileType = 'JSON';

        if (!isset($data['recipient']['name']) || !isset($data['recipient']['email'])) {
            $result = [
                'data' => [
                    'issuer' => $data['issuer']['name'],
                    'result' => "invalid_recipient"
                ]
            ];
            $this->addToDatabase($result, $userId, $fileType);
            return response()->json($result, 200);
        }

        if (!isset($data['issuer']['name']) || !isset($data['issuer']['identityProof']) || !$dnsRecords) {
            $result = [
                'data' => [
                    'issuer' => $data['issuer']['name'],
                    'result' => "invalid_issuer"
                ]
            ];
            $this->addToDatabase($result, $userId, $fileType);
            return response()->json($result, 200);
        }

        foreach ($dnsRecords as $record) {
            if(str_contains($record['txt'],$issuerKey)){
                $validIssuer = True;
            } 
        }
 
        if($validIssuer){
            $prepDataForHash = array(
                "id" => $data['id'],
                "name" => $data['name'],
                "recipient.name" => $data['recipient']['name'],
                "recipient.email"=> $data['recipient']['email'],
                "issuer.name"=> $data['issuer']['name'],
                "issuer.identityProof.type"=> $data['issuer']['identityProof']['type'],
                "issuer.identityProof.key"=> $issuerKey,
                "issuer.identityProof.location"=> $dnsLocation,
                "issued"=> $data['issued']
            );

            $firstHash = [];
            foreach($prepDataForHash as $key => $value){
                $toHash = "{\"{$key}\":\"{$value}\"}";
                $firstHash[] = hash('sha256',$toHash);
            }

            sort($firstHash);
            $toHashAgain = "[";
            for($i=0;$i<count($firstHash);$i++){
                $hashItem = $firstHash[$i];
                if($i+1 != count($firstHash)){
                    $toHashAgain =  "{$toHashAgain}\"{$hashItem}\",";
                } else {
                    $toHashAgain =  "{$toHashAgain}\"{$hashItem}\"";
                }
            }
         
            $toHashAgain = "{$toHashAgain}]";
            $finalHash = hash('sha256', $toHashAgain);

            if($finalHash == $signature['targetHash']){
                $result = [
                    'data' => [
                        'issuer' => $data['issuer']['name'],
                        'result' => "verified"
                    ]
                ];
                $this->addToDatabase($result, $userId, $fileType);
                return response()->json($result, 200);
            } else {
                $result = [
                    'data' => [
                        'issuer' => $data['issuer']['name'],
                        'result' => "invalid_signature"
                    ]
                ];
                $this->addToDatabase($result, $userId, $fileType);
                return response()->json($result, 200);
            }
        } 
        
        else {
            $result = [
                'data' => [
                    'issuer' => $data['issuer']['name'],
                    'result' => "invalid_issuer"
                ]
            ];
            $this->addToDatabase($result, $userId, $fileType);
            return response()->json($result, 200);
        }
    }

    public function addToDatabase(array $result, string $userId, string $fileType){
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'accredify';

        $verificationResult = $result['data']['result'];

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: {$e->getMessage()}";
            return false;
        }
        
        $sql = "INSERT INTO verifications (user_id, file_type, verification_result) VALUES (:userId, :fileType, :verificationResult)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':fileType', $fileType);
        $stmt->bindParam(':verificationResult', $verificationResult);
        
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error inserting data: {$e->getMessage()}";
            return false;
        }
    }
}

    

