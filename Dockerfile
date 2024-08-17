FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libgif-dev \
    libjpeg-dev  # Add this line

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get specific Composer version
COPY --from=composer:2.2.11 /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u 1000 -d /home/user user
RUN mkdir -p /home/user/.composer && \
    chown -R user:user /home/user

# Set working directory
WORKDIR /var/www/html

USER user
