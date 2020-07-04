FROM php:7.4-fpm-alpine

RUN apk update \
&&  apk add curl php7-curl  php7-json php7-tokenizer php7-mbstring php7-exif php7-fileinfo \
php7-bcmath php7-gd php7-dom php7-session php7-simplexml php7-ctype 

#php7-pecl-redis

# * PDO MYSQL
# -------------------------------------
# - The apk is not working!
# > RUN apk add php7-pdo php7-pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

# * EXT-REDIS
# ----------------------------------------------
# - The apk is not working!
# > RUN apk php7-pecl-redis
RUN apk add --no-cache pcre-dev $PHPIZE_DEPS \
    && pecl install redis \
    && docker-php-ext-enable redis.so

# Get permissions right
RUN apk add shadow && usermod -u 1000 www-data && groupmod -g 1000 www-data