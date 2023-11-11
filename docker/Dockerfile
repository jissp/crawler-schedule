FROM php:8.2.6-cli as builder

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y git unzip
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer

COPY . .
RUN composer install

FROM php:8.2.6-cli as runner

WORKDIR /var/www/html

COPY . .
COPY --from=builder /var/www/html/vendor ./vendor

RUN chmod -R 777 storage

ENTRYPOINT ["php", "artisan", "schedule:work"]
