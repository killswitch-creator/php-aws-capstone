FROM php:8.2-apache
# Install mysqli extension for database connection
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# Copy source code to Apache document root
COPY index.php /var/www/html/
EXPOSE 80
