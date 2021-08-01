FROM php:7.4-cli
COPY . /var/www/html/
WORKDIR /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN php artisan migrate
CMD php -S 0.0.0.0:8000 -t public

EXPOSE 8000
