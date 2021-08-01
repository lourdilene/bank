FROM php:7.4-cli
COPY . /var/www/html/
WORKDIR /var/www/html/

CMD php -S 0.0.0.0:8000 -t public

EXPOSE 8000
