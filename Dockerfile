# Use an official PHP runtime as a parent image
FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libicu-dev \
    libxml2-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql intl opcache

# Install Composer (PHP dependency manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www
WORKDIR /var/www

# Copy the current directory contents into the container
COPY . /var/www

# Install Symfony CLI globally
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Install Symfony dependencies
RUN composer install --no-scripts --no-autoloader

# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]

