FROM busybox
MAINTAINER windperson
RUN mkdir -p /var/www/html/data
ADD . /var/www/html/data
VOLUME /var/www/html/data
CMD echo "this container should exit with code 0 immediately"
