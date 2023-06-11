## Docs
- Pysical Data Model & Activity Diagram : [Click Me !](https://docs.google.com/document/d/1ALkVPO7FcCKCvSw1rb02NmhzGeV-4pUvZ5GIHtA-WqY/edit)

## Configuration
- Laravel Framework : 10.13.2
- Mysql Version : 10.4.27-MariaDB - mariadb.org binary distribution
- PHP version : 8.1.12 (cli) 

## Installation

Follow these steps to run project locally:

1. Clone the repository: 
2. Navigate to the project directory:
3. run composer install on project directory
4. run npm install on project directory
5. Copy the `.env.example` file to `.env` : cp .env.example .env 
6. Generate a unique application key: php artisan key:generate
7. Make Database
8. Configure your database settings in the `.env` file.
9. Run the database migrations: php artisan migrate
10. Run the seeder : php artisan db:seed
11. Run the project : npm run dev && php artisan serve



User Name & Password :
- Super Admin : 'email' => 'superadmin@mail.com', 'password' => admin,
- Manager : 'email' => 'manager@mail.com', 'password' => 'manager',
- Officer : 'email' => 'officer@mail.com' , 'password' => 'officer',
- Admin Site : 'email' => 'adminsite@mail.com' , 'password' => 'adminsite1',
    
    

            
          
