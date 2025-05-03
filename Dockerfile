FROM phpswoole/swoole:php8.3-alpine

# 1. Install system dependencies
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
    opcache \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# 2. Create and configure non-root user
RUN addgroup -g 1000 laravel && \
    adduser -u 1000 -G laravel -s /bin/sh -D laravel && \
    mkdir -p /var/www/storage /var/www/bootstrap/cache && \
    chown -R laravel:laravel /var/www

# 3. Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer

WORKDIR /var/www

# 4. Copy only what's needed for composer install
COPY --chown=laravel:laravel composer.json composer.lock ./

# 5. Install dependencies as non-root user
USER laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# 6. Switch back to root for system operations
USER root

# 7. Copy the rest of the application
COPY --chown=laravel:laravel . .

# 8. Set proper permissions
RUN chown -R laravel:laravel /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# 9. Optimize Laravel
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan storage:link

# 10. Switch to non-root user for runtime
USER laravel

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
