FROM php:7.4-apache

# Kopiere alle Dateien in das Verzeichnis /var/www/html
COPY . /var/www/html/

# Setze die richtigen Berechtigungen für die Dateien
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Exponiere den Port 80
EXPOSE 80