FROM composer:2.0 as vendor

COPY app/composer.* /app/

RUN composer install \
    --no-dev \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --optimize-autoloader \
    --prefer-dist

FROM php:8.0-fpm
RUN apt-get update && apt-get install -y \
    bash \
    vim \
    libicu-dev \
    libzip-dev \
    git \
    unzip \
&& rm -rf /var/lib/apt/lists/*

RUN NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    docker-php-ext-install -j${NPROC} intl pdo_mysql zip
RUN pecl install xdebug
COPY docker/php/shared_files/copy/ /

COPY app/ /app
COPY --from=vendor /app/vendor/ /app/vendor
WORKDIR /app
