# Sistema de Asistencia para la materia de Programacion 3

Sistema para tomar asistencia, desarrollado con la utilizacion de PHP, Laravel, Mysql, Blade, Breeze(Node.js)

>Para inicializar el proyecto seguir las siguientes instrucciones.

## Creado por:
Facundo Janusa

## Instalacion

Asegurarse de tener las dependencias y el entonrno completo. Necesitaras PHP 8, MySQL/MariaDB, composer y Node.

1. Descargar el archivo o clonarlo utilizando Git clone
2. copiar`.env.example` en `.env` y configurar los datos de tu base de datos (user, password, port, etc.)
3. Abre una terminal en el directorio del proyecto
4. ejecuta `composer install`
5. Genera la key de la aplicacion ejecutando `php artisan key:generate --ansi`
6. Corre las migraciones. `php artisan migrate` (asegurate de tener el servidor de base de datos en funcionamiento.)
7. Ejecuta el  `php artisan db:seed --class=defaultValuesSeeder`
8. Instalar Node ejecutando `npm install`
9. Instalar Maatwebsite/excel (libreria para exportar y descargar excel) ejecutando el comando: `composer require maatwebsite/excel`
10. correr el servidor Node ejecutanto `npm run dev`
11. correr el servidor php con `php artisan serve`
12. visitar [http://127.0.0.1:8000/](http://127.0.0.1:8000/) para entrar a la aplicacion (recuerda que necesitaras crearte una cuenta para acceder.)
