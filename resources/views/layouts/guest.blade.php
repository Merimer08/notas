<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Gestor de Notas')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/css/guest.css','resources/js/app.js'])
    @stack('styles')
  </head>

  {{-- Fondo: usa el que tengas en /public/img/fondo.jpg (o cambia la ruta) --}}
  <body class="font-sans antialiased text-gray-900 min-h-screen"
        style="background-image:url('/img/fondo.jpg'); background-size:cover; background-position:center;">

    <header class="border-b bg-white/70 backdrop-blur">
      <div class="mx-auto max-w-7xl flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
        <a href="/" class="inline-flex items-center gap-3 shrink-0">
          <x-application-logo1 class="block h-8 w-auto md:h-9" alt="Gestor de Notas" />
        </a>
        @if (Route::has('login'))
          <nav class="flex items-center gap-6">
            @auth
              <a href="{{ url('/dashboard') }}" class="font-medium text-gray-700 hover:text-gray-900">Dashboard</a>
            @else
              <a href="{{ route('login') }}" class="font-medium text-gray-700 hover:text-gray-900">Log in</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="font-medium text-gray-700 hover:text-gray-900">Register</a>
              @endif
            @endauth
          </nav>
        @endif
      </div>
    </header>

    {{-- Centro vertical --}}
    <main class="min-h-[calc(100vh-4rem)] flex items-center">
      <div class="w-full">
        @yield('content')
      </div>
    </main>

    @stack('scripts')
  </body>
</html>
