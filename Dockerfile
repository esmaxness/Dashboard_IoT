FROM php:7.2-apache
COPY dashboard/ /var/www/html/
RUN docker-php-ext-install mysqli
