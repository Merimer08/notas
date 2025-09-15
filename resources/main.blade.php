<x-layouts.layout>
    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('{{asset('/img/fondo.jpg')}}');">

        @guest
            <!-- Vista para usuarios no autenticados -->
            <div class="flex justify-center items-center min-h-screen">
                <div class="card w-96 bg-white  bg-opacity-50 shadow-xl rounded-lg">
                    <div class="card-body text-center">
                        <h1 class="mb-5 text-5xl font-bold">Bienvenido</h1>
                        <p class="mb-5">
                            Para acceder, inicia sesión en la plataforma.
                        </p>
                        <a href="{{ route('login') }}"
                            class="btn bg-orange-500 text-white hover:bg-orange-400 border-none">Iniciar Sesión </a>
                    </div>
                </div>
            </div>
        @endguest

        @auth
            <!-- Vista para usuarios autenticados -->
            <div class="flex justify-center items-center min-h-screen">
                <div class="card w-96 bg-white  shadow-xl rounded-lg">
                    <div class="card-body text-center">
                        <h2 class="mb-5 text-3xl font-bold justify-center card-title">Ver Infromacion</h2>
                        <p class="mb-4">Accede a las listas.</p>
                        <div class="card-actions justify-center">
                            <a href="{{ route('alumnos.index') }}"
                                class="btn bg-orange-500 text-white hover:bg-orange-400 border-none"> Alumnos</a>

                            <a href="{{ route('profesores') }}"
                                class="btn bg-orange-500 text-white hover:bg-orange-400 border-none"> Profesores</a>

          
                            <a href="{{ route('asignaturas.index') }}"
                                class="btn bg-orange-500 text-white hover:bg-orange-400 border-none">Asignaturas</a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

    </div>
    </div>

</x-layouts.layout>