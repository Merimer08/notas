<x-1public>
    {{-- Pasamos un título personalizado al layout --}}
    <x-slot name="title">
        Bienvenido al Gestor de Notas
    </x-slot>



    {{-- Aquí va solo el contenido específico de esta página --}}

    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Welcome to Note Manager</h1>
        <p>This is the welcome page.</p>
        <p> Se trata Este texto describe un proyecto de gestión de notas personales en línea desarrollado con Laravel 12, que incluye funcionalidades como CRUD (Crear, Leer, Actualizar, Borrar), búsqueda, etiquetas y paginación. El sistema ofrece autenticación de usuario a través de Breeze y una API REST segura con tokens Sanctum, permitiendo la creación y administración de notas aisladas por usuario. Se detallan los requisitos, pasos de instalación, configuración y arranque local, así como la estructura del proyecto, los modelos de datos, las relaciones, las rutas web y API, y ejemplos de cómo interactuar con la API usando cURL. Finalmente, el documento aborda solución de problemas frecuentes, opciones de despliegue y un plan de desarrollo con ideas futuras para el proyecto.

        </p>
    </div>

  <div class="bg-white shadow-md rounded-lg p-6 md:p-8">

    {{-- 1 columna en móvil, 2 en pantallas medianas (iPad vertical) en adelante --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-start">

        <div>
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Pruébalo</h2>
            <p class="mb-6 text-gray-600">
                Interactúa directamente con la aplicación web. Regístrate para crear tu cuenta y empezar a gestionar tus notas personales.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('login') }}" class="px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700">
                    Registrarse
                </a>
            </div>
        </div>

        <div class="md:border-l md:pl-8 border-gray-200">
            <h2 class="text-2xl font-semibold mb-3 text-gray-800">Como una API</h2>
            <p class="mb-4 text-gray-600">
                También puedes interactuar con la API REST segura. Ideal para integrar con otras aplicaciones o scripts.
            </p>
            <div class="flex">
                <a href="#" class="px-5 py-2.5 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-800">
                    Ver Documentación API
                </a>
            </div>
        </div>

    </div>
</div>
</div>

    </div>
    <div class="bg-white shadow-md rounded-lg p-6">

        <article class="mb-6">
            <h2 class="text-2xl font-semibold border-b pb-2 mb-3">Mapa mental</h2>
            <p>Para una visión general del proyecto, consulta el <a href="{{ url('/mental') }}" target="_blank" class="text-blue-500 underline">mapa mental</a>.</p>
        </article>

    </div>
    <div class="bg-white shadow-md rounded-lg p-6">
        <article class="mb-6">
            <h2 class="text-2xl font-semibold border-b pb-2 mb-3">Instruciones</h2>
            <p>Para una visión general del proyecto, consulta el <a href="{{ url('/instruciones') }}" target="_blank" class="text-blue-500 underline">instruciones</a>.</p>
        </article>
    </div>

</x-1public>
<x-1footer />