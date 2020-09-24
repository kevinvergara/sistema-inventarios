FROM php:7.2-apache

LABEL Name=control-acceso-cap Version=0.0.1

#hacer que la consola no sea interactiva
ENV DEBIAN_FRONTEND=noninteractive
#--------------------------------

#instalar apache y php
RUN apt-get update

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libpcre3-dev

RUN docker-php-ext-install gd mbstring pdo pdo_mysql zip

#RUN pecl install mongodb \
#    &&  docker-php-ext-enable mongodb
    
RUN pecl install mcrypt-1.0.2 \
    &&  docker-php-ext-enable mcrypt

RUN apt-get install -y wget && \
    apt-get install -y curl && \
        apt-get install -y nano

#-------------------------

# memory limit php
RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/memory-limit.ini
#---------------------------------------------------------------------

#composer, git y node
RUN apt-get update && \
    curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN apt-get install -y git-core openssl libssl-dev python3
#----------------------

# Cleanup
RUN apt-get autoremove -y
#---------------------

#configurar proyecto
EXPOSE 80

ENV APP_HOME /var/www/html

RUN mkdir -p /opt/data/public && \
    rm -r /var/www/html && \
    ln -s /opt/data/public $APP_HOME

RUN cd /opt/data

#--------traer config de apache--------
RUN rm /etc/apache2/sites-enabled/000-default.conf
ADD 000-default.conf /etc/apache2/sites-enabled
#======================================

RUN a2enmod rewrite

WORKDIR /opt/data

#CMD php artisan serve --port=80 --host=0.0.0.0