# Utiliza la imagen base de PHP
FROM php:8.1-fpm

# Instala dependencias
RUN apt-get update \
    && apt-get install -y \
       git \
       unzip \
       libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto Laravel al contenedor
COPY . .

# Instala las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Genera la clave de cifrado de Laravel
RUN php artisan key:generate

# Expone el puerto 8000
EXPOSE 8000

# Comando por defecto para ejecutar el servidor web
CMD php artisan serve --host=0.0.0.0 --port=8000


