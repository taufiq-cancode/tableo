# Tableo Restaurant Tables Management App

This Laravel application manages restaurants, dining areas, and tables. It allows users to view and create tables, associate them with restaurants and dining areas, and filter active tables.

## Prerequisites

- PHP >= 8.0
- Composer
- Laravel 9
- MySQL or SQLite
- Node.js & NPM (optional, for front-end dependencies)

## Setup Instructions

### Step 1: Clone the repository

```bash
git clone https://github.com/taufiq-cancode/tableo.git
cd tableo
```

### Step 2: Install dependencies

```bash
composer install
```

### Step 3: Set up environment variables

Copy the `.env.example` file to `.env` and modify it to match your local environment.

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### Step 4: Configure the database

Update the `.env` file with your database credentials. For example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### Step 5: Run migrations

```bash
php artisan migrate
```

### Step 6: Seed database
Seed the database with initial data using the command:

```bash
php artisan db:seed --class=InitialSeeder
```

### Step 7: Running Tests
To run the PHPUnit tests included with Laravel, use the following command:

``` bash
php artisan test
```

This command will execute all tests located in the tests/ directory.

### Step 8: Install front-end dependencies (optional)

If you plan to modify the front-end, you may want to install Node.js dependencies:

```bash
npm install
npm run dev
```

### Step 9: Serve the application

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

## Testing the Application

### Viewing Restaurants

Navigate to `http://localhost:8000/restaurants` to view the list of restaurants.

### Viewing Tables for a Restaurant

Navigate to `http://localhost:8000/restaurants/{restaurant_id}/tables` to view all tables for a specific restaurant.

### Viewing Active Tables for a Restaurant

Navigate to `http://localhost:8000/restaurants/{restaurant_id}/active-tables` to view all active tables for a specific restaurant, grouped by dining area.

### Creating a New Table

Navigate to `http://localhost:8000/tables/create` to access the table creation form. Fill out the form and submit to create a new table.

### Searching for Dining Areas

As you type in the "Dining Area" input field on the table creation form, a dropdown will appear with matching dining areas. If matching dining areas don't exist, the new dining area would be created.

## Routes

### Web Routes

- `GET /restaurants`: View all restaurants.
- `GET /restaurants/{restaurant}/tables`: View tables for a specific restaurant.
- `GET /restaurants/{restaurant}/active-tables`: View active tables for a specific restaurant.
- `GET /tables/create`: View the form to create a new table.
- `POST /tables`: Store a new table.
- `GET /dining-areas`: Search for dining areas.

## Additional Information

### Models

- **DiningArea**: Represents a dining area.
- **Restaurant**: Represents a restaurant.
- **Table**: Represents a table in a restaurant.

### Controllers

- **RestaurantController**: Handles viewing restaurants and their tables.
- **TableController**: Handles creating tables, viewing active tables, and searching for dining areas.

### Views

- **restaurants.index**: Displays the list of restaurants.
- **restaurants.tables**: Displays tables for a specific restaurant.
- **restaurants.active_tables**: Displays active tables for a specific restaurant.
- **tables.create**: Displays the form to create a new table.

### Blade Templates

The application uses Blade templates for rendering HTML views. These templates are located in the `resources/views` directory.

## Troubleshooting

- Ensure your `.env` file is properly configured.
- Verify that the database migrations have been run.
- Check for any errors in the Laravel logs (`storage/logs/laravel.log`).

This README file provides comprehensive setup and testing instructions for the Laravel application, covering the essential aspects, including dependencies, environment configuration, database setup, routes, and interaction with the application.