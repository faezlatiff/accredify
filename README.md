<a id="readme-top"></a>

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
1. Open Postman and import ```Accredify.postman_collection.json``` file
2. Test the API by sending requests from the collection

<br/>

<p align="right">(<a href="#readme-top">back to top</a>)</p>
