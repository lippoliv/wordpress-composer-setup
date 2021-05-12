FROM wordpress:5.7-apache

MAINTAINER Oliver Lippert <oliver@lipperts-web.de>

COPY wordpress /var/www/html

RUN chown -R www-data.www-data /var/www/html
