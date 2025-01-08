# Property Search Application

A Laravel + Vue.js application for searching properties with various filters.

## Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js 16+ and npm
- MySQL 5.7+

## Installation

1. Clone the repository

git clone <repository-url>
cd <project-folder>

2. Install PHP dependencies

composer install

3. Install JavaScript dependencies

npm install

4. Environment Setup

cp .env.example .env
php artisan key:generate

5. Configure your database in .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=property_search
DB_USERNAME=your_username
DB_PASSWORD=your_password

6. Run migrations and seed the database

php artisan migrate:fresh --seed

## Running the Application

1. Start the Laravel development server

php artisan serve

2. In a separate terminal, start the Vite development server

npm run dev

3. Visit http://localhost:8000 in your browser

## Running Tests

### PHP Tests

php artisan test

### JavaScript Tests

npm run test

## Features

- Property search by multiple criteria:
  - Name
  - Number of bedrooms
  - Number of bathrooms
  - Number of storeys
  - Number of garages
  - Price range

- Real-time validation
- Responsive design
- Error handling

## Tech Stack

- Laravel 10
- Vue 3
- Element Plus
- Vite
- MySQL
- PHPUnit for PHP testing

## Project Structure

app/
  Http/
    Controllers/
      Api/
    Requests/
      Api/
  Models/
resources/
  js/
    components/
    composables/
    constants/
    services/
tests/
  Feature/
  Unit/

## Contributing

1. Create a new branch
2. Make your changes
3. Submit a pull request

## License

[MIT License](LICENSE.md)
