FROM php:7.2-apache

ENV APACHE_DOCUMENT_ROOT /app/public

WORKDIR /app

RUN apt-get update && \
    apt-get install --no-install-recommends -y curl unzip libxml2-dev && \
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/ && \
    ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql soap

RUN a2enmod rewrite

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf