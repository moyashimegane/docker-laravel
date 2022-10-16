# ベースイメージの設定
FROM php:7.3-fpm

# 作成した設定ファイルをコンテナ内にコピー
COPY php.ini /usr/local/etc/php/

# パッケージのインストール
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    vim \
    && docker-php-ext-install zip pdo_mysql opcache

# コンテナ内で作業する際のカレントディレクトリの指定
WORKDIR /var/www

# コンポーザーをイメージに追加
COPY --from=composer /usr/bin/composer /usr/bin/composer

# rootでのインストール許可
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer global require "laravel/installer"