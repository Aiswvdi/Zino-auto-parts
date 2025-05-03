FROM phpswoole/swoole:php8.3-alpine AS builder

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

# 2. Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# 3. Copy only what's needed for composer install
COPY composer.json composer.lock ./

# 4. Install dependencies (run as root first to avoid permission issues)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --no-scripts

# 5. Copy the rest of the application
COPY . .

# 6. Run composer scripts with artisan available
RUN composer run-script post-autoload-dump

# 7. Create production image
FROM phpswoole/swoole:php8.3-alpine

# 8. Copy only necessary files from builder
COPY --from=builder /var/www /var/www

# 9. Create and configure non-root user
RUN addgroup -g 1000 laravel && \
    adduser -u 1000 -G laravel -s /bin/sh -D laravel && \
    chown -R laravel:laravel /var/www

WORKDIR /var/www

# 10. Set proper permissions
RUN chmod -R 775 storage bootstrap/cache

# 11. Optimize Laravel (run as root)
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan storage:link

# 12. Switch to non-root user for runtime
USER laravel

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
