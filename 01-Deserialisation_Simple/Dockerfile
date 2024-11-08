# syntax=docker/dockerfile:1
FROM alpine:latest

RUN apk update && apk update
RUN apk add bash nginx curl
RUN apk add php82 php82-fpm php82-opcache php82-gd php82-zlib php82-curl php82-sqlite3 php82-phar php82-iconv php82-mbstring php82-openssl

COPY config/server/etc/nginx/ /etc/nginx
COPY config/server/etc/php/ /etc/php82
COPY 01-Deserialisation_Simple/code/ /usr/share/nginx/html
COPY 01-Deserialisation_Simple/intro-cut.mp3 01-Deserialisation_Simple/boss_battle.mp3 /usr/share/nginx/html/audio/

RUN echo 'alias php=php82' >> ~/.bashrc

RUN mkdir /var/run/php
WORKDIR /usr/share/nginx/html
RUN curl -sS https://getcomposer.org/installer | php82 && php82 ./composer.phar dump-autoload && php82 ./composer.phar validate && php82 ./composer.phar update

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["/bin/bash", "-c", "php-fpm82 && chmod 777 /var/run/php/php8-fpm.sock && chmod -R 755 /usr/share/nginx/html/ && nginx -g 'daemon off;'"]