FROM php:8.0-apache
WORKDIR /var/www/html

RUN apt-get update -y && apt-get install -y libmariadb-dev tree
RUN docker-php-ext-install mysqli

COPY . /var/www/html

ENTRYPOINT php /var/www/html/database/migration/migrationScript.php m && apache2-foreground && exec tail -f /dev/null
