FROM php:7.4-fpm

COPY . /var/www/ci

WORKDIR /var/www/ci

RUN apt-get update && \
    apt-get install -y \
    git \
    zip \
    curl \
    libicu-dev

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis
RUN docker-php-ext-install mysqli

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl  

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

EXPOSE 9000
CMD ["php-fpm"]