FROM php:8.0-fpm

RUN apt-get update && apt-get install -y git unzip

# Install PHP MySQL extensions
RUN docker-php-ext-install pdo_mysql

# Install composer command
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000
