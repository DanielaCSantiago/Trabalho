FROM php:8.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite
COPY ./web /var/www/html/

RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

EXPOSE 80