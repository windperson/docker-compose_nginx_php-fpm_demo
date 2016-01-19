FROM php:5-fpm
RUN apt-get update && apt-get -y install g++
RUN apt-get update && apt-get -y install libicu-dev php5-apcu php5-mysql php5-redis zlib1g-dev
RUN pear config-set php_ini /usr/local/etc/php/php.ini
RUN docker-php-ext-install intl mbstring zip mysqli pdo_mysql
RUN pecl install -o -f apcu redis xdebug && rm -rf /tmp/pear

VOLUME /usr/local/etc/
VOLUME /var/www/html
CMD ["php-fpm"]
