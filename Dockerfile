# Use a imagem oficial do PHP com Apache
FROM php:8.4.2-apache

# Instalar dependências adicionais para PHP (como o MySQL e o Xdebug)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmariadb-dev-compat \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql opcache \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite

# Verifique onde o Xdebug foi instalado e crie os arquivos de configuração
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions -name xdebug.so)" > /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/20-xdebug.ini

# Definir o diretório de trabalho no container
WORKDIR /var/www/html

# Copiar os arquivos do código-fonte para o diretório de trabalho no container
COPY . /var/www/html/

# Expor a porta 80
EXPOSE 80
