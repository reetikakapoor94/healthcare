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
git clone https://github.com/your-username/healthcare-appointment-api.git
