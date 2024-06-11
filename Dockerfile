FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html/app/

# Set environment variables
ARG user=jmontes
ARG uid=1000

# Create a new user and set permissions
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl 

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd ctype fileinfo

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && apt-get install -y nodejs

# Change to the Laravel project directory
WORKDIR /var/www/html/app

# Copy the project content to the working directory
COPY . /var/www/html/app

# Set permissions for storage/logs directory
RUN chmod -R 777 /var/www/html/app/storage && \
    chown -R www-data:www-data /var/www/html/app/storage

# Expose port for PHP-FPM
EXPOSE 9000

# Default command to start PHP-FPM
CMD ["php-fpm"]
