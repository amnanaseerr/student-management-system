STUDENT MANAGEMENT SYSTEM 
================================================
Submitted by: Amna Naseer
Week 3 Submission (Days 11-15)

PROJECT OVERVIEW
-----------------
A Laravel-based Student Management System with:
- Public pages (home, about, courses, contact)
- Student & Course management with full CRUD
- Authentication (Laravel Breeze - login/register)
- Role-based access control (admin vs regular users)
- Student profile photo upload
- Search and pagination on the student list

TECH STACK
-----------
- Laravel 12 / PHP 8.2
- SQLite database
- Blade templates + Tailwind CSS
- Laravel Breeze (authentication)

SETUP INSTRUCTIONS
--------------------
Requirements: PHP 8.2+, Composer, Node.js, XAMPP (or any local server)

1. Extract this folder.
2. Run "install.bat" (double-click it), OR run these commands manually:
     composer install
     npm install
     copy .env.example .env
     php artisan key:generate
     php artisan migrate
     npm run build
3. Start the server:
     php artisan serve
4. Open http://127.0.0.1:8000 in your browser.

DEFAULT LOGIN
--------------
Register a new account from the /register page.
To test admin features, open Tinker and set a user's role to admin:
     php artisan tinker
     $u = App\Models\User::first();
     $u->role = 'admin';
     $u->save();

FOLDER STRUCTURE NOTES
------------------------
- app/        : Models, Controllers, Middleware
- database/   : Migrations
- resources/  : Blade views
- routes/     : web.php (all app routes) and auth.php (Breeze auth routes)
