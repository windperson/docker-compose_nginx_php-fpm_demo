FROM busybox
MAINTAINER windperson
RUN mkdir -p /data
ADD ./redis /data
VOLUME /data
CMD echo "this container should exit with code 0 immediately"
