FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libexif-dev \
    libssl-dev \
    supervisor \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring zip exif

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN apt-get clean && rm -rf /tmp/* /var/tmp/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN composer install

RUN php artisan migrate

COPY worker.conf /etc/supervisor/conf.d/worker.conf


