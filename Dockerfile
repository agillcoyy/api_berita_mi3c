FROM php:8.2-apache

#instal mysqli extenion
RUN docker-php-ext-install mysqli pdo pdo_mysql

#aktifkan mode rewrite untuk apache
RUN a2enmod rewrite 

#mengatur direktori kerja dalam kontainer
WORKDIR /var/www/html

