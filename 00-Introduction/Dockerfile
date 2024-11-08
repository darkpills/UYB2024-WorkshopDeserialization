# syntax=docker/dockerfile:1
FROM alpine:latest

RUN apk update && apk update
RUN apk add bash curl procps nginx
RUN apk add php82 php82-fpm php82-opcache php82-gd php82-zlib php82-curl

COPY config/server/etc/nginx/ /etc/nginx
COPY config/server/etc/php/ /etc/php82
COPY 00-Introduction/src/ /usr/share/nginx/html

RUN echo 'alias php=php82' >> ~/.bashrc

RUN mkdir /var/run/php

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["/bin/bash", "-c", "php-fpm82 && chmod 777 /var/run/php/php8-fpm.sock && chmod 755 /usr/share/nginx/html/* && nginx -g 'daemon off;'"]