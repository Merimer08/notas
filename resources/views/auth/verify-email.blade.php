{{-- resources/views/auth/verify-email.blade.php --}}
@extends('layouts.guest')
@section('title', 'Verifica tu correo')

@section('content')
  <div class="px-4">
    <div class="mx-auto w-full max-w-xl rounded-2xl bg-white/95 shadow-[0_20px_40px_rgba(0,0,0,.12)] backdrop-blur p-6 sm:p-8">
      
      {{-- Logo + título --}}
      <div class="text-center mb-6">
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center">
          <x-application-logo class="h-14 w-auto" alt="Checkin Garage" />
        </a>
        <h1 class="mt-4 mb-1 text-2xl sm:text-3xl font-extrabold garage-gradient-text">Verifica tu correo</h1>
        <p class="text-gray-500">
          Te hemos enviado un enlace de verificación. Haz clic en el enlace del email para continuar.
        </p>
      </div>

      {{-- Alerta de “enlace reenviado” --}}
      @if (session('status') == 'verification-link-sent')
        <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
          Se ha enviado un nuevo enlace de verificación a tu correo.
        </div>
      @endif

      <div class="space-y-4">
        {{-- Reenviar verificación --}}
        <form method="POST" action="{{ route('verification.send') }}" class="space-y-3">
          @csrf
          <button type="submit"
                  class="w-full rounded-xl bg-gradient-to-b from-[#ff8a00] to-[#ff6a00] py-2.5 font-bold text-white shadow-lg
                         hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-[#ff8a00]/30">
            Reenviar enlace de verificación
          </button>
        </form>

        {{-- Cambiar email (ir al perfil) opcional --}}
        @isset($canEditProfile)
          @if($canEditProfile)
            <div class="text-center">
              <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-[#ff6a00] hover:text-[#ff8a00]">
                ¿Correo incorrecto? Cambiar dirección
              </a>
            </div>
          @endif
        @endisset

        {{-- Cerrar sesión --}}
        <form method="POST" action="{{ route('logout') }}" class="text-center">
          @csrf
          <button type="submit"
                  class="inline-flex items-center justify-center rounded-lg px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900
                         focus:outline-none focus:ring-2 focus:ring-[#ff8a00]/30">
            Cerrar sesión
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
