<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Probar Swapi Inventory

1. **Generar las imágenes y levantar los contenedores:**
   En la carpeta del proyecto generar las imagenes y levantar los contenedores command = sudo docker compose up --build (contenedores = swapi-inventory-app, phpmyadmin/phpmyadmin, mysql:8.0).
2. **Instalar dependencias y migrar la base de datos:**
   Dentro del contendor de swapi-inventory-app en la carpeta raiz composer install - php artisan migrate --seed.
3. **Instalar dependencias locales:**
   En la carpeta del proyecto Local ejecutar npm install.
4. **Configurar el archivo de entorno:**
   En la carpeta del proyecto Local ejecutar cp .env.example .env.
5. **Ver el frontend:**
   Ver el Front con npm run dev (http://localhost:5173/).
6. **Ver el backend:**
   Ver el Back con php artisan serve (http://127.0.0.1:8000).
7. **Acceder a phpMyAdmin:**
   El phpmyadmin estara en http://127.0.0.1:8080/.
