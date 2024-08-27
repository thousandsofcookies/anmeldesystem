# Verwenden des offiziellen PHP-Apache Docker-Images mit PHP Version 7.4
FROM php:7.4-apache

# Kopiere alle Dateien aus dem aktuellen Verzeichnis (wo sich das Dockerfile befindet)
# in das Verzeichnis /var/www/html/ im Container, das der Standard-Dokumentenstamm
# des Apache-Webservers ist
COPY . /var/www/html/

# Setzen der Eigentumsrechte für alle kopierten Dateien und Verzeichnisse auf den Benutzer "www-data"
# und die Gruppe "www-data", die standardmäßig vom Apache-Webserver verwendet werden
RUN chown -R www-data:www-data /var/www/html

# Setzen der Berechtigungen für alle Dateien und Verzeichnisse im Verzeichnis /var/www/html/
# auf 755, was bedeutet, dass der Eigentümer lesen, schreiben und ausführen darf, 
# während Gruppe und andere nur lesen und ausführen dürfen
RUN chmod -R 755 /var/www/html

# Der Container wird so konfiguriert, dass er auf Port 80 (Standard-HTTP-Port) lauscht,
# was notwendig ist, um HTTP-Anfragen von außen entgegenzunehmen
EXPOSE 80