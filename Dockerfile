FROM php:7.4-apache
COPY "./server/000-default.conf" "/etc/apache2/sites-enabled"
