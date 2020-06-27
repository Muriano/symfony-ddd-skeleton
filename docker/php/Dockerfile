FROM php:7.4.2-fpm-alpine

MAINTAINER José Antonio Muriano <jamuriano@gmail.com>

WORKDIR /app

RUN apk --update upgrade && \
    apk add --no-cache alpine-sdk autoconf automake gcc g++ icu-dev && \
    pecl install apcu-5.1.18 && \
    pecl install xdebug-2.9.1 && \
    docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
        pdo \
        pdo_mysql && \
    docker-php-ext-enable \
        apcu \
        opcache

COPY ./etc/php/ /usr/local/etc/php