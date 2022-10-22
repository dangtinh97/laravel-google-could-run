FROM php:8.1.1-fpm-alpine

RUN apk add --no-cache nginx wget

#RUN apt-get update && apt-get install -y libmcrypt-dev \
#    mysql-client libmagickwand-dev --no-install-recommends \
#    && pecl install imagick \
#    && docker-php-ext-enable imagick \
#&& docker-php-ext-install mcrypt pdo_mysql

RUN mkdir -p /run/nginx

COPY docker/nginx/laravel.nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p app

COPY . /app

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /app && \
    /usr/local/bin/composer install --no-dev

RUN chown -R www-data: /app
CMD sh /app/docker/startup.sh
EXPOSE 8080
