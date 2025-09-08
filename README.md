voy a realizar un proyecto para mi cv que es un gestor de notas online. Objetivo contruir una aplicacion en laravel que permita crear, leer actualizar y eliminar notas, con busqueda y etiquetas y exponer API REST autenticada para consumo externo. ALCANCE (MVP) usuarios con sesion laravel breeze y/o token con sanctum notas personales (cada nota pertenece a su usuario) CRUD de notas etiquetas (targging ) y filtro por etiquetas busqueda por titulo y contenido Api rest pública (autenticada) con json paginacion, ordenacionn y validacion README claro + demo online. daame pasos

1) Arranque del proyecto

Crear proyecto

composer create-project laravel/laravel notas
cd notas
php artisan key:generate

2) Git básico

## 2) Autenticación (Breeze + Sanctum)

Breeze (sesión web)

composer require laravel/breeze --dev
php artisan breeze:install blade
php artisan migrate
npm install && npm run build


Sanctum (tokens para API)

composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate


En app/Http/Kernel.php asegura \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class en web si lo necesitas y usa auth:sanctum en las rutas de la AP


# 📝 Gestor de Notas Online (Laravel)

Aplicación en **Laravel 11** que permite crear, leer, actualizar y eliminar notas personales.  
Incluye autenticación con **Laravel Breeze** (sesiones web) y **Laravel Sanctum** (tokens API).  

Cada usuario gestiona sus propias notas, con soporte para **etiquetas**, **búsqueda**, **filtros**, **paginación** y **ordenación**.  
Se expone además una **API REST autenticada con JSON** para consumo externo.

---

## 🚀 Funcionalidades (MVP)

- [x] Registro e inicio de sesión de usuarios (Laravel Breeze).
- [x] Autenticación vía tokens (Sanctum) para la API.
- [x] CRUD completo de notas.
- [x] Etiquetas (tagging) con filtro por etiquetas.
- [x] Búsqueda en título y contenido.
- [x] Paginación, ordenación y validación.
- [x] API REST pública (autenticada).
- [x] README claro + demo online.

---

## ⚙️ Requisitos

- PHP >= 8.2  
- Composer  
- Node.js & NPM  
- MySQL / PostgreSQL / SQLite  

---

## 🛠 Instalación local

1. Clonar el repo:
   ```bash
   git clone https://github.com/tuusuario/gestor-notas.git
   cd gestor-notas
Instalar dependencias:

composer install
npm install


Configurar entorno:

cp .env.example .env
php artisan key:generate


Edita .env con tus credenciales de base de datos.

Migraciones y seed:

php artisan migrate --seed


Compilar assets:

npm run build


Levantar servidor:

php artisan serve
Instalar dependencias:

composer install
npm install


Configurar entorno:

cp .env.example .env
php artisan key:generate


Edita .env con tus credenciales de base de datos.

Migraciones y seed:

php artisan migrate --seed


Compilar assets:

npm run build


Levantar servidor:

php artisan serve


Accede en: http://localhost:8000

🔑 Autenticación
Sesión Web

Usa Breeze para login/registro en la interfaz Blade.

API Tokens

Generar un token:

php artisan tinker
>>> $user = App\Models\User::first();
>>> $user->createToken('demo')->plainTextToken;


Usar en peticiones:

Authorization: Bearer TU_TOKEN

📡 API REST

Base URL:

/api/v1

Endpoints principales
Método	Endpoint	Descripción
POST	/auth/token	Generar token (opcional).
GET	/me	Ver datos del usuario autenticado.
GET	/notes	Listar notas (con filtros, búsqueda, paginación).
POST	/notes	Crear nota.
GET	/notes/{id}	Ver nota.
PUT	/notes/{id}	Actualizar nota.
DELETE	/notes/{id}	Eliminar nota.
Parámetros de consulta

q: búsqueda en título/contenido.

tags: lista separada por comas (work,ideas).

sort: campo y dirección (created_at, -created_at, title, -title).

page: número de página.

per_page: tamaño de página (máx 50).

Ejemplo:

GET /api/v1/notes?q=laravel&tags=personal,work&sort=-created_at&page=1&per_page=10

📖 Validaciones

title: requerido, máx 200 caracteres.

content: opcional.

tags: array opcional de strings.

pinned / is_archived: booleanos.

👤 Demo online

👉 https://tu-demo-online.com

Usuario demo: demo@example.com
Password: password

🧪 Tests

Ejecutar pruebas:

php artisan test

📌 Roadmap (futuro)

Papelera con Soft Deletes.

Compartir notas con colaboradores.

Adjuntos en S3.

Etiquetas con colores.

Búsqueda full-text con Laravel Scout + Meilisearch.


# Gestor de Notas (Laravel + Breeze + Sanctum)

Proyecto MVP para un gestor de notas personales con búsqueda, etiquetas y API REST autenticada.

## ✨ Funcionalidad
- Autenticación (Laravel Breeze).
- Notas personales (cada nota pertenece a su usuario).
- CRUD de notas.
- Búsqueda por **título** y **contenido**.
- **Etiquetas** (tagging) y filtro por etiquetas.
- **Paginación**, **ordenación** y **validación**.
- **API REST** (JSON) protegida con **Sanctum (Bearer token)**.
- README claro + demo.

---

## 🧰 Requisitos
- PHP 8.2+
- Composer
- MySQL/MariaDB (XAMPP OK)
- Node 18+
- (Windows) PowerShell

## ⚙️ Configuración rápida

1) Clonar el repo e instalar dependencias:
```bash
composer install
npm install
```

2) Copiar `.env` y ajustar claves **APP_URL**/DB/**SESSION** (dev en Windows):
```env
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=notas
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_DOMAIN=
SESSION_SECURE_COOKIE=false
SESSION_SAME_SITE=lax
```

3) Migraciones + tabla sesiones:
```bash
php artisan key:generate
php artisan session:table
php artisan migrate
```

4) **Usuario inicial** y **token API**:
```bash
php artisan db:seed --class=Database\Seeders\AdminUserSeeder
```
Se creará/actualizará:
- Email: `mariamalospelos@gmail.com`
- Pass:  `123456789`
- Token: se imprime en consola

> Cambia estos datos en `database/seeders/AdminUserSeeder.php` solo para desarrollo.

5) Arranque en **Windows** (sin Pail):
```bash
composer run dev
```
Si quieres ver logs:
```powershell
Get-Content .\storage\logs\laravel.log -Wait -Tail 200
```

---

## 🖥️ UI (Blade + Breeze)
- Accede a `http://localhost:8000`
- Crea/edita/elimina notas, busca (`q`), filtra por `tags` (coma separadas) y ordena (`sort`).

---

## 🔐 API (Sanctum, Bearer)
Prefijo: `/api/v1`

Encabezado:
```
Authorization: Bearer <TU_TOKEN>
```

### Endpoints
- `GET    /api/v1/notes` — lista con filtros `q`, `tags`, `sort`, `per_page`
- `POST   /api/v1/notes` — crear
- `GET    /api/v1/notes/{id}` — ver
- `PATCH  /api/v1/notes/{id}` — actualizar
- `DELETE /api/v1/notes/{id}` — eliminar
- `GET    /api/v1/me` — usuario autenticado

### Ejemplos cURL
```bash
# Listar
curl -H "Authorization: Bearer TOKEN" http://localhost:8000/api/v1/notes

# Filtrar / buscar / ordenar / paginar
curl -H "Authorization: Bearer TOKEN" "http://localhost:8000/api/v1/notes?q=hola&tags=work&sort=-updated_at&per_page=5"

# Crear
curl -X POST http://localhost:8000/api/v1/notes -H "Authorization: Bearer TOKEN" -H "Content-Type: application/json" -d '{"title":"Primera API","content":"hola","pinned":false,"is_archived":false,"tags":["work","ideas"]}'

# Actualizar
curl -X PATCH http://localhost:8000/api/v1/notes/1 -H "Authorization: Bearer TOKEN" -H "Content-Type: application/json" -d '{"title":"Renombrada desde API"}'

# Eliminar
curl -X DELETE -H "Authorization: Bearer TOKEN" http://localhost:8000/api/v1/notes/1
```

> **Tags**: si usas el controlador que sincroniza CSV, también puedes enviar `tags` como texto `"work, ideas"`.

---

## 🧪 Tests (PHPUnit)
Incluyo 2 tests de **Feature** (API y Web) + factories para `Note` y `Tag`.

### Ejecutar
```bash
php artisan test
```

> Los tests usan `RefreshDatabase` para correr migraciones automáticamente. Asegúrate de haber configurado la conexión de test (`phpunit.xml`) si usas otra DB.

---

## 📦 Estructura relevante
```
app/
  Http/
    Controllers/
      NoteController.php        <-- Web
      Api/NoteController.php    <-- API
  Models/
    Note.php
    Tag.php
resources/views/notes/
  index.blade.php
  create.blade.php
  edit.blade.php
  show.blade.php
routes/
  web.php
  api.php
database/migrations/
database/seeders/
database/factories/
```

---

## 🗺️ Backlog (ideas)
- Papelera (soft deletes) y restauración.
- Editor Markdown.
- Export/Import JSON.
- OpenAPI/Swagger.
- Inertia + React o Livewire.

---

## 🔒 Producción (resumen)
- `APP_DEBUG=false`
- HTTPS → `SESSION_SECURE_COOKIE=true`
- `php artisan migrate --force`
- `php artisan optimize`
- Configurar CORS si consumirás API desde SPA externa.
