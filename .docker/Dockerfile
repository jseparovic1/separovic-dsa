# syntax=docker/dockerfile:1.4
ARG PHP_VERSION

# Image is based on Debian GNU/Linux 11 (bullseye)
FROM php:${PHP_VERSION}-cli

RUN --mount=type=cache,target=/var/cache/apt,sharing=locked \
  apt-get update && apt-get install -y \
  libzip-dev \
  unzip \
  zip \
  && docker-php-ext-configure zip \
  && docker-php-ext-install zip \
  # Official images automatically run apt-get clean thus explicit invocation is not needed.
  && rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug && docker-php-ext-enable xdebug

# Use default development configuration.
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Add custom configuraiton.
COPY /.docker/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www/app

COPY --link --from=composer:2.2 /usr/bin/composer /usr/bin/composer
COPY --link composer.json ./
RUN composer install

COPY --link . .






