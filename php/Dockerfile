FROM php:7-fpm
MAINTAINER stanaka

RUN apt-get update && apt-get install -y libmcrypt-dev mariadb-client libonig-dev \
    && docker-php-ext-install pdo_mysql mysqli && \
    #zip,unzip
    apt-get install -y zip unzip && \
    #vim
    apt-get install -y vim curl && \
    #openssl
    apt-get install -y openssl

#composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod 777 /usr/local/bin/composer

RUN cd /var/www && \
    curl https:://get.fuelphp.com/oil | sh

WORKDIR /var/www/
