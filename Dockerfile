FROM php:8.0-apache
WORKDIR /var/www/html
RUN apt-get-update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli Pdo_mysql
RUN docker-php-ext-install  Pdo_mysql

COPY ./create-local-db.sql /tmp

CMD [ "mysqld", "--init-file=/tmp/create-local-db.sql" ]