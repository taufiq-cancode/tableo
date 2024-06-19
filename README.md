This README provides step-by-step instructions to set up and test the application. Follow the steps below to get your application up and running!

## Prerequisites
- PHP >= 7.3
- Composer
- MySQL
- Git (if cloning from a repository)

## Step 1: Clone the Repository or Unzip the File

### If you have a zipped file:
1. Unzip the file into your desired directory.

### If you are cloning from a Git repository:
```bash

git clone https://github.com/table.git
cd your-repository

```
## Step 2: Install Dependencies
- Run `composer install` to install dependencies needed by the application

## Step 3: Setup .env file
- Rename the .env.example file to .env or simply run the command `cp .env.example .env`

## Step 4: Generate the application key
- Run the command `php artisan key:generate` to generate the application key

## Step 5: Configure the database
- Create a database on your system
- Open the .env file and update the database configuration to match your setup:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

## Step 6: Run Migrations and Seeders
- Run the database migrations to create the tables:
`php artisan migrate`

## Step 7: Seed database
- Seed the database with initial data using the command
`php artisan db:seed --class=InitialSeeder`

## Step 8: Serve the Application
Serve the application using the built-in PHP server:
`php artisan serve`

## Step 9:
- You can now access your application at http://localhost:8000.

Navigate through the application to list restaurants, view tables, and create new tables.

## Conclusion
You have successfully set up and tested the Laravel application.