FROM codemastersolutions/php:8.1.4-fpm-alpine-3.15

# RUN apk update && \
#     apk add --no-cache yarn git openrc && \
#     yarn global add @vue/cli && \
#     yarn global add nodejs npm && \
#     rm -rf /var/www/html && \
#     mkdir /run/openrc && \
#     touch /run/openrc/softlevel
RUN git config --global user.email "gilson@codemastersolucoes.com"
RUN git config --global user.name "Gilson Gabriel"
RUN git config --global color.ui true

COPY ./docker-php-entrypoint /usr/local/bin/

RUN chmod +x /usr/local/bin/docker-php-entrypoint

WORKDIR /var/www

EXPOSE 5501
