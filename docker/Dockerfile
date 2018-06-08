FROM debian:stretch-slim
MAINTAINER Syaiful Shah Zinan <i.works@live.com>

# system prep
RUN apt-get update \
&& apt-get install -y apt-transport-https lsb-release ca-certificates wget curl \
&& wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
&& echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list \
&& apt-get update \
&& apt-get -y upgrade

# tools
RUN apt-get install -y vim zip unzip less wget curl apt-utils iputils-ping gnupg

# nginx
RUN apt-get install -y nginx

# php
RUN mkdir -p /run/php \
&& apt-get install -y php7.1 \
php7.1-fpm \
php7.1-mysql \
php7.1-dev \
php7.1-json \
php7.1-intl \
php7.1-mcrypt \
php7.1-curl \
php7.1-cli \
php7.1-xdebug \
php7.1-memcached \
php7.1-mbstring \
php7.1-zip \
php7.1-xml \
php7.1-gd \
php7.1-mongodb

# memcached
RUN apt-get install -y memcached

# composer
RUN curl -sS https://getcomposer.org/installer | php \
&& mv composer.phar /usr/local/bin/composer

# define environment variable
ENV NAME sesimple
ENV HOME /var/www/sesimple
WORKDIR $HOME

# setup docker requirement data
# nginx
COPY    ./nginx/sites-enabled   /etc/nginx/sites-enabled
COPY    ./nginx/conf-stacks     /etc/nginx/conf-stacks

# php
COPY    ./php/00-sesimple.ini         /etc/php/7.1/fpm/conf.d/00-sesimple.ini

VOLUME  ./../../sesimple-framework /var/www/sesimple-framework

# setup ports
EXPOSE 8888

CMD service php7.1-fpm restart && service memcached restart && nginx -g "daemon off;"
