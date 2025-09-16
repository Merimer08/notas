@extends('layouts.guest')
@section('title', 'Olvidaste tu contraseña')

@section('content')
  <div class="px-4">
    <div class="mx-auto w-full max-w-xl rounded-2xl bg-white/95 shadow-[0_20px_40px_rgba(0,0,0,.12)] backdrop-blur p-6 sm:p-8">

      {{-- Logo + título --}}
      <div class="text-center mb-6">
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center">
          <x-application-logo class="h-14 w-auto" alt="Checkin Garage" />
        </a>
        <h1 class="mt-4 mb-1 text-2xl sm:text-3xl font-extrabold garage-gradient-text">¿Olvidaste tu contraseña?</h1>
        <p class="text-gray-500">
          No hay problema. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.
        </p>
      </div>

      {{-- Estado de sesión --}}
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
          <label for="email" class="block text-sm font-semibold text-gray-700">Correo electrónico</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                 class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400
                        focus:outline-none focus:ring-4 focus:ring-[#ff8a00]/20 focus:border-[#ff9f3a]" />
          @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        {{-- Botón --}}
        <div>
          <button type="submit"
                  class="w-full rounded-xl bg-gradient-to-b from-[#ff8a00] to-[#ff6a00] py-2.5 font-bold text-white shadow-lg
                         hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-[#ff8a00]/30">
            Enviar enlace de restablecimiento
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
