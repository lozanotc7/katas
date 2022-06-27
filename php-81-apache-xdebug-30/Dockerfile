FROM php:8.1-apache

RUN pecl install xdebug-3.1.4
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini

RUN apt update
RUN apt upgrade -y

RUN apt install git -y

#install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar update
RUN php composer.phar install