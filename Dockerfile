FROM php:7.4-fpm-alpine
COPY . .

RUN docker-php-ext-install pdo_mysql

CMD php -S 0.0.0.0:8000 -t public

EXPOSE 8000
