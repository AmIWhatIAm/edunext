# EduNext: Study Resource Sharing Platform
# Project Description
The EduNext Study Resource Sharing Platform aims to offer students and lecturers a simple and effective way to manage educational content. Lecturers can upload and arrange study materials, such as textbooks and practice files, which are subsequently made available to students depending on their preferred courses. Students may simply browse and interact with various resources, and the platform will track their activity to provide insights into their engagement. The platform allows users to update their personal information, and all activities, including profile modifications, are logged for future reference. Furthermore, the system guarantees that uploaded content is properly managed, including updates and the deletion of old materials. Access to features is strictly monitored, with students and instructors granted role-specific rights to guarantee proper use. The software also provides tailored experience by remembering the user's last visited subject. Overall, EduNext promotes a secure, user-friendly environment for sharing and managing educational resources. Hence, these features enhance the learning experience for both students and educators.

# Features List

## Authentication & User Management
- **Multi-Guard Authentication**: Separate authentication systems for students and lecturers
- **Role-Based Registration**: Users can register as either students or lecturers
- **Profile Management**: Users can update their personal information and preferences
- **Session Management**: Secure session handling with browser-close expiry option
- **Remember Me**: Optional persistent login functionality

## Lecturer Features
- **Chapter Management**:
  - Create new educational chapters with detailed information
  - Upload PDF study materials for each chapter
  - Edit existing chapter details and materials
  - Delete outdated or unnecessary content
- **Content Organization**: Organize educational content by subject categories
- **Activity Tracking**: View comprehensive logs of personal activities
- **Sidebar Navigation**: Quick access to created content organized by subject

## Student Features
- **Content Access**: Browse and access educational resources by subject
- **Material Download**: View and download PDF learning materials
- **Learning Progress**: Track time spent on different subjects
- **Activity History**: View personal learning activity logs
- **Subject Filtering**: Filter content by specific subjects of interest

## Shared Features
- **Subject-Based Organization**: All content is categorized by academic subjects
- **User Dashboard**: Personalized dashboard showing relevant information based on role
- **Activity Logging**: Comprehensive tracking of user actions (login, content interaction, etc.)
- **Flash Notifications**: System feedback through intuitive flash messages
- **Responsive Design**: User interface adapts to different screen sizes

## Security & Access Control
- **Role-Based Authorization**: Strict access control based on user roles
- **CSRF Protection**: Protection against cross-site request forgery attacks
- **Validation**: Comprehensive input validation for all forms
- **Secure File Handling**: Proper management of uploaded educational materials
- **Error Handling**: User-friendly error messages and logging

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

### 5. Create Storage Symlink
This web application uses symlinks and filesystems. To make sure file features work, run:
```sh
php artisan storage:link
```

### 6. Set Permissions
Ensure the `storage` and `bootstrap/cache` directories are writable:
```sh
chmod -R 777 storage bootstrap/cache
```

### 7. Compiling frontend assets
You can compile the frontend assets using:
```sh
npm run dev
```
Then wait for Laravel Mix to finish the webpack compilation.

OR additionally to compile automatically on change, run
```sh
npm run watch
```

### 8. Run the Development Server
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

# Login credentials for demo accounts
## Lecturer Account
- **Email**: lecturer@edu.com
- **Password**: password123
- **Name**: Dr. James Wilson
- **Role**: Lecturer

## Student Account
- **Email**: student@edu.com
- **Password**: password123
- **Name**: Sarah Johnson
- **Role**: Student

These accounts will be available after running the database seeding process (`php artisan migrate:fresh --seed`).