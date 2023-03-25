FROM php:8.0-apache

RUN apt-get update -y --fix-missing && \
    apt-get install -y zlib1g-dev libzip-dev && \
    docker-php-ext-install zip pdo pdo_mysql mysqli && \
    apt-get clean && apt-get autoremove -y && apt-get autoclean -y && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY . /var/www/html

WORKDIR /var/www/html

RUN a2enmod rewrite && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf

CMD ["apache2-foreground"]

EXPOSE 80
