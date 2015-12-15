FROM php:apache

# Install system packages for PHP extensions recommended for Phundament
RUN curl -sL https://deb.nodesource.com/setup | bash - && \
    apt-get update && \
    apt-get -y install \
            git \
            libicu-dev \
            libmcrypt-dev \
            libfreetype6-dev \
            libjpeg-dev \
            libjpeg62-turbo-dev \
            libmcrypt-dev \
            libpng12-dev \
            zlib1g-dev \
            libxml2-dev \
            nano \
            make \
        --no-install-recommends && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install PHP extensions required for Yii 2.0 Framework
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd
RUN docker-php-ext-configure bcmath && \
    docker-php-ext-install intl \
                           pdo_mysql \
                           mbstring \
                           mcrypt \
                           zip \
                           bcmath \
                           soap

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --version=1.0.0-alpha11 && \
    mv composer.phar /usr/local/bin/composer && \
    composer global require "fxp/composer-asset-plugin:1.*" && \
    composer global dumpautoload --optimize # 15.12.2015

RUN composer create-project phundament/app --stability=rc
RUN cp app/.env-dist app/.env

# Prepare folders for Yii 2.0 Framework (www-data)
RUN mkdir -p app/runtime app/web/assets && \
    chown -R www-data:www-data app/runtime app/web/assets

ADD .htaccess /var/www/html/.htaccess
RUN ln -s /var/www/html/app/web/index.php /var/www/html/index.php

RUN a2enmod rewrite