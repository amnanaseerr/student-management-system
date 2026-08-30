@echo off
echo ============================================
echo  Student Management System - Setup
echo ============================================

echo.
echo [1/6] Installing PHP dependencies (Composer)...
call composer install

echo.
echo [2/6] Installing frontend dependencies (npm)...
call npm install

echo.
echo [3/6] Setting up environment file...
if not exist .env (
    copy .env.example .env
)

echo.
echo [4/6] Generating application key...
call php artisan key:generate

echo.
echo [5/6] Running database migrations...
call php artisan migrate

echo.
echo [6/6] Building frontend assets...
call npm run build

echo.
echo ============================================
echo  Setup complete!
echo  Run: php artisan serve
echo  Then open http://127.0.0.1:8000
echo ============================================
pause
