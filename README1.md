# 🗺️ Mapa Mental de Laravel

Un desglose completo de los conceptos, componentes y el ecosistema del framework PHP Laravel.

---

## 📋 Índice

1.  [¿Qué es Laravel?](#-qué-es-laravel)
2.  [Ventajas](#-ventajas)
3.  [Componentes Clave](#-componentes-clave)
4.  [Ciclo de Vida de una Petición](#-ciclo-de-vida-de-una-petición)
5.  [Rutas](#-rutas)
6.  [Controladores](#-controladores)
7.  [Vistas](#-vistas)
8.  [Modelos](#-modelos)
9.  [Bases de Datos](#-bases-de-datos)
10. [Autenticación](#-autenticación)
11. [API REST](#-api-rest)
12. [Despliegue](#-despliegue)
13. [Comunidad y Recursos](#-comunidad-y-recursos)
14. [Seguridad](#-seguridad)

---

### 💡 ¿Qué es Laravel?

-   **Framework de PHP**: Moderno y robusto para el desarrollo web.
-   **Código abierto**: Gratuito y mantenido por la comunidad.
-   **Patrón MVC**: Sigue el patrón arquitectónico Modelo-Vista-Controlador.
-   **Sintaxis expresiva**: Permite escribir código limpio y legible.

### 👍 Ventajas

-   **Desarrollo rápido**: Gracias a sus componentes y herramientas integradas.
-   **Seguridad**: Ofrece protección contra vulnerabilidades comunes (XSS, CSRF, inyección SQL).
-   **Escalabilidad**: Buen rendimiento y adaptable a proyectos de gran tamaño.
-   **Gran comunidad**: Amplio soporte, tutoriales y paquetes de terceros.
-   **Curva de aprendizaje**: Considerada accesible para quienes conocen PHP y OOP.

### 🧩 Componentes Clave

-   **Composer**: Gestor de dependencias de PHP.
-   **Artisan**: Interfaz de línea de comandos para tareas comunes (crear controladores, migraciones, etc.).
-   **Eloquent ORM**: Mapeo Objeto-Relacional para interactuar con la base de datos de forma intuitiva.
-   **Blade**: Motor de plantillas potente y sencillo.
-   **Vite**: Herramienta de frontend para compilar y gestionar assets (CSS, JS).

### 🔄 Ciclo de Vida de una Petición

1.  **Entrada (`index.php`)**: El punto de entrada de todas las peticiones.
2.  **Kernel HTTP**: Carga los proveedores de servicios y el middleware global.
3.  **Service Providers**: Registran y arrancan los servicios de la aplicación.
4.  **Router**: Dirige la petición a la ruta o controlador correspondiente.
5.  **Middleware**: Capas que filtran las peticiones HTTP (autenticación, CSRF, etc.).
6.  **Controlador**: Ejecuta la lógica de la aplicación.
7.  **Respuesta**: Se genera una respuesta (HTML, JSON) y se envía al cliente.

### routing: Rutas

-   **Definición**:
    -   `routes/web.php`: Para rutas con estado (sesiones, cookies).
    -   `routes/api.php`: Para rutas sin estado (APIs).
-   **Tipos de Verbos**:
    -   `GET`: Obtener recursos.
    -   `POST`: Crear recursos.
    -   `PUT` / `PATCH`: Actualizar recursos.
    -   `DELETE`: Eliminar recursos.
-   **Parámetros**: Captura de segmentos dinámicos de la URL.
-   **Rutas con nombre**: Asigna un alias a una ruta para referenciarla fácilmente.
-   **Grupos de rutas**: Aplica atributos (middleware, prefijos) a un conjunto de rutas.

### 🕹️ Controladores

-   **Lógica de la aplicación**: Contienen la lógica principal para manejar las peticiones.
-   **Generación con Artisan**: `php artisan make:controller NombreController`.
-   **Métodos de acción**: Funciones públicas que responden a las rutas.
-   **Resource Controllers**: Controladores predefinidos para operaciones CRUD.

### 🖼️ Vistas

-   **Capa de presentación**: Separan la lógica de la aplicación del HTML.
-   **Blade**:
    -   **Sintaxis**: Usa `{{ $variable }}` para imprimir datos y `@directiva` para estructuras de control.
    -   **Directivas**: `@if`, `@foreach`, `@auth`, etc.
    -   **Layouts**: Plantillas maestras que se extienden con `@extends` y `@section`.
    -   **Componentes**: Piezas de UI reutilizables.
-   **Pasar datos**: Se envían datos desde el controlador usando `view('nombre.vista', ['clave' => $valor])`.

### 🗄️ Modelos

-   **Eloquent ORM**:
    -   **Definición**: Cada tabla de la base de datos tiene un modelo correspondiente para interactuar con ella.
    -   **Relaciones**:
        -   Uno a uno (`hasOne`, `belongsTo`).
        -   Uno a muchos (`hasMany`, `belongsTo`).
        -   Muchos a muchos (`belongsToMany`).
    -   **Consultas**: Permite construir consultas a la base de datos de forma fluida y programática.
-   **Interacción con la BD**: Representan la capa de datos de la aplicación.

### 💾 Bases de Datos

-   **Configuración**: Se define en el archivo `.env`.
-   **Migraciones**: Control de versiones para el esquema de la base de datos.
    -   Permiten crear y modificar tablas de forma programática.
-   **Query Builder**: Interfaz fluida para construir consultas SQL.
-   **Seeders**: Permiten poblar la base de datos con datos de prueba.

### 🔐 Autenticación

-   **Laravel Breeze**: Scaffolding simple y personalizable para autenticación.
-   **Laravel Jetstream**: Scaffolding más avanzado con opciones como autenticación de dos factores, gestión de equipos, etc.
-   **Laravel Sanctum**: Autenticación ligera para SPAs y APIs (basada en tokens).
-   **Gates y Policies**: Definen las reglas de autorización para las acciones de los usuarios.

### 📡 API REST

-   **Rutas de API**: Definidas en `routes/api.php`, son stateless y usualmente retornan JSON.
-   **Controladores de API**: Optimizados para devolver respuestas JSON.
-   **Resource Responses**: Estandarizan las respuestas JSON para el CRUD.
-   **Sanctum (Tokens)**: Proporciona un sistema sencillo de autenticación por tokens de API.

### 🚀 Despliegue

-   **Servidores**:
    -   **Laravel Forge**: Servicio para aprovisionar y gestionar servidores optimizados para Laravel.
    -   **Laravel Vapor**: Plataforma de despliegue serverless para Laravel en AWS.
    -   **Manual**: Despliegue en servidores compartidos o VPS.
-   **Optimización**: Comandos como `php artisan optimize`, `config:cache`, `route:cache` para mejorar el rendimiento en producción.

### 🌐 Comunidad y Recursos

-   **[Documentación oficial](https://laravel.com/docs)**: La fuente principal y más fiable.
-   **[Laracasts](https://laracasts.com/)**: Tutoriales en vídeo de alta calidad (el "Netflix para desarrolladores").
-   **Foros y blogs**: Stack Overflow, Laravel News, etc.
-   **Paquetes (Packages)**: Un ecosistema enorme de paquetes en [Packagist](https://packagist.org/) para extender funcionalidades.

### 🛡️ Seguridad

-   **Protección CSRF**: Laravel genera y verifica automáticamente tokens CSRF en los formularios.
-   **Inyección SQL (Eloquent)**: El ORM usa "parameter binding" para prevenir ataques de inyección SQL.
-   **Cross-Site Scripting (XSS)**: Blade escapa automáticamente las variables `{{ }}` para prevenir XSS.
-   **Hashing de contraseñas**: Usa Bcrypt por defecto para almacenar contraseñas de forma segura.