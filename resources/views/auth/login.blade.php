{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.guest')

@section('title', 'Iniciar Sesión')

@push('styles')
  {{-- Bootstrap Icons (si no las cargas ya en el layout) --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    :root{
      --garage-orange-1:#ff8a00;
      --garage-orange-2:#ff6a00;
      --garage-orange-3:#ff9f3a;
      --garage-shadow:0 20px 40px rgba(0,0,0,.12);
    }
    /* Fondo con imagen desde /public/images/login-bg.jpg */
    .auth-bg{
      min-height:100vh;
      background: url('{{ asset('images/login-bg.jpg') }}') center/cover no-repeat fixed;
      display:flex; align-items:center;
    }
    /* Tarjeta */
    .auth-card{
      max-width: 620px;
      border-radius: 20px;
      background: rgba(255,255,255,.96);
      backdrop-filter: blur(4px);
      box-shadow: var(--garage-shadow);
    }
    /* Tono naranja */
    .text-custom-garage{ color: var(--garage-orange-2); }
    .link-custom-color{ color: var(--garage-orange-2); text-decoration: none; }
    .link-custom-color:hover{ color: var(--garage-orange-1); text-decoration: underline; }

    /* Botón principal */
    .btn-garage{
      background-image: linear-gradient(180deg, var(--garage-orange-1), var(--garage-orange-2));
      border: 0;
      color:#fff;
      font-weight:600;
      letter-spacing:.2px;
      box-shadow: 0 8px 20px rgba(255,106,0,.25);
    }
    .btn-garage:hover{ filter: brightness(1.03); color:#fff; }

    /* Botón icono en input password */
    .btn-eye{
      background: #fff;
      border:1px solid #e7e7e7;
      border-left:0;
      color:#6b7280;
    }
    .btn-eye:hover{ background:#f8f9fa; color:#111827; }

    /* Focus naranja en inputs */
    .form-control:focus{
      border-color: var(--garage-orange-3);
      box-shadow: 0 0 0 .25rem rgba(255,138,0,.18);
    }

    /* Etiquetas más legibles */
    .form-label{ font-weight: 600; color:#374151; }

    /* Título principal */
    .title-hero{
      font-weight: 800;
      color:#0f172a;
    }
    @media (min-width: 768px){
      .title-hero{ font-size: 2.25rem; } /* ~36px */
    }
  </style>
@endpush

@section('content')
  <div class="auth-bg">
    <div class="container px-3 px-md-4">
      <div class="auth-card mx-auto p-4 p-md-5">

        {{-- Logo + encabezado --}}
        <div class="text-center mb-4">
          <a href="{{ url('/') }}" class="text-decoration-none d-inline-flex align-items-center justify-content-center">
            {{-- Tu componente de logo (puedes ajustar el alto con style) --}}
            <x-application-logo class="img-fluid" style="height:5px center" alt="Checkin Garage" />
          </a>
          <h1 class="title-hero mt-4 mb-1 text-custom-garage">Iniciar Sesión</h1>
          <p class="text-muted mb-0" style="font-weight:300;">Accede a tu cuenta</p>
        </div>

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login') }}" class="mt-4">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input id="email" class="form-control" type="email" name="email"
                   value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
              <div class="text-danger mt-2 small">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group">
              <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
              <button class="btn btn-eye" type="button" id="togglePassword" aria-label="Mostrar u ocultar contraseña">
                <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
              </button>
            </div>
            @error('password')
              <div class="text-danger mt-2 small">{{ $message }}</div>
            @enderror
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
              <label for="remember_me" class="form-check-label small">Recordarme</label>
            </div>

            @if (Route::has('password.request'))
              <a class="small link-custom-color" href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
              </a>
            @endif
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-garage py-2">
              Entrar
            </button>
          </div>

          <div class="text-center mt-4">
            <p class="text-muted small mb-0">
              ¿No tienes una cuenta?
              <a href="{{ route('register') }}" class="link-custom-color">Regístrate aquí</a>
            </p>
          </div>
        </form>

      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    (function () {
      const btn = document.getElementById('togglePassword');
      if (!btn) return;
      btn.addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon  = document.getElementById('togglePasswordIcon');
        if (!input || !icon) return;

        if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('bi-eye-slash');
          icon.classList.add('bi-eye');
        } else {
          input.type = 'password';
          icon.classList.remove('bi-eye');
          icon.classList.add('bi-eye-slash');
        }
      });
    })();
  </script>
@endpush
