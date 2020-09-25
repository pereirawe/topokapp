FROM php:7.4-apache

RUN apt-get update -y 

RUN apt-get install -y sendmail libpng-dev
RUN apt-get install -y apt-transport-https
RUN apt-get install -y ca-certificates
RUN apt-get install -y curl
RUN apt-get install -y gnupg-agent
RUN apt-get install -y software-properties-common
RUN apt-get install -y nano

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN echo "date.timezone=America/Sao_Paulo" > /usr/local/etc/php/conf.d/timezone_sao_paulo.ini

RUN echo "memory_limit = 1024M" > /usr/local/etc/php/conf.d/memory_limit.ini
