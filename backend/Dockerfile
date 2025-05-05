# FROM php:8.2-fpm

# # Install dependencies
# RUN apt-get update && apt-get install -y \
#     libzip-dev zip unzip git curl \
#     && docker-php-ext-install pdo_mysql zip bcmath

# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Set working directory
# WORKDIR /var/www

# # Copy composer files first (để cache composer install khi code không đổi)
# COPY composer.json composer.lock ./

# # Install Laravel dependencies
# RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist

# # Copy toàn bộ source code
# COPY . .

# # Copy custom PHP config (ví dụ opcache)
# COPY ./php.ini /usr/local/etc/php/conf.d/opcache.ini

# # Laravel sẽ chạy bằng built-in server trong container
# CMD php artisan serve --host=0.0.0.0 --port=8000


FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer manifest files for caching
COPY composer.json composer.lock ./

# Install Laravel dependencies
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader

# Copy the rest of the application code
COPY . .

# Copy custom PHP config (e.g., opcache)
COPY ./php.ini /usr/local/etc/php/conf.d/opcache.ini

# Expose port for built-in PHP server
EXPOSE 8000

# Start Laravel using built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
