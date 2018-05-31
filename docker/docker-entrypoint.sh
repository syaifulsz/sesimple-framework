sed -i -e 's/display_errors = Off/display_errors = On/g'; /etc/php/7.1/fpm/php.ini

service php7.1-fpm restart
service memcached restart
nginx -g "daemon off;"
