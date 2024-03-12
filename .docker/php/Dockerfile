FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && \
    docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html
