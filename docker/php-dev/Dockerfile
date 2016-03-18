FROM php:7-apache

RUN apt-get update
RUN apt-get install -y libssl-dev libxml2-dev zlib1g-dev libicu-dev libjpeg-dev libpng-dev libmcrypt-dev nano unzip libz-dev git tar
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install json
RUN docker-php-ext-install mysqli
RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/lib/x86_64-linux-gnu --with-png-dir=/usr/lib/x86_64-linux-gnu
RUN docker-php-ext-install gd
RUN docker-php-ext-install mcrypt
RUN docker-php-ext-install soap

RUN a2enmod rewrite

COPY php.ini /usr/local/etc/php/
COPY apache2.conf /etc/apache2/apache2.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer&& \
         composer global require hirak/prestissimo

RUN usermod -u 1000 www-data

WORKDIR /var/www/

EXPOSE 8000
