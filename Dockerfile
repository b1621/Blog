FROM php:8.0-apache
WORKDIR /var/www/html

RUN docker-php-ext-install mysqli 


COPY ./create-local-db.sql /tmp

CMD [ "mysqld", "--init-file=/tmp/create-local-db.sql" ]