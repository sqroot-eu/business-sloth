FROM php:7.2-apache
EXPOSE 8080

WORKDIR /var/www/

RUN rmdir /var/www/html && \
    a2enmod rewrite remoteip

# Allow to run in Openshift as non-root
RUN mkdir -p /var/run/apache2 && chmod 777 -R /var/run/apache2 && \
  mkdir -p /var/log/apache2 && chmod 777 -R /var/log/apache2 && \
  mkdir -p /var/lock/apache2 && chmod 777 -R /var/lock/apache2

COPY docker/webserver/000-default.conf /etc/apache2/sites-available/
COPY docker/webserver/ports.conf /etc/apache2/
COPY src /var/www/
