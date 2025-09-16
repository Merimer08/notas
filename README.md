# 📝 Gestor de Notas Online (Laravel 12)

## ☁️ Demo en Producción

➡️ [https://notasml.up.railway.app/](https://notasml.up.railway.app/)

## 🎯 Resumen del Proyecto

Este es un **gestor de notas personales** completo, desarrollado como un proyecto **MVP** (Producto Mínimo Viable).  
La aplicación ofrece una solución robusta para la gestión de notas, con una interfaz web (`Blade`) y una **API REST** segura para su consumo externo.

Desarrollado con **Laravel 12**, el proyecto implementa las mejores prácticas del framework:

- **Autenticación**: Gestión de usuarios completa con `Laravel Breeze`.
- **Autorización**: Políticas de acceso (`Policies`) para asegurar que cada usuario solo pueda interactuar con sus propias notas.
- **API**: `Laravel Sanctum` para autenticación segura de la API mediante tokens.
- **Manejo de Datos**: CRUD de notas con **etiquetas**, **búsqueda**, **filtros** y **ordenación**.

---

## ✨ Características Principales

### **Frontend (Blade)**

- CRUD completo (crear, leer, actualizar, eliminar notas).
- Panel de control con listado, paginación y buscador avanzado.
- Filtros combinables (texto + etiquetas).
- Seguridad CSRF en formularios.

### **Backend (API REST)**

- Rutas protegidas con `auth:sanctum`.
- Endpoints estándar (`Route::apiResource`).
- Filtros avanzados: `q`, `tags`, `sort`, `per_page`.
- Validación robusta de requests.

---

## 🛠 Requisitos y Tecnología

- **Lenguajes**: PHP 8.2+, Node.js 18+
- **Frameworks**: Laravel 12, Breeze, Sanctum
- **Gestores**: Composer, npm
- **BD**: MySQL / MariaDB o SQLite
- **Servidor**: `php artisan serve`

---

## 🚀 Instalación y Arranque Local

### 1. Clonar el Repositorio

```bash
git clone https://github.com/tu-usuario/gestor-notas.git
cd gestor-notas
```

### 2. Configurar Entorno

```bash
cp .env.example .env
php artisan key:generate
```

Editar `.env` con:

```env
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=notas
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Instalar Dependencias

```bash
composer install
npm install
```

### 4. Instalar Breeze y Sanctum

```bash
# Breeze
composer require laravel/breeze --dev
php artisan breeze:install blade
npm run build

# Sanctum
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

### 5. Migraciones y Sesiones

```bash
php artisan session:table
php artisan migrate
```

### 6. Arrancar Servidor Local

```bash
php artisan serve
npm run dev
```

Aplicación: [http://localhost:8000](http://localhost:8000)

---

## 🔒 Autorización (Policies)

La `NotePolicy` asegura que solo la dueña pueda ver/editar/borrar sus notas.

```php
protected $policies = [
    \App\Models\Note::class => \App\Policies\NotePolicy::class,
];
```

---

## 📦 Estructura del Proyecto

```
app/
  Http/
    Controllers/
      NoteController.php       ← Web
      Api/NoteController.php   ← API
    Resources/NoteResource.php
  Models/
    Note.php
    Tag.php
  Policies/NotePolicy.php
resources/views/notes/
  index.blade.php
  create.blade.php
  edit.blade.php
routes/
  web.php
  api.php
database/
  migrations/
  seeders/
  factories/
```

---

## 🌐 Rutas y API

### Web (con `auth`)

- `GET /notes` — listado
- `POST /notes` — crear
- `GET /notes/{id}` — ver
- `PATCH /notes/{id}` — actualizar
- `DELETE /notes/{id}` — borrar

### API (con `auth:sanctum`)

- `GET /api/v1/notes`
- `POST /api/v1/notes`
- `GET /api/v1/notes/{id}`
- `PATCH /api/v1/notes/{id}`
- `DELETE /api/v1/notes/{id}`

---

## 📡 Ejemplos cURL

```bash
# Listar notas
curl -H "Authorization: Bearer TOKEN" http://localhost:8000/api/v1/notes

# Crear nota
curl -X POST http://localhost:8000/api/v1/notes   -H "Authorization: Bearer TOKEN"   -H "Content-Type: application/json"   -d '{"title":"Primera API","content":"hola","tags":["work","ideas"]}'
```

---

## 🧪 Tests

Ejecutar:

```bash
php artisan test
```

Incluye pruebas de:

- API: CRUD, filtros, autorización.
- Web: CRUD UI y redirecciones.

---

## ☁️ Demo en Producción

➡️ [https://notasml.up.railway.app/](https://notasml.up.railway.app/)

Despliegue:

```bash
php artisan migrate --force
php artisan optimize
```

---

## 🧰 FAQ (Solución de Problemas)

- **419 Page Expired** → Revisar `@csrf` y APP_URL en `.env`.
- **Foreign key errno 150** → Revisar tipos y orden en migraciones.
- **Route [profile.edit] not defined** → Quitar enlace o definir ruta.

---

## 🗺️ Roadmap

- Papelera con SoftDeletes.
- Etiquetas con colores.
- Editor Markdown.
- Exportar/Importar JSON.
- OpenAPI/Swagger.
- Inertia + React.
