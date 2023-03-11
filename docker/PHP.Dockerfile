FROM php:8.1-fpm-alpine
RUN apk update \
 && apk upgrade \
 && apk add linux-headers \
 && apk add $PHPIZE_DEPS \
 && pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && apk del $PHPIZE_DEPS \
 && rm -rf /var/cache/apk/*
