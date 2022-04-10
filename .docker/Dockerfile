FROM codemastersolutions/php:8.1.4-fpm-alpine-3.15

COPY ./docker-php-entrypoint /usr/local/bin/

RUN chmod +x /usr/local/bin/docker-php-entrypoint

WORKDIR /var/www/html

EXPOSE 5501
