FROM php:8.2-fpm-alpine

# https://www.cyberciti.biz/faq/how-to-install-php-7-fpm-on-alpine-linux/
# https://gist.github.com/evansims/280d63378c9f422f7b5d72e6d16f3806
# https://stackoverflow.com/questions/67813147/cant-install-intl-in-php7-4-alpine

# Set user to root
USER root

# Set working directory
WORKDIR /var/www/html

# Install Additional dependencies
RUN apk update && apk add --no-cache \
  build-base shadow vim curl zlib libzip-dev jq \
  libpng-dev libjpeg-turbo-dev libwebp-dev libxpm-dev zlib-dev \
  openssl-dev oniguruma-dev \
  icu-dev bzip2-dev freetype freetype-dev libmcrypt-dev

RUN set -xe && \
  cd /tmp/ && \
  apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-install mbstring

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-install bz2
RUN docker-php-ext-install phar
RUN docker-php-ext-install phar

RUN pecl install igbinary
RUN pecl install redis

# Enable Extenstions
RUN docker-php-ext-enable pdo_mysql igbinary mbstring redis gd zip bz2

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Remove Cache
RUN rm -rf /var/cache/apk/*

# Add UID '1000' to www-data
RUN usermod -u 1000 www-data

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html

# Change current user to www
USER www-data

# Update composer
# RUN composer update --no-interaction

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
