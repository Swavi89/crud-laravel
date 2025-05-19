# Use PHP 8.2 FPM Alpine as the base image
FROM php:8.2-fpm-alpine as base

# Install system dependencies
RUN apk add --no-cache \
    linux-headers \
    bash \
    nodejs \
    npm \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql bcmath exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory
COPY . .

# Install dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Production stage
FROM base as production

# Copy only necessary files from base stage
COPY --from=base /var/www/html /var/www/html
COPY --from=base /usr/bin/composer /usr/bin/composer

# Expose port 8000
EXPOSE 8000

# Start PHP-FPM
CMD ["php-fpm"]
