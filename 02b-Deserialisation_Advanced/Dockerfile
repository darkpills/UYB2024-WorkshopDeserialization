# syntax=docker/dockerfile:1
FROM alpine:3.21

RUN <<EOL
apk update && apk update
apk add bash nginx curl
apk add php82 php82-fpm php82-opcache php82-gd php82-zlib php82-curl php82-sqlite3 php82-phar php82-iconv php82-mbstring php82-openssl
EOL

COPY config/server/etc/nginx/ /etc/nginx
COPY config/server/etc/php/ /etc/php82
COPY 02b-Deserialisation_Advanced/code/ /usr/share/nginx/html
COPY 02b-Deserialisation_Advanced/flag.txt /flag.txt

RUN <<EOL
echo 'alias php=php82' >> ~/.bashrc
mkdir /var/run/php
EOL

WORKDIR /usr/share/nginx/html
SHELL ["/bin/bash", "-o", "pipefail", "-c"]
RUN curl -sS https://getcomposer.org/installer | php82 && php82 ./composer.phar dump-autoload && php82 ./composer.phar validate && php82 ./composer.phar update

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["/bin/bash", "-c", "php-fpm82 && chmod 777 /var/run/php/php8-fpm.sock && chmod -R 755 /usr/share/nginx/html/ && nginx -g 'daemon off;'"]
