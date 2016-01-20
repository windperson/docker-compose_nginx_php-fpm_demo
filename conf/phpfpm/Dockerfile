FROM php:5-fpm
# Install necessary package for following native extension compilation.
RUN apt-get update && apt-get -y install g++ libcurl4-gnutls-dev libicu-dev zlib1g-dev
RUN pear config-set php_ini /usr/local/etc/php/php.ini
RUN docker-php-ext-install curl intl json mbstring zip mysqli opcache pdo_mysql
RUN pecl install -o -f redis apcu-4.0.10 xdebug-2.4.0RC3 && rm -rf /tmp/pear

VOLUME /usr/local/etc/
VOLUME /var/www/html
CMD ["php-fpm"]
