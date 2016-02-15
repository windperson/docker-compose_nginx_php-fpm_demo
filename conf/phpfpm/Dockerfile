FROM php:5-fpm

# install some package to let natvie C/C++ compilation during PHP extension installation success.
RUN apt-get update && apt-get -y install g++ libbz2-dev libcurl4-openssl-dev libicu-dev php5-mysql zlib1g-dev
RUN pear config-set php_ini /usr/local/etc/php/php.ini
RUN pear config-set php_bin /usr/local/bin/php
RUN pear config-set bin_dir /usr/local/bin
RUN docker-php-ext-install bz2 calendar curl ctype intl mbstring zip mysqli pdo_mysql
RUN pecl install -o -f apcu-4.0.10 redis xdebug-2.4.0RC4 && rm -rf /tmp/pear

VOLUME /usr/local/etc/
VOLUME /var/www/html
CMD ["php-fpm"]
