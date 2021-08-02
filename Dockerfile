FROM php:7.4-fpm
RUN docker-php-ext-install pdo_mysql

COPY . .

CMD php -S 0.0.0.0:8000 -t public
EXPOSE 8000
