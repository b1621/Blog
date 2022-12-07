FROM php:apache
COPY ./app /var/www/html
WORKDIR /var/www/html 
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql
EXPOSE 80