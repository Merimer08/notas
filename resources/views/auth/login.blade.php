@extends('layouts.guest')
@section('title', 'Iniciar Sesión')

@section('content')
  <div class="px-4">
    <div class="mx-auto w-full max-w-xl rounded-2xl bg-white/95 shadow-[0_20px_40px_rgba(0,0,0,.12)] backdrop-blur p-6 sm:p-8">

      {{-- Logo + título --}}
      <div class="text-center mb-6">
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center">
          <x-application-logo class="h-14 w-auto" alt="Checkin Garage" />
        </a>
        <h1 class="mt-4 mb-1 text-2xl sm:text-3xl font-extrabold garage-gradient-text">Iniciar Sesión</h1>
        <p class="text-gray-500">Accede a tu cuenta</p>
      </div>

      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
          <label for="email" class="block text-sm font-semibold text-gray-700">Correo Electrónico</label>
          <input id="email" name="email" type="email" autocomplete="username" required autofocus
                 value="{{ old('email') }}"
                 class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400
                        focus:outline-none focus:ring-4 focus:ring-[#ff8a00]/20 focus:border-[#ff9f3a]" />
          @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        {{-- Password + ojo --}}
        <div>
          <label for="password" class="block text-sm font-semibold text-gray-700">Contraseña</label>
          <div class="mt-1 flex rounded-lg border border-gray-300 focus-within:ring-4 focus-within:ring-[#ff8a00]/20 focus-within:border-[#ff9f3a]">
            <input id="password" name="password" type="password" autocomplete="current-password" required
                   class="w-full rounded-l-lg border-0 px-3 py-2 text-gray-900 placeholder-gray-400 focus:outline-none" />
            <button type="button" id="togglePassword"
                    class="rounded-r-lg border-l border-gray-300 px-3 text-gray-500 hover:bg-gray-50 hover:text-gray-800">
              {{-- icono ojo (eye-slash por defecto) --}}
              <svg id="iconEyeSlash" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.98 8.223C5.85 5.94 8.76 4.5 12 4.5c5.523 0 10.5 4.5 10.5 7.5-.403 1.132-1.15 2.256-2.17 3.274M6.75 6.75l10.5 10.5M9.88 9.88A3 3 0 0114.12 14.12" />
              </svg>
              <svg id="iconEye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.036 12.322c1.2-3.897 5.176-6.822 9.964-6.822 4.788 0 8.764 2.925 9.964 6.822-1.2 3.897-5.176 6.822-9.964 6.822-4.788 0-8.764-2.925-9.964-6.822z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
            </button>
          </div>
          @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        {{-- Recordarme + enlace --}}
        <div class="flex items-center justify-between">
          <label class="inline-flex items-center gap-2">
            <input id="remember_me" name="remember" type="checkbox"
                   class="h-4 w-4 rounded border-gray-300 text-[#ff8a00] focus:ring-[#ff8a00]/30" />
            <span class="text-sm text-gray-700">Recordarme</span>
          </label>

          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}"
               class="text-sm font-medium text-[#ff6a00] hover:text-[#ff8a00]">¿Olvidaste tu contraseña?</a>
          @endif
        </div>

        {{-- Botón --}}
        <button type="submit"
                class="w-full rounded-xl bg-gradient-to-b from-[#ff8a00] to-[#ff6a00] py-2.5 font-bold text-white shadow-lg
                       hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-[#ff8a00]/30">
          Entrar
        </button>

        {{-- Registro --}}
        <p class="text-center text-sm text-gray-600">
          ¿No tienes una cuenta?
          <a href="{{ route('register') }}" class="font-medium text-[#ff6a00] hover:text-[#ff8a00]">Regístrate aquí</a>
        </p>
      </form>
    </div>
  </div>

  {{-- JS para mostrar/ocultar contraseña --}}
  <script>
    (function () {
      const btn = document.getElementById('togglePassword');
      const input = document.getElementById('password');
      const eye = document.getElementById('iconEye');
      const slash = document.getElementById('iconEyeSlash');
      if (!btn || !input) return;
      btn.addEventListener('click', () => {
        const show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        eye.classList.toggle('hidden', !show);
        slash.classList.toggle('hidden', show);
      });
    })();
  </script>
@endsection
