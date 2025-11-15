FROM php:8.4-apache

RUN apt-get update && apt-get install -y --fix-missing \
    apt-utils \
    gnupg \
    libmagickwand-dev \
    imagemagick

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    libxml2-dev \
    git \
    unzip \
    wget \
    libpng-dev \
    apache2-utils


RUN docker-php-ext-install zip pdo_mysql bcmath exif sockets gd intl mysqli

RUN pecl install imagick && docker-php-ext-enable imagick

RUN a2enmod rewrite

ENV TZ=Europe/Kiev
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

RUN npm install -g npm@10.5.0

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer