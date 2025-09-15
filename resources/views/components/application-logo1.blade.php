{{-- Logo como imagen (PNG/JPG/WebP). Coloca public/logo.png o cambia "src". --}}
@props([
  'src' => asset('logo.png'),
  'alt' => 'Gestor de Notas',
])

<picture>
  {{-- Si tienes versión dark, descomenta y ajusta:
  <source srcset="{{ asset('logo-dark.png') }}" media="(prefers-color-scheme: dark)">
  --}}
  {{-- Si tienes @2x para pantallas retina, descomenta:
  <source srcset="{{ asset('logo.png') }} 1x, {{ asset('logo@2x.png') }} 2x">
  --}}
  <img
    src="{{ $src }}"
    alt="{{ $alt }}"
    loading="lazy"
    decoding="async"
    {{ $attributes->class([
      'block',                 // evita saltos por baseline
      'h-8 w-auto',            // tamaño por defecto (se puede sobrescribir desde el layout)
      'object-contain',        // encaje correcto
      'transition-transform duration-150 hover:scale-[1.02]', // sutil
    ]) }}
  >
</picture>
