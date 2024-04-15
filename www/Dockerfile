#El Dockerfile es un documento para la configuracion del servidor-web

#Imagen de php
FROM php:apache

# Por lo general el servidor web apache utiliza este directorio de trabajo
WORKDIR /var/www/html

#Se requiere para activar el modo de re-escritura de las URLs
RUN a2enmod rewrite

#Se requiere de esta extension o driver para comunicar php con la base de datos
RUN docker-php-ext-install mysqli pdo pdo_mysql

#Se requiere para instalar composer dentro del contenedor del servidor-web que corre en linux
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

#Se copia la configuracion de composer para instalar slim y psr-7 en el contenedor
COPY ./www/composer.json .

#Instalando git en el servidor-web ya que se requiere para descargar desde un repositorio
RUN apt update && apt install -y git

#Comando que instala composer en el servidor-web
RUN composer install 

#Se modifica el Documento Root del servidor apache para modificar la ruta predeterminada que accede al index
RUN sed -i 's/DocumentRoot.*$/DocumentRoot \/var\/www\/html\/public/' /etc/apache2/sites-enabled/000-default.conf

# COPY ./www .



