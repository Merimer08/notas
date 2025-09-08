# Gestor de Notas (Laravel 12 + Breeze + Sanctum)

MVP de un gestor de **notas personales** con **CRUD**, **búsqueda**, **etiquetas**, **paginación/ordenación** y **API REST** autenticada (tokens **Sanctum**).  
Frontend en **Blade** (Breeze), backend en **Laravel 12**.

---

## 🚀 Funcionalidades (MVP)

- Autenticación de usuario (Breeze: login/registro/logout).
- API con tokens (Sanctum) para consumo externo.
- Notas por usuario (aislamiento por Policies).
- CRUD de notas.
- Etiquetas (tagging) + filtro por etiquetas.
- Búsqueda por **título** y **contenido**.
- Paginación, ordenación y validación.
- README y demo listos.

---

## 🧰 Requisitos

- **PHP 8.2+**
- **Composer**
- **Node.js 18+**
- **MySQL/MariaDB** (XAMPP en Windows funciona) o **SQLite** (solo para tests)

---

## 🛠 Instalación y arranque (local)

### 1) Crear o clonar proyecto

```bash
# Nuevo proyecto
composer create-project laravel/laravel notas
cd notas
php artisan key:generate

# (O) Proyecto clonado
git clone https://github.com/tuusuario/gestor-notas.git
cd gestor-notas
composer install
npm install
2) Configurar entorno
bash
Copiar código
cp .env.example .env
php artisan key:generate
Edita .env (ejemplo Windows + XAMPP):

env
Copiar código
APP_URL=http://localhost:8000
APP_DEBUG=true

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
3) Autenticación (Breeze) y Sanctum
bash
Copiar código
# Breeze (sesión web)
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run build

# Sanctum (tokens API)
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
Las rutas de la API usarán el middleware auth:sanctum.

4) Migraciones + tabla de sesiones
bash
Copiar código
php artisan session:table
php artisan migrate
5) Seed de usuario inicial + token API
Seeder que crea/actualiza un usuario de desarrollo y muestra en consola un token Sanctum:

bash
Copiar código
php artisan db:seed --class=Database\Seeders\AdminUserSeeder
Valores por defecto del seeder (modificables):

Email: mariamalospelos@gmail.com

Pass: 123456789

Token: se imprime en consola

Alternativa (manual) en Tinker:

bash
Copiar código
php artisan tinker
>>> $u = App\Models\User::first();
>>> $u->createToken('demo')->plainTextToken;
6) Arranque en desarrollo
bash
Copiar código
# Opción A (recomendada en Windows): procesos por separado
php artisan serve
npm run dev

# Opción B: script si lo tienes declarado en composer.json (sin Pail)
composer run dev
Accede en http://localhost:8000.

🗂 Estructura relevante
pgsql
Copiar código
app/
  Http/
    Controllers/
      NoteController.php         ← Web
      Api/NoteController.php     ← API
    Resources/
      NoteResource.php
  Models/
    Note.php
    Tag.php
  Policies/
    NotePolicy.php
resources/views/notes/
  index.blade.php
  create.blade.php
  edit.blade.php
  show.blade.php
routes/
  web.php
  api.php
database/
  migrations/
  seeders/
  factories/
🔐 Autorización (Policies)
NotePolicy: solo la dueña puede ver/actualizar/borrar su nota.

viewAny() = true (el filtrado real por usuario se hace en la query del controlador).

Mapea la policy en AuthServiceProvider:

php
Copiar código
protected $policies = [
    \App\Models\Note::class => \App\Policies\NotePolicy::class,
];
🧩 Modelos, relaciones y migraciones
Note

belongsTo(User)

belongsToMany(Tag, 'note_tag')

Tag

belongsToMany(Note, 'note_tag')

Migraciones (resumen):

notes: id, user_id FK, title, content, pinned (bool), is_archived (bool), timestamps.

tags: id, name, slug (único), timestamps.

note_tag: pivote con note_id y tag_id (FKs, PK compuesta).

MySQL (Windows/XAMPP):

Asegura que todos los IDs sean unsigned BIGINT.

Corre primero notes y tags, y después note_tag.

Engine InnoDB.

Si ves errno: 150 al crear note_tag, revisa tipos, nombres de columnas y orden de migraciones.

🌐 Rutas
Web (routes/web.php)
/notes → CRUD UI (protegido con auth)

/ → redirect a /notes (dashboard)

API (routes/api.php)
Prefijo /api/v1 + auth:sanctum:

GET /api/v1/notes — listar (filtros q, tags, sort, per_page)

POST /api/v1/notes — crear (201)

GET /api/v1/notes/{id} — ver

PATCH /api/v1/notes/{id} — actualizar

DELETE /api/v1/notes/{id} — eliminar (204)

GET /api/v1/me — usuario autenticado

Comprobar que están registradas:

bash
Copiar código
php artisan route:list | Select-String -Pattern 'api/v1/notes'
🧭 Búsqueda, filtros y ordenación
q: busca en title y content.

tags: work,ideas (CSV) o ["work","ideas"] (API).

sort: created_at, -created_at, updated_at, -updated_at, title, -title, pinned, -pinned.

per_page: tamaño de página (máx 50).

📡 Ejemplos cURL (API)
bash
Copiar código
# Listar
curl -H "Authorization: Bearer TOKEN" http://localhost:8000/api/v1/notes

# Filtros y orden
curl -H "Authorization: Bearer TOKEN" \
"http://localhost:8000/api/v1/notes?q=hola&tags=work,ideas&sort=-updated_at&per_page=5"

# Crear (201)
curl -X POST http://localhost:8000/api/v1/notes \
  -H "Authorization: Bearer TOKEN" -H "Content-Type: application/json" \
  -d '{"title":"Primera API","content":"hola","pinned":false,"is_archived":false,"tags":["work","ideas"]}'

# Ver
curl -H "Authorization: Bearer TOKEN" http://localhost:8000/api/v1/notes/1

# Actualizar
curl -X PATCH http://localhost:8000/api/v1/notes/1 \
  -H "Authorization: Bearer TOKEN" -H "Content-Type: application/json" \
  -d '{"title":"Renombrada"}'

# Eliminar (204)
curl -X DELETE -H "Authorization: Bearer TOKEN" http://localhost:8000/api/v1/notes/1
🖥️ UI (Blade + Breeze)
Índice con buscador (q), filtro por tags, ordenación (sort) y paginación.

Vistas create, edit, show con validación server-side.

Enlace a Perfil opcional (profile.edit); si no lo usas, elimínalo del layout o protégelo con @if(Route::has('profile.edit')).

🧪 Tests
Ejecutar:

bash
Copiar código
php artisan test
Tests mínimos recomendados:

API

lista solo mis notas.

crea nota con tags (201).

(extra) 403 al ver nota ajena.

(extra) 422 si falta title.

Web

muestra mis notas en /notes.

permite borrar desde UI.

Home

/ redirige a /notes.

Para acelerar tests: en phpunit.xml usa SQLite in-memory:

xml
Copiar código
<server name="DB_CONNECTION" value="sqlite"/>
<server name="DB_DATABASE" value=":memory:"/>
☁️ Demo / Producción
.env:

APP_ENV=production

APP_DEBUG=false

APP_URL=https://tu-dominio.com

SESSION_SECURE_COOKIE=true (si usas HTTPS)

Despliegue:

bash
Copiar código
php artisan migrate --force
php artisan optimize
CORS (si consumirás desde otro host): configura config/cors.php.

Opciones: Laravel Forge + VPS, Railway/Render, Ploi, Vapor (AWS).

🧰 Solución de problemas (FAQ)
Foreign key errno: 150 en note_tag

Asegura unsigned BIGINT y orden correcto de migraciones.

Engine InnoDB y nombres de tablas/columnas correctos.

Pail en Windows (pcntl requerido)

Evita laravel/pail en Windows o quítalo del script dev. Usa:

bash
Copiar código
php artisan serve
npm run dev
419 Page Expired

Incluye @csrf en formularios.

SESSION_DRIVER=database + php artisan session:table && php artisan migrate.

APP_URL coherente con tu host/puerto.

Route [profile.edit] not defined

Añade rutas de perfil (Breeze) o quita el enlace:

php
Copiar código
Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
Class "Model" not found

Modelos con namespace App\Models y extends Illuminate\Database\Eloquent\Model.

Rutas API no aparecen en route:list

Asegura que routes/api.php empiece exactamente con <?php (sin BOM/espacios), tenga use App\Http\Controllers\Api\NoteController;, y limpia cachés:

bash
Copiar código
composer dump-autoload
php artisan optimize:clear
php artisan route:list
🗺️ Roadmap (ideas)
Papelera (SoftDeletes) + restaurar.

Etiquetas con colores.

Markdown en contenido (CommonMark).

Export/Import JSON.

OpenAPI/Swagger (L5-Swagger).

Inertia + React / Livewire.

Búsqueda full-text (Scout + Meilisearch).