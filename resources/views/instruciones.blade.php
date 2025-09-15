<x-1public>
    
    <main>
        <a href="{{ route('login') }}" class="btn bg-orange-500 text-white hover:bg-orange-400 border-none">Iniciar Sesión </a>
        <a href="{{ route('register') }}" class="btn bg-orange-500 text-white hover:bg-orange-400 border-none">Registrarse </a>
        <article>
            <h2>Características principales:</h2>
            <ul>
                <li>CRUD completo para notas personales.</li>
                <li>Búsqueda y filtrado de notas por etiquetas.</li>
                <li>Paginación para manejar grandes cantidades de notas.</li>
                <li>Autenticación de usuarios con Breeze.</li>
                <li>API REST segura con tokens Sanctum.</li>
            </ul>
        </article>  
        <article>
            <h2>Mapa mental</h2>
            <p>Para una visión general del proyecto, consulta el <a href="{{ url('/mental') }} " target="_blank" class="text-blue-500 underline">mapa mental</a>.</p>
        
        <article    >
            <h2>Requisitos:</h2>
            <ul>
                <li>PHP 8.1 o superior</li>
                <li>Composer</li>
                <li>Base de datos MySQL o SQLite</li>
                <li>Laravel 12</li>
            </ul>
        </article>
        <article>
            <h2>Instalación y configuración:</h2>
            <ol>
                <li>Clona el repositorio: <code>git clone https://github.com/Merimer08/notas.git</code></li>
                <li>Accede al directorio del proyecto: <code>cd notas</code></li>
                <li>Instala las dependencias: <code>composer install</code></li>
                <li>Copia el archivo de entorno: <code>cp .env.example .env</code></li>
                <li>Genera la clave de la aplicación: <code>php artisan key:generate</code></li>
                <li>Configura la base de datos en el archivo <code>.env</code>.</li>
                <li>Ejecuta las migraciones: <code>php artisan migrate</code            ></li>
                <li>Instala Breeze para autenticación: <code>composer require laravel/b                 reeze --dev</code> y <code>php artisan breeze:install</code></li>
                <li>Instala Sanctum para la API: <code>composer require laravel/sanctum</code> y <code>php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"</code></li>
                <li>Ejecuta las migraciones de Sanctum: <code>php artisan migrate</code></li>
            </ol>   
        </article>
        <article>
            <h2>Arranque local:</h2>
            <p>Inicia el servidor de desarrollo con: <code>php artisan serve</code></p>
            <p>Accede a la aplicación en tu navegador en <a href="http://localhost:8000">http://localhost:8000</a></p>  
        </article>
        <article>       
            <h2>Estructura del proyecto:</h2>
            <ul>
                <li><code>app/Models/Note.php</code>: Modelo de Nota.</li>
                <li><code>app/Models/Tag.php</code>: Modelo de Etiqueta.</li>
                <li><code>app/Http/Controllers/WebNoteController.php</code>: Controlador para la gestión de notas en la interfaz web.</li>
                <li><code>app/Http/Controllers/ApiNoteController.php</code>: Controlador para la API REST.</li>
                <li><code>routes/web.php</code>: Rutas web protegidas por autenticación.</li>
                <li><code>routes/api.php</code>: Rutas de la API protegidas por Sanctum.</li>
            </ul>                           </article>
        <article>           
            <h2>Modelos y relaciones:</h2>
            <ul>
                <li><strong>Note</strong>: Pertenece a un usuario y puede tener múltiples etiquetas (relación muchos a muchos).</li>
                <li><strong>Tag</strong>: Puede estar asociada a múltiples notas (relación muchos a muchos).</li>
            </ul>   
        </article>
        <article>           
            <h2>Rutas principales:</h2>
            <ul>
                <li><code>GET /notes</code>: Listar notas del usuario autenticado.</li>
                <li><code>POST /notes</code>: Crear una nueva nota.</li>
                <li><code>GET /notes/{id}</code>: Ver una nota específica.</li>
                <li><code>PUT /notes/{id}</code>: Actualizar una nota existente.</li>
                <li><code>DELETE /notes/{id}</code>: Eliminar una nota.</li>
                <li><code>GET /tags</code>: Listar todas las etiquetas.</li>
            </ul>                       </article>
        <article>           
            <h2>Ejemplos de uso de la API con cURL:</h2>
            <pre><code># Obtener token de autenticación     
curl -X POST http://localhost:8000/api/login -d "   

            </code>

            </pre>
            <pre><code># Listar notas   </code>
            </pre>  
        </article>  
        <article>           
            <h2>Solución de problemas comunes:</h2>
            <ul>
                <li>Si tienes problemas con las migraciones, asegúrate de que la configuración de la base de datos en <code>.env</code> es correcta.</li>
                <li>Para problemas de autenticación, verifica que Breeze y Sanctum estén correctamente instalados y configurados.</li>
            </ul>       </article>
        <article>           
            <h2>Despliegue:</h2>
            <p>Para desplegar la aplicación, asegúrate de configurar correctamente el entorno de producción, incluyendo la base de datos y las variables de entorno. Utiliza servicios como Laravel Forge, Vapor o cualquier proveedor de hosting compatible con Laravel.</p>       </article>
        <article>        
            <h2>Plan de desarrollo y futuras mejoras:</h2>
            <ul>
                <li>Implementar notificaciones por correo electrónico para recordatorios de notas.</li>
                <li>Agregar soporte para compartir notas entre usuarios.</li>
                <li>Mejorar la interfaz de usuario con frameworks como Tailwind CSS o Bootstrap.</li>
                <li>Optimizar la búsqueda y el filtrado de notas.</li>
            </ul>       </article>  
    </main></x-1public>