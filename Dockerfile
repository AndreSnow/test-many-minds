FROM php:8.0-apache

RUN apt-get update -y --fix-missing && \
    apt-get install -y zlib1g-dev libzip-dev curl gnupg && \
    docker-php-ext-install zip pdo pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    apt-get clean && apt-get autoremove -y && apt-get autoclean -y && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY . /var/www/html

WORKDIR /var/www/html

RUN a2enmod rewrite headers ssl && \
    service apache2 restart

EXPOSE 80
