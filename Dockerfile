FROM php:8.2-cli

# System dependencies + PHP extensions Laravel needs
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql zip gd mbstring \
    && apt-get clean

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Storage symlink (safe to fail on rebuilds where it already exists)
RUN php artisan storage:link || true

# Render sets $PORT at runtime; default to 10000 for local testing
EXPOSE 10000

CMD php artisan migrate --force && php artisan config:cache && php artisan serve --host 0.0.0.0 --port ${PORT:-10000}
