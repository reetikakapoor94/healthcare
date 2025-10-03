# Healthcare Appointment Booking API (Laravel)

A RESTful API built with **Laravel** and **MySQL** that allows users to register, login, and manage healthcare appointments.  
The API supports user authentication, professional availability checks, appointment booking, cancellation with constraints, and viewing appointments.

---

## 🚀 Features
- User Registration & Login (JWT Authentication)
- List all Healthcare Professionals
- Book an Appointment (with availability validation)
- View User Appointments
- Cancel Appointments (not allowed within 24 hours of start time)
- Mark Appointment as Completed
- Prevents Double Booking for Professionals
- Input Validation for Appointments
- Seeders for Initial Data

---

## 🛠️ Tech Stack
- **Laravel 10+**
- **PHP 8.1+**
- **MySQL 8**
- **JWT (tymon/jwt-auth)**
- **Docker & Docker Compose** (optional)

---

## 📂 Project Setup

### 1. Clone Repository
```bash
git clone https://github.com/reetikakapoor94/healthcare.git


### 2. Install Dependencies
composer install

### 3. Environment Setup
cp .env.example .env
php artisan key:generate

Create database in phpmyadminwith name(healthcare_api)
Update .env with your database connection:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=healthcare_api
DB_USERNAME=root
DB_PASSWORD=

### 4. Run Migrations & Seeders
php artisan migrate --seed

### 5. Install JWT & Generate Secret
composer require tymon/jwt-auth
php artisan jwt:secret

6. Start Server
php artisan serve


API will run at:
👉 http://127.0.0.1:8000






