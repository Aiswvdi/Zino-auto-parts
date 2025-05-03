FROM node:20-alpine AS node

WORKDIR /var/www
COPY package.json package-lock.json ./
RUN npm install && npm run production
RUN cp -R public/build public/css public/js /var/www/public/

FROM phpswoole/swoole:php8.3-alpine

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

WORKDIR /var/www

COPY . .
COPY --from=node /var/www/public /var/www/public

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/public \
    && chmod -R 755 /var/www/public

RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan view:clear \
    && php artisan route:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
