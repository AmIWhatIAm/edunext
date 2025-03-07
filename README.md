# Laravel Project Setup Guide

## Prerequisites
Make sure you have the following installed on your system:
- PHP (>=8.0 recommended)
- Composer
- MySQL or any other compatible database
- Node.js & npm (if frontend assets need to be compiled)
- Laravel CLI (optional but helpful)
- Web server (Apache, Nginx, or Laravel's built-in server)

## Setup Instructions

### 1. Clone the Repository
```sh
git clone https://github.com/AmIWhatIAm/awad-edunext.git
cd awad-edunext
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Set Up Environment Variables
Copy the example `.env` file and update the necessary configurations:
```sh
cp .env.example .env
```
Generate the application key:
```sh
php artisan key:generate
```

### 4. Configure Database
Update the `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
Then, migrate the database:
```sh
php artisan migrate --seed
```

### 5. Set Permissions
Ensure the `storage` and `bootstrap/cache` directories are writable:
```sh
chmod -R 777 storage bootstrap/cache
```

### 6. Run the Development Server
You can start the Laravel development server using:
```sh
php artisan serve
```
By default, the application will be accessible at:
```
http://127.0.0.1:8000
```

## Troubleshooting
If you encounter any issues:
- Run cache clear commands:
  ```sh
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

## License
This project is an assignment, it doesn't have any license :)
