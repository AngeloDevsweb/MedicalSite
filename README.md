<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Demo App

LOGIN

<img src="https://appmedical.netlify.app/loginapp.png" alt="imagen login">

DASHBOARD

<img src="https://appmedical.netlify.app/dash.png" alt="imagen dashboard">


## Sistema para gestion de citas medicas

Este es un sistema MVC realizado para poder gestionar los usuarios Pacientes y Doctores para que estos pueden crear citas medicas y atenderlas respectivamente.

## Universidad

Este es un proyecto para una materia en la universidad privada domingo savio

## Proyecto para Sistemas de Informacion III

## Integrantes del equipo:

- Roberto flores (Product Owner)
- Kevin Riguera Juanez (Developer)
- Angelo Parra (Scrum Master)
- Nahum Abdias Mamani Valverde (Developer)

### Como Instalar el proyecto

Puedes copiar o clonar todo el codigo en tu ordenador local, para ello te recomendamos que utilices Laragon. Esta herramienta te sera de utilidad para facilitar la tarea de desarrollo.

 ```
 git clone https://github.com/CGweb202/MedicalSite.git
```

Luego debes instalar las dependencias con el siguiente comando

 ```
Composer install
 ```

Deberas crearte un archivo .env y copiar todo lo que tienes en el .env.example

```
.env
```

Luego que hayas creado tu base de datos e introducido su nombre en el .env, deberas hacer una migracion

```
php artisan migrate
```
Tambien es importante que ejecutes el siguiente comando para crear un seed muy pequeño pero que contendra las credenciales del administrador del sistema de esta manera 
quedara registrado desde el inicio y solo necesitas iniciar sesion con esas credenciales. Las cuales si quieres modificarlas se encuentran en el archivo DatabaseSeeders

```
php artisan db:seed
```

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
