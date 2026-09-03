FROM php:8.4-cli

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y \
        git \
        unizip \
        libqp-dev \
    && docker-php-ext-install pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

    COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
