FROM codemastersolutions/php:8.1.4-fpm-alpine-3.15

RUN apk add --no-cache --update openssh-keygen npm
RUN git config --global user.email "gilson@codemastersolucoes.com"
RUN git config --global user.name "Gilson Gabriel"
RUN git config --global color.ui true

RUN chmod +x /usr/local/bin/docker-php-entrypoint

COPY ./ssh/* /root/.ssh/
COPY ./ssh/* ~/.ssh/

WORKDIR /var/www

EXPOSE 5501
