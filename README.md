<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
Pasos para la Instalacion:

🚀 Instalación (Desde Cero)
Sigue estos pasos para levantar el proyecto en una máquina.

Prerrequisitos
Asegúrate de tener instalado el siguiente software en tu sistema:

Git

Docker Desktop (para Mac/Windows) o Docker Engine + Docker Compose (para Linux)

WSL2 (si estás en Windows)

NOTA: ¡No necesitas instalar PHP, Composer o Node.js en tu máquina! Docker y Sail se encargan de todo.

Paso 1: Clonar e Instalar Dependencias de PHP
Clona el repositorio:

cd meily-ghost-laravel
Copia el archivo de entorno:


cp .env.example .env
(Este archivo .env.example ya está configurado para funcionar con Sail).

Instala las dependencias de Composer: Usamos una imagen de Docker temporal de Composer para instalar vendor/, lo que nos dará acceso al script de sail.



docker run --rm \
    -v "$(pwd)":/app \
    composer/composer:latest install --ignore-platform-reqs
Paso 2: Levantar el Backend y la Base de Datos
Ahora que tienes la carpeta vendor/, puedes usar el alias de Sail.

Inicia los servicios de Sail: (Esto levantará los contenedores de PHP, MariaDB y Mailpit en segundo plano).



./vendor/bin/sail up -d
Genera la llave de la aplicación:



./vendor/bin/sail artisan key:generate
Ejecuta las migraciones y los seeders: (¡Este es el paso clave!) Creará la estructura de la base de datos y la llenará con los productos de ejemplo.



./vendor/bin/sail artisan migrate:fresh --seed
Paso 3: Levantar el Frontend (Vite)
El backend ya está corriendo, pero los estilos (CSS) y el JavaScript (JS) necesitan compilarse con Vite.

Instala las dependencias de NPM: (Esto lee tu package.json e instala Vite, Tailwind, etc., dentro del contenedor).



./vendor/bin/sail npm install
Inicia el servidor de Vite: (Este comando se quedará corriendo en tu terminal para compilar tus assets).



./vendor/bin/sail npm run dev
¡Listo! El proyecto está completamente instalado y corriendo.

🏃 Cómo Correr el Proyecto (Diariamente)
Para trabajar en el proyecto, necesitarás 2 terminales abiertas en la carpeta del proyecto.

Terminal 1: Backend (Sail) Levanta todos los servicios de Docker (PHP, DB, etc.).



./vendor/bin/sail up
(Déjala corriendo. Verás los logs del servidor aquí).

Terminal 2: Frontend (Vite) Inicia el servidor de desarrollo que compila tu CSS y JS en tiempo real.



./vendor/bin/sail npm run dev
(Déjala corriendo. Verás los logs de Vite aquí).

URLs Útiles

Sitio Web(host local por ahora hasta alquilar un hosting): http://localhost

Bandeja de Emails : jm5372533@gmail.com

Documentacion Tecnica:


Tecnologías de Backend (El Cerebro)

PHP: Es el lenguaje de programación principal en el que está escrito todo tu proyecto.
Laravel: Es el framework de PHP que usas. Te da toda la estructura para rutas, controladores, modelos y mucho más. Es el "esqueleto" de tu aplicación.
Artisan: Es la herramienta de línea de comandos de Laravel (el archivo artisan). La usas para ejecutar comandos como migrate, db:seed, key:generate, etc.
Eloquent ORM: Es el sistema que usa Laravel para hablar con la base de datos. Te permite escribir código PHP (ej. Producto::all()) en lugar de SQL. Tus Modelos (Producto.php, User.php, etc.) son la prueba de que lo usas.
Blade: Es el motor de plantillas de Laravel. Es lo que te permite escribir HTML con sintaxis de PHP como @extends, @section y {{ $variable }}.
Composer: Es tu gestor de dependencias de PHP. El archivo composer.json le dice a Composer qué paquetes de PHP instalar (como laravel/framework y laravel/breeze).

Tecnologías de Frontend (Lo que ve el Usuario)

Vite: Es tu "compilador" de frontend. Toma tus archivos de JavaScript y CSS modernos y los empaqueta para que el navegador los entienda. Está configurado en vite.config.js.
Tailwind CSS: Es el framework de CSS que usa Breeze. Te permite diseñar rápidamente usando clases de utilidad (como text-lg, font-bold) directamente en tu HTML. Está configurado en tailwind.config.js.
Node.js / NPM: Es el "Composer" del frontend. package.json es el archivo que lista las dependencias de JavaScript (como vite y tailwindcss).
Alpine.js: (Probablemente) Breeze instala esto por defecto. Es un mini-framework de JavaScript para añadir interactividad simple (como mostrar/ocultar menús desplegables) directamente en tu HTML.

Tecnologías de Entorno y Paquetes

Docker / Docker Compose: Es el software que te permite "virtualizar" tu entorno de desarrollo. En lugar de instalar PHP, MariaDB y un servidor web en tu máquina, Docker los corre en "contenedores" aislados.
Laravel Sail: Es la capa de Laravel que gestiona Docker por ti. El archivo compose.yaml es la "receta" que Sail usa para decirle a Docker Compose qué contenedores levantar (php, mariadb, mailpit, etc.). El comando ./vendor/bin/sail es tu forma de interactuar con él.
Laravel Breeze: Como ya vimos, es el paquete de inicio (instalado vía Composer) que te dio todo el código de autenticación y perfil.
.

