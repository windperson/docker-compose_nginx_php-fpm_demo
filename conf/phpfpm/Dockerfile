FROM php:5-fpm
MAINTAINER windperson
# Install necessary package for following native extension compilation.
RUN DEBIAN_FRONTEND=noninteractive apt-get update \
&& apt-get -y install g++ libbz2-dev libcurl4-openssl-dev libicu-dev php5-mysql zlib1g-dev \
&& apt-get clean
RUN pear config-set php_ini /usr/local/etc/php/php.ini
RUN docker-php-ext-install curl intl json mbstring zip mysqli opcache pdo_mysql
RUN pecl install -o -f redis apcu-4.0.10 xdebug && rm -rf /tmp/pear

VOLUME /usr/local/etc/
VOLUME /var/www/html
CMD ["php-fpm"]
