FROM phpswoole/swoole:php8.3-alpine AS builder

# 1. Install system dependencies with explicit pcntl enable
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
    libmcrypt-dev

# 2. Explicitly install and enable pcntl
RUN docker-php-ext-install \
    pdo_mysql \
    zip \
    intl \
    pcntl \
    opcache \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# 3. Verify pcntl is enabled
RUN php -m | grep pcntl

# 4. Create custom php.ini to ensure pcntl functions aren't disabled
RUN echo "disable_functions =" > /usr/local/etc/php/conf.d/custom.ini && \
    echo "pcntl.alarm=1" >> /usr/local/etc/php/conf.d/custom.ini && \
    echo "pcntl.signal=1" >> /usr/local/etc/php/conf.d/custom.ini

# 5. Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# 6. Copy only what's needed for composer install
COPY composer.json composer.lock ./

# 7. Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --no-scripts

# 8. Copy the rest of the application
COPY . .

# 9. Run composer scripts with artisan available
RUN composer run-script post-autoload-dump

# 10. Create production image
FROM phpswoole/swoole:php8.3-alpine

# 11. Copy PHP configuration from builder
COPY --from=builder /usr/local/etc/php/conf.d/custom.ini /usr/local/etc/php/conf.d/

# 12. Copy application from builder
COPY --from=builder /var/www /var/www

# 13. Create and configure non-root user
RUN addgroup -g 1000 laravel && \
    adduser -u 1000 -G laravel -s /bin/sh -D laravel && \
    chown -R laravel:laravel /var/www

WORKDIR /var/www

# 14. Set proper permissions
RUN chmod -R 775 storage bootstrap/cache

# 15. Verify pcntl in final image
RUN php -m | grep pcntl

# 16. Optimize Laravel
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan storage:link

# 17. Switch to non-root user for runtime
USER laravel

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
