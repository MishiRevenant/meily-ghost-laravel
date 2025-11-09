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

<br>
<p align="center">
  <h1>Meily Ghost E-Commerce 👻</h1>
</p>

<p align="center">
  Una tienda e-commerce de estilo gótico, victoriano y kawaii construida con Laravel 11, Sail y Vite.
</p>

---

## 🚀 Instalación (Desde Cero)

Sigue estos pasos para levantar el proyecto en una máquina nueva.

### Prerrequisitos

Asegúrate de tener instalado el siguiente software en tu sistema:

* **Git**
* **Docker Desktop** (para Mac/Windows) o **Docker Engine + Docker Compose** (para Linux)
* **WSL2** (si estás en Windows)

> **NOTA:** ¡No necesitas instalar PHP, Composer o Node.js en tu máquina! Docker y Sail se encargan de todo.

---

### Paso 1: Clonar e Instalar Dependencias de PHP

1.  **Clona el repositorio:**
    
    ```bash
    git clone [https://github.com/MishiRevenant/meily-ghost-laravel.git](https://github.com/MishiRevenant/meily-ghost-laravel.git)
    cd meily-ghost-laravel
    ```

2.  **Copia el archivo de entorno:**
    ```bash
    cp .env.example .env
    ```
    *(Este archivo `.env.example` ya está configurado para funcionar con Sail).*

3.  **Instala las dependencias de Composer:**
    *(Usamos una imagen de Docker temporal para instalar `vendor/`, lo que nos dará acceso al script de `sail`).*
    ```bash
    docker run --rm \
        -v "$(pwd)":/app \
        composer/composer:latest install --ignore-platform-reqs
    ```

### Paso 2: Levantar el Backend y la Base de Datos

Ahora que tienes la carpeta `vendor/`, puedes usar el alias de Sail.

1.  **Inicia los servicios de Sail:**
    *(Esto levantará los contenedores de PHP, MariaDB y Mailpit en segundo plano).*
    ```bash
    ./vendor/bin/sail up -d
    ```

2.  **Genera la llave de la aplicación:**
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

3.  **Ejecuta las migraciones y los seeders:**
    *(¡Este es el paso clave!) Creará la estructura de la base de datos y la llenará con los productos de ejemplo).*
    ```bash
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```

### Paso 3: Levantar el Frontend (Vite)

El backend ya está corriendo, pero los estilos (CSS) y el JavaScript (JS) necesitan compilarse con Vite.

1.  **Instala las dependencias de NPM:**
    *(Esto lee tu `package.json` e instala Vite, Tailwind, etc., dentro del contenedor).*
    ```bash
    ./vendor/bin/sail npm install
    ```

2.  **Inicia el servidor de Vite:**
    *(Este comando se quedará corriendo en tu terminal para compilar tus assets).*
    ```bash
    ./vendor/bin/sail npm run dev
    ```

**¡Listo!** El proyecto está completamente instalado y corriendo.

---

## 🏃 Cómo Correr el Proyecto (Diariamente)

Para trabajar en el proyecto, necesitarás **2 terminales abiertas** en la carpeta del proyecto.

* **Terminal 1: Backend (Sail)**
    Levanta todos los servicios de Docker (PHP, DB, etc.).
    ```bash
    ./vendor/bin/sail up
    ```
    *(Déjala corriendo. Verás los logs del servidor aquí).*

* **Terminal 2: Frontend (Vite)**
    Inicia el servidor de desarrollo que compila tu CSS y JS en tiempo real.
    ```bash
    ./vendor/bin/sail npm run dev
    ```
    *(Déjala corriendo. Verás los logs de Vite aquí).*

---

## 🌎 URLs Útiles

* **Sitio Web:** `http://localhost`
* **Bandeja de Emails (Mailpit):** `http://localhost:8025`
    *(Aquí puedes ver todos los correos de prueba, como los de recuperación y verificación).*

---

## 💻 Tech Stack (Documentación Técnica)

### Backend (El Cerebro)

* **PHP:** El lenguaje de programación principal en el que está escrito el proyecto.
* **Laravel:** El framework de PHP que nos da la estructura (rutas, controladores, modelos).
* **Artisan:** La herramienta de línea de comandos de Laravel para `migrate`, `db:seed`, etc.
* **Eloquent ORM:** El sistema que usa Laravel para hablar con la base de datos (ej. `Producto.php`, `User.php`).
* **Blade:** El motor de plantillas de Laravel para escribir HTML con PHP (ej. `tienda.blade.php`).
* **Composer:** El gestor de dependencias de PHP.

### Frontend (Lo que ve el Usuario)

* **Vite:** El compilador de frontend para JavaScript y CSS.
* **Tailwind CSS:** El framework de CSS para diseño rápido con clases de utilidad.
* **Node.js / NPM:** El gestor de dependencias de frontend.
* **Alpine.js:** (Instalado por Breeze) Un mini-framework de JavaScript para interactividad simple.

### Entorno y Paquetes

* **Docker / Docker Compose:** El software que virtualiza el entorno de desarrollo en contenedores.
* **Laravel Sail:** La capa de Laravel que gestiona Docker y nos da el comando `./vendor/bin/sail`.
* **Laravel Breeze:** El paquete de inicio que nos dio todo el código de autenticación y perfil.

---

