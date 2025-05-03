FROM phpswoole/swoole:php8.3-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    curl \
    libzip-dev \
    oniguruma-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxml2-dev \
    icu-dev \
    zlib-dev \
    libmcrypt-dev \
    && docker-php-ext-install \
    pdo_mysql \
    zip \
    intl \
    pcntl \
    opcache

# Create a non-root user
RUN addgroup -g 1000 laravel && \
    adduser -u 1000 -G laravel -s /bin/sh -D laravel

# Install Composer as a non-root user
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# Copy composer files first for better layer caching
COPY --chown=laravel:laravel composer.json composer.lock ./

# Install dependencies as non-root user
USER laravel
RUN composer install --no-dev --optimize-autoloader

# Switch back to root for system operations
USER root

# Copy the rest of the application
COPY --chown=laravel:laravel . .

# Set proper permissions
RUN chown -R laravel:laravel /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Optimize Laravel
RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan view:clear \
    && php artisan route:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link

# Switch to non-root user for runtime
USER laravel

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
