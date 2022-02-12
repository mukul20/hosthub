# Hosthub
API to check availability of hotel rooms.

# Quick Installation
### Requirements
Composer, PHP 8.1 or greator.
Clone or download the repository.
```sh
git clone https://github.com/mukul20/hosthub.git
```
Switch to the repo folder
```sh
cd hosthub
```
Install all the dependencies using composer
```sh
composer install
```
### Environment variables
Copy `.env.example` file to `.env` file 
```sh
cp .env.example .env
```
### Database
Setup database credentials in .env file.
Migrate database tables
```sh
php artisan migrate
```
Seed database
```sh
php artisan db:seed
```
***
# Running Web Application
Use below artisan command to start the application
```sh
php artisan serve
```
Ideally application should get hosted on http://127.0.0.1:8000/
***
# Consuming API's
Hit below GET API in Postman or browser
http://127.0.0.1:8000/api/v1/checkAvailability?checkin=2022-02-15&checkout=2022-02-28
***
# Code overview
* `.env` - Environment variables can be set in this file.
### Folders
* `app/Http/Controllers/API/v1` - Contains all the API controllers
* `app/Utility` - Helper classes
* `database/migrations` - Contains database migrations
* `database/seeders` - Contains db seeds and database.sql file
* `routes/api/v1` - Contains all the api routes defined in api.php file
* `tests` - Contains all test cases for the application
* `tests/Feature` - Contains all the API tests
### Running Test Cases

```sh
php artisan test
```