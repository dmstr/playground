FROM phundament/php-one:5.6-apache-4.6.0

# Use exisiting source code on image
RUN rm -rf /app && ln -s /phundament-src/. /app
RUN mv /phundament-src/web/.htaccess-dist /phundament-src/web/.htaccess
RUN mv /phundament-src/.env-dist /phundament-src/.env
RUN rm -rf /var/www/html && ln -s /phundament-src/web/. /var/www/html
