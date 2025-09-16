<x-1public>
    <main class="bg-gray-100 min-h-screen p-8 flex flex-col items-center">

      

        <div class="w-full max-w-4xl space-y-6">

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Características principales</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>CRUD completo para notas personales.</li>
                    <li>Búsqueda y filtrado de notas por etiquetas.</li>
                    <li>Paginación para manejar grandes cantidades de notas.</li>
                    <li>Autenticación de usuarios con Breeze.</li>
                    <li>API REST segura con tokens Sanctum.</li>
                </ul>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Mapa mental</h2>
                <p class="text-gray-700">
                    Para una visión general del proyecto, consulta el 
                    <a href="{{ url('/mental') }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline font-medium transition-colors duration-200">mapa mental</a>.
                </p>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Requisitos</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>PHP 8.1 o superior</li>
                    <li>Composer</li>
                    <li>Base de datos MySQL o SQLite</li>
                    <li>Laravel 12</li>
                </ul>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Instalación y configuración</h2>
                <ol class="list-decimal list-inside space-y-2 text-gray-700">
                    <li>Clona el repositorio: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">git clone https://github.com/Merimer08/notas.git</code></li>
                    <li>Accede al directorio del proyecto: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">cd notas</code></li>
                    <li>Instala las dependencias: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">composer install</code></li>
                    <li>Copia el archivo de entorno: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">cp .env.example .env</code></li>
                    <li>Genera la clave de la aplicación: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">php artisan key:generate</code></li>
                    <li>Configura la base de datos en el archivo <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">.env</code>.</li>
                    <li>Ejecuta las migraciones: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">php artisan migrate</code></li>
                    <li>Instala Breeze para autenticación: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">composer require laravel/breeze --dev</code> y <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">php artisan breeze:install</code></li>
                    <li>Instala Sanctum para la API: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">composer require laravel/sanctum</code> y <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"</code></li>
                    <li>Ejecuta las migraciones de Sanctum: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">php artisan migrate</code></li>
                </ol>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Arranque local</h2>
                <p class="mb-2 text-gray-700">Inicia el servidor de desarrollo con: <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">php artisan serve</code></p>
                <p class="text-gray-700">Accede a la aplicación en tu navegador en <a href="http://localhost:8000" class="text-blue-600 hover:text-blue-800 underline font-medium">http://localhost:8000</a></p>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Estructura del proyecto</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">app/Models/Note.php</code>: Modelo de Nota.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">app/Models/Tag.php</code>: Modelo de Etiqueta.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">app/Http/Controllers/WebNoteController.php</code>: Controlador para la gestión de notas en la interfaz web.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">app/Http/Controllers/ApiNoteController.php</code>: Controlador para la API REST.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">routes/web.php</code>: Rutas web protegidas por autenticación.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">routes/api.php</code>: Rutas de la API protegidas por Sanctum.</li>
                </ul>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Modelos y relaciones</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li><strong>Note</strong>: Pertenece a un usuario y puede tener múltiples etiquetas (relación muchos a muchos).</li>
                    <li><strong>Tag</strong>: Puede estar asociada a múltiples notas (relación muchos a muchos).</li>
                </ul>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Rutas principales</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">GET /notes</code>: Listar notas del usuario autenticado.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">POST /notes</code>: Crear una nueva nota.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">GET /notes/{id}</code>: Ver una nota específica.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">PUT /notes/{id}</code>: Actualizar una nota existente.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">DELETE /notes/{id}</code>: Eliminar una nota.</li>
                    <li><code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">GET /tags</code>: Listar todas las etiquetas.</li>
                </ul>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Ejemplos de uso de la API con cURL</h2>
                <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-x-auto text-sm">
<code># Obtener token de autenticación
curl -X POST http://localhost:8000/api/login \
     -H "Content-Type: application/json" \
     -d '{"email": "tu_email@example.com", "password": "tu_contraseña"}'

# Listar notas
curl -X GET http://localhost:8000/api/notes \
     -H "Authorization: Bearer <token_obtenido>"
</code></pre>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Solución de problemas comunes</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Si tienes problemas con las migraciones, asegúrate de que la configuración de la base de datos en <code class="bg-gray-200 text-purple-700 px-2 py-1 rounded-md">.env</code> es correcta.</li>
                    <li>Para problemas de autenticación, verifica que Breeze y Sanctum estén correctamente instalados y configurados.</li>
                </ul>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Despliegue</h2>
                <p class="text-gray-700">Para desplegar la aplicación, asegúrate de configurar correctamente el entorno de producción, incluyendo la base de datos y las variables de entorno. Utiliza servicios como Laravel Forge, Vapor o cualquier proveedor de hosting compatible con Laravel.</p>
            </article>

            <article class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Plan de desarrollo y futuras mejoras</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Implementar notificaciones por correo electrónico para recordatorios de notas.</li>
                    <li>Agregar soporte para compartir notas entre usuarios.</li>
                    <li>Mejorar la interfaz de usuario con frameworks como Tailwind CSS o Bootstrap.</li>
                    <li>Optimizar la búsqueda y el filtrado de notas.</li>
                </ul>
            </article>
        </div>
    </main>
</x-1public>