# syntax=docker/dockerfile:1
FROM alpine:latest

RUN apk update && apk update
RUN apk add bash nginx curl
RUN apk add php82 php82-fpm php82-opcache php82-gd php82-zlib php82-curl php82-sqlite3 php82-phar php82-iconv php82-mbstring php82-openssl php82-ctype php82-xml php82-dom php82-xmlwriter php82-tokenizer php82-session php82-simplexml

COPY config/server/etc/nginx-symfony/ /etc/nginx
COPY config/server/etc/php/ /etc/php82
COPY 04-Deserialisation_Library/code/ /usr/share/nginx/html
COPY 04-Deserialisation_Library/flag.txt /flag.txt

RUN echo 'alias php=php82' >> ~/.bashrc

RUN mkdir /var/run/php
WORKDIR /usr/share/nginx/html
RUN php82 composer.phar install
RUN chmod -R 755 .
RUN chmod -R 777 var

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["/bin/bash", "-c", "php-fpm82 && chmod 777 /var/run/php/php8-fpm.sock && nginx -g 'daemon off;'"]
