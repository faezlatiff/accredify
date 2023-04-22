<a id="readme-top"></a>
<!-- TABLE OF CONTENTS -->
## Table of Contents
  <ol>
    <li><a href="#prerequisites">Pre-requisites</a></li>
    <li><a href="#deployment">Deployment</a></li>
    <li><a href='#installation'>Installation</a></li>
  </ol>
  
## Accredify REST API

<p>
A REST API with Laravel where an authenticated user sends a JSON and receives a verification result as a JSON response.
</p>

## About the Contributor

| Name | Official email | Personal email |
| :--: | :------------: | :------------: |
| Muhammad Faez Bin Abdul Latiff | muhammadal.2021@scis.smu.edu.sg | faezlatiff0706@gmail.com |

## Prerequisites
* XAMPP (to run Apache and MySQL)
* PHP
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
    
## Installation

### Clone

## Deployment
1. Clone the github repository to your local machine using `https://github.com/faezlatiff/accredify.git`
2. Run the application
    a. Open the ```CMD``` terminal and navigate to the root directory of the app
    b. Run the following commands on the terminal:
        ```
        php artisan migrate
        php artisan serve
        ```
3. Test the REST API
    a. Open Postman and import ```Accredify.postman_collection.json``` file
    b. Test the API by sending requests from the collection

<br/>

```
<p align="right">(<a href="#readme-top">back to top</a>)</p>
