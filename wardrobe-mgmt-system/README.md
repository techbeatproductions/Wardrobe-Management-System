# Wardrobe Management System

Wardrobe Management System is a web app built with **Vue 3** and **Laravel 11** for managing clothing items.

## 🚀 Features
- User Authentication
- Add, Edit, Delete Clothes
- Search & Filter Options
- Responsive Design
- Admin & User Roles

## 📦 Installation
1. **Clone the Repository**  
   
   git clone https://github.com/techbeatproductions/Wardrobe-Management-System
   cd wardrobe-mgmt-system

2. **Install dependencies**
   composer install
   npm install

3. **Setup the environment**
   cp .env.example .env
   php artisan key:generate

4.**Setup the database environment in the .env file**
    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE="Your Database Name"
    DB_USERNAME="Your Username"
    DB_PASSWORD="Your password"

4. **Run the application**
   php artisan migrate
   php artisan serve
   npm run build
   Access the system in your browser on localhost:8000

🎉 Usage
  1.Register as a user.
  2.Add & organize wardrobe items.
  3.Use filters to search for specific clothes.
  4.Edit or delete items as needed.

📜 License
  This project is licensed under the MIT License.