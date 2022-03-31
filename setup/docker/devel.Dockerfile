#FROM 450773497527.dkr.ecr.us-east-1.amazonaws.com/microservices/images-base:php7.4-fpm-nginx-supervisor

#RUN apk --update --no-cache add composer git npm

#RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
#    && pecl install xdebug-2.9.8 \
#    && docker-php-ext-enable xdebug \
#    && apk del -f .build-deps

#COPY setup/docker/config/etc/xdebug/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# config xdebug files
#RUN mkdir -p /var/log && \
#    touch /var/log/xdebug.log && \
#    chown www-data:www-data /var/log/xdebug.log && \
#    chmod 664 /var/log/xdebug.log

# Configurando filebeat
#COPY setup/docker/config/etc/filebeat/local.filebeat.yml /etc/filebeat/filebeat.yml

#USER root


FROM php:8.1-fpm-buster
ARG TIMEZONE

COPY setup/docker/config/usr/local/etc/php/conf.d/custom.ini /usr/local/etc/php/conf.d/docker-php-config.ini

RUN apt-get update && apt-get install -y \
    gnupg \
    g++ \
    procps \
    openssl \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libicu-dev  \
    libonig-dev \
    libxslt1-dev \
    acl \
    libssl-dev \
    libcurl4-openssl-dev \
    libxml2-dev \
    nginx \
    supervisor \
    git \
    npm \
    vim
   # && echo 'alias sf="php bin/console"' >> ~/.bashrc

# copy xdebug files
COPY setup/docker/config/etc/xdebug/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# copy supervisor files
COPY setup/docker/config/etc/supervisord.conf /etc/supervisord.conf

# setup nginx
COPY setup/docker/config/etc/nginx/nginx.conf /etc/nginx/nginx.conf
COPY setup/docker/config/etc/nginx/sites-enabled/app.conf /etc/nginx/sites-enabled/app.conf
COPY setup/docker/config/etc/nginx/conf.d/php-fpm.upstream.conf /etc/nginx/conf.d/php-fpm.upstream.conf


#RUN /etc/init.d/nginx start
RUN /usr/local/sbin/php-fpm -D


USER root

#RUN pecl install mongodb \
#    &&  echo "extension=mongodb.so" > $PHP_INI_DIR/conf.d/mongo.ini

RUN docker-php-ext-configure gd

RUN docker-php-ext-install \
    pdo pdo_mysql zip xsl gd intl opcache exif mbstring soap

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
    && "date"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
