FROM php:8.0-fpm
COPY php.ini /user/local/etc/php/

# CentOSのパッケージのダウンロード
# RUNでコマンドが走る
RUN apt-get update \
&& apt-get install -y zlib1g-dev mariadb-client unzip \
&& apt-get install -y libzip-dev \
&& docker-php-ext-install zip pdo_mysql

# comoser関連のDockerfile

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

# 作業ディレクトリ
WORKDIR /var/www
# laravelをインストール
RUN composer global require "laravel/installer"
