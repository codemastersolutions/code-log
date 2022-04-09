FROM codemastersolutions/php:7.4.12-fpm-alpine-3.12

RUN apk add --no-cache --update openssh-keygen npm
RUN git config --global user.email "gilson@codemastersolucoes.com"
RUN git config --global user.name "Gilson Gabriel"
RUN git config --global color.ui true

RUN chmod +x /usr/local/bin/docker-php-entrypoint

WORKDIR /var/www/html

EXPOSE 5501
