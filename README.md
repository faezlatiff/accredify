<a id="readme-top"></a>

# Accredify REST API
<p>
A REST API with Laravel where an authenticated user sends a JSON and receives a verification result as a JSON response.
</p>

## About the Contributor

| Name | Official email | Personal email |
| :--: | :------------: | :------------: |
| Muhammad Faez Bin Abdul Latiff | muhammadal.2021@scis.smu.edu.sg | faezlatiff0706@gmail.com |
## Documentation
Please take a look at <a href="https://polar-operation-cfc.notion.site/Accredify-API-Documentation-006c7a294daa4f4293b29d5cc0de4a2b">this link</a> for information on how to use the REST API. </br>
If the above link does not work, try <a href="https://drive.google.com/file/d/17yn6JuWQStWsAEPZfrm-yReyGizj6Etv/view?usp=share_link">this link</a> instead. 

## Prerequisites
* XAMPP (to run Apache and MySQL)
* PHP
* Composer
* Laravel
* Postman (for testing)
* Database configurations
    * Create a database ```accredify``` on phpmyadmin
    * Change database values in .env file in root directory of app
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1    //according to your host
        DB_PORT=3306         //according to your port
        DB_DATABASE=accredify
        DB_USERNAME=root     //your username for phpmyadmin
        DB_PASSWORD=         //your password for phpmyadmin
        ```
    * Change ```$username``` and ```$password``` in App/Http/Controllers/VerifyController.php

## Deployment
1. Clone the github repository to your local machine using `https://github.com/faezlatiff/accredify.git`
2. Open the ```CMD``` terminal and navigate to the root directory of the app
3. Run the following commands on the terminal:
    ```
    composer install
    php artisan migrate
    php artisan serve
    ```
## Testing
1. Open Postman and import ```Accredify.postman_collection.json``` file found in root directory of the application
2. Test the API by sending requests from the collection

<br/>

<p align="right">(<a href="#readme-top">back to top</a>)</p>
