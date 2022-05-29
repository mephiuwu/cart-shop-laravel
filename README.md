## PASOS A SEGUIR

Los pasos a seguir para la instalación del proyecto son los siguientes:

- composer install
- cp .env.example .env
- php artisan key:generate
- modificar las credenciales de la db si corresponde
- php artisan migrate
- php artisan storage:link
- php artisan serve