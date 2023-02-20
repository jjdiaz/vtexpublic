FROM php:8.1-cli

RUN apt-get update && apt-get install -y git libzip-dev

RUN docker-php-ext-install zip
#RUN docker-php-ext-install curl dom phar posix xml intl soap gd pgsql pdo pdo_mysql pdo_pgsql pcntl zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /cde/app

COPY bin/ ./bin
COPY config/ ./config
COPY src ./src
COPY composer.json composer.lock .env ./

COPY ContainerApiClient/ ./ContainerApiClient

RUN composer install --no-dev

CMD ["php", "bin/console"]