<x-app-layout>
    <x-slot name="header">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
@guest
    <a href="{{ route('login') }}">Iniciar sesión</a>
    <a href="{{ route('register') }}">Registrarse</a>
@endguest

@auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="inline-block mb-4 bg-green-400 text-white px-4 py-4 rounded-full font-bold hover:bg-green-500">Cerrar sesión</button>
    </form>
@endauth
       
    </x-slot>

    <div class="flex h-[calc(100vh-4rem)]">
        <nav class="flex flex-col items-center bg-white border-r border-gray-200 py-2 px-1 w-14 select-none">
            <div class="text-xs text-gray-700 mb-2 select-text">
                <div class="cascade-menu">
                    <button type="button" class="inline-flex w-full justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                  <div class="cascade-content">
                        <a href="{{ url('/dashboard') }}">Inicio</a>
                        <a href="{{ url('/compras') }}">Notas de Compras</a>
                        <a href="{{ url('/planificador') }}">Planificador Semanal</a>
                        
                        <a href="{{ url('/fotos') }}">Fotos con Notas</a>

                        <a href="{{ url('/contacto') }}">Contáctenos</a>
                </div>

                </div>
            </div>
        </nav>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="flex items-center justify-between bg-[#f9f9f9] border-b border-gray-200 px-6 py-4">
                <div>
                    <h1 class="text-3xl font-extrabold leading-tight text-black">¡Bienvenido a Recuerda!</h1>
                    <p class="text-sm text-gray-900 mt-1 flex items-center gap-2">
                        Has iniciado sesión correctamente.
                    </p>
                </div>
                <img alt="Imagen decorativa" class="h-20 object-contain" src="https://storage.googleapis.com/a1aa/image/5beba052-2484-4ff4-2821-0a4bcccb6e5e.jpg" />
            </header>

            <section class="flex-1 overflow-y-auto bg-white">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="font-semibold text-gray-900 text-base">Notas recientes</h2>
                    <a href="{{ route('nota.todas') }}">Ver notas simples</a>

                    </a>
                </div>

                <div class="flex flex-col items-center justify-center py-20 text-center text-gray-500">
                    <img class="mb-4" src="https://storage.googleapis.com/a1aa/image/4d637438-ce03-42ff-8423-f8e27ec6d082.jpg" width="80" height="80" />
                    <p class="text-sm">Toque + para crear una nueva nota</p>
                </div>
            </section>

            <button class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-[#4CAF50] text-white text-3xl font-bold flex items-center justify-center shadow-lg hover:bg-green-600" onclick="createNewNote()">+</button>
        </main>
    </div>

    <script>
        function createNewNote() {
            window.location.href = '{{ route('nota.crear') }}';
        }
    </script>

    <style>
        .cascade-menu {
            position: relative;
            display: inline-block;
        }
        .cascade-menu .cascade-content {
            display: none;
            position: absolute;
            background-color: #ffe8e8;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .cascade-menu:hover .cascade-content {
            display: block;
        }
        .cascade-menu .cascade-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .cascade-menu .cascade-content a:hover {
            background-color: #e6cdcd;
        }
    </style>
</x-app-layout>



