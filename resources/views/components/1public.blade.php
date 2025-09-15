<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Gestor de Notas' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="font-sans antialiased bg-gray-100 text-gray-900">

    {{-- HEADER: logo izquierda + links derecha, alineados verticalmente --}}
    <header class="border-b bg-white/70 backdrop-blur">
      <div class="max-w-7xl mx-auto flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
        <a href="/" class="inline-flex items-center gap-3 shrink-0">
          {{-- PNG/JPG: usa el componente <img> (no uses fill-current) --}}
          <x-application-logo1 class="block h-8 w-auto md:h-9" alt="Gestor de Notas" />
        </a>

        @if (Route::has('login'))
          <nav class="flex items-center gap-6">
            @auth
              <a href="{{ url('/dashboard') }}" class="font-medium text-gray-600 hover:text-gray-900">
                Dashboard
              </a>
            @else
              <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-gray-900">
                Log in
              </a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="font-medium text-gray-600 hover:text-gray-900">
                  Register
                </a>
              @endif
            @endauth
          </nav>
        @endif
      </div>
    </header>

    <main class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
      {{ $slot }}
    </main>

  </body>
</html>
