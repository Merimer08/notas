<x-1public>
  {{-- Título que usará el layout en <title> --}}
  <x-slot:title>Bienvenido al Gestor de Notas</x-slot:title>

  {{-- Hero / Introducción --}}
  <section class="bg-white shadow-sm rounded-xl p-6 md:p-8 mb-8">
    <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-gray-900 mb-3">
      Bienvenido al Gestor de Notas
    </h1>
    <p class="text-gray-600 leading-relaxed">
      Proyecto de notas personales en línea con Laravel 12, autenticación con Breeze,
      API REST protegida con Sanctum y funcionalidades de CRUD, búsqueda, etiquetas
      y paginación. Ideal para usar vía web o integrarlo desde otra app mediante API.
    </p>
  </section>

  {{-- Doble columna: demo web y API --}}
  <section class="bg-white shadow-sm rounded-xl p-6 md:p-8 mb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-start">
      {{-- Columna izquierda: probar app --}}
      <div>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-3">Pruébalo</h2>
        <p class="text-gray-600 mb-6">
          Entra con tu cuenta o regístrate para empezar a crear y organizar tus notas.
        </p>

        @auth
          <div class="flex flex-wrap gap-3">
            <a href="{{ url('/dashboard') }}"
               class="inline-flex items-center px-5 py-2.5 rounded-lg bg-indigo-600 text-white font-semibold shadow hover:bg-indigo-700">
              Ir a tus notas
            </a>
          </div>
        @else
          <div class="flex flex-wrap gap-3">
            <a href="{{ route('login') }}"
               class="inline-flex items-center px-5 py-2.5 rounded-lg bg-indigo-600 text-white font-semibold shadow hover:bg-indigo-700">
              Iniciar sesión
            </a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}"
                 class="inline-flex items-center px-5 py-2.5 rounded-lg bg-emerald-600 text-white font-semibold shadow hover:bg-emerald-700">
                Registrarse
              </a>
            @endif
          </div>
        @endauth
      </div>

      {{-- Columna derecha: API --}}
      <div class="md:border-l md:pl-8 border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-900 mb-3">Usarlo como API</h2>
        <p class="text-gray-600 mb-4">
          Expone una API REST con autenticación por token (Sanctum). Perfecta para
          integraciones desde apps móviles, scripts o frontends externos.
        </p>
        <div class="flex gap-3">
          <a href="#"
             class="inline-flex items-center px-5 py-2.5 rounded-lg bg-gray-800 text-white font-semibold shadow hover:bg-gray-900">
            Ver documentación de la API
          </a>
          <a href="{{ url('/api/ping') }}"
             class="inline-flex items-center px-5 py-2.5 rounded-lg bg-gray-100 text-gray-800 font-semibold shadow hover:bg-gray-200">
            Probar /api/ping
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- Mapa mental --}}
  <section class="bg-white shadow-sm rounded-xl p-6 md:p-8 mb-8">
    <article>
      <h2 class="text-2xl font-semibold text-gray-900 mb-3">Mapa mental</h2>
      <p class="text-gray-600">
        Para una visión general del proyecto, consulta el
        <a href="{{ url('/mental') }}" target="_blank" class="text-indigo-600 hover:text-indigo-700 underline">
          mapa mental
        </a>.
      </p>
    </article>
  </section>

  {{-- Instrucciones --}}
  <section class="bg-white shadow-sm rounded-xl p-6 md:p-8">
    <article>
      <h2 class="text-2xl font-semibold text-gray-900 mb-3">Instrucciones</h2>
      <p class="text-gray-600">
        Guías de instalación, configuración y despliegue:
        <a href="{{ url('/instruciones') }}" target="_blank" class="text-indigo-600 hover:text-indigo-700 underline">
          ver instrucciones
        </a>.
      </p>
    </article>
  </section>
</x-1public>
<x-1footer />