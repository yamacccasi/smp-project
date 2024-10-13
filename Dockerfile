
FROM php:8.2-fpm


RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install zip pdo pdo_mysql


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www


COPY . .


RUN composer install


RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache


