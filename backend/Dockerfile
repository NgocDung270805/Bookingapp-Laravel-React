FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql pgsql zip bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files first (để cache composer install khi code không đổi)
COPY composer.json composer.lock ./

# Install Laravel dependencies
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist

# Copy toàn bộ source code
COPY . .

# Laravel sẽ chạy bằng built-in server trong container
CMD php artisan serve --host=0.0.0.0 --port=8000
