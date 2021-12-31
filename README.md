# SIMPEMBUK

## Minimun Requirements
- PHP v8.0.8

  

## How To Run This
- Clone this repository
- Run command `composer install`
- Copy `.env.example`and, rename it to `.env`
- Fill `.env`with your database information eg: user, password, and database name
- Run command `php artisan migrate`
- Run command `php artisan db:seed --class=UserSeeder`
- Run command `php artisan serve`