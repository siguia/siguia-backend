FROM ubuntu:16.04

# Instalando Vim

RUN apt-get update && \
    apt-get install --yes vim

# Adicionando repositório do PHP

RUN apt-get update && \
    apt-get install --yes software-properties-common && \
    LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php

# Instalando PHP + APACHE

RUN apt-get update && \
    apt-get install --yes php7.2

# Configurando APACHE

RUN a2enmod rewrite
COPY allow-override.conf /etc/apache2/conf-enabled/allow-override.conf
COPY vhost.conf /etc/apache2/sites-enabled/000-default.conf

# Instalando extensões do PHP

RUN apt-get update && \
    apt-get install --yes \
        php7.2-cli \
        php7.2-common \
        php7.2-curl \
        php7.2-dev \
        php7.2-gd \
        php7.2-json \
        php7.2-mbstring \
        php7.2-mysql \
        php7.2-opcache \
        php7.2-readline \
        php7.2-soap \
        php7.2-sqlite3 \
        php7.2-xml \
        php7.2-zip 

EXPOSE 80
CMD ["apache2ctl", "-DFOREGROUND"]

# Instalando Composer

RUN curl -sS https://getcomposer.org/installer \
        | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && \
    apt-get install --yes \
        php7.2-xdebug
COPY xdebug.ini /etc/php/7.2/apache2/conf.d/90-xdebug.ini
COPY xdebug.ini /etc/php/7.2/cli/conf.d/90-xdebug.ini

RUN apt-get install -y \
        libxrender1 \
        libfontconfig1 \
        libx11-dev \
        libjpeg62 \
        libxtst6 \
        wget && wget https://downloads.wkhtmltopdf.org/0.12/0.12.5/wkhtmltox_0.12.5-1.xenial_amd64.deb 
RUN dpkg -i wkhtmltox_0.12.5-1.xenial_amd64.deb || :
RUN apt-get install --yes -f
RUN dpkg -i wkhtmltox_0.12.5-1.xenial_amd64.deb && rm -rf wkhtmltox_0.12.5-1.xenial_amd64.deb

#install supervisor
# https://github.com/Supervisor/supervisor/issues/480#issuecomment-110429515
# RUN touch /var/run/supervisor.sock 
RUN apt-get update && apt-get install -y --no-install-recommends supervisor
COPY supervisord.conf /etc/supervisor/supervisord.conf
COPY laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf
COPY docker-entrypoint.sh /usr/local/bin/
ENTRYPOINT [ "docker-entrypoint.sh" ]