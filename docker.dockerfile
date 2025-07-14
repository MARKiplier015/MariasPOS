FROM php:8.2-apache

# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copy your project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html
