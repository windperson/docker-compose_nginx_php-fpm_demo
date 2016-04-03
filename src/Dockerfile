FROM busybox
MAINTAINER windperson
RUN mkdir -p /var/www/html
ADD ./php /var/www/html
VOLUME /var/www/html
CMD echo "this container should exit with code 0 immediately"
