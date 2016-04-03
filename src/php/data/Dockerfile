FROM busybox
MAINTAINER windperson
RUN mkdir -p /var/www/html/data
ADD . /var/www/html/data
RUN rm -f /var/www/html/data/
VOLUME /var/www/html/data
