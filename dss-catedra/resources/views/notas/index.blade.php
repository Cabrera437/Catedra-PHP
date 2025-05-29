<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-2xl text-green-800 leading-tight text-center">
      Mis Notas
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <a href="{{ route('dashboard') }}" class="inline-block mb-4 bg-green-400 text-white px-4 py-2 rounded-full font-bold hover:bg-green-500">
        ← Volver al Panel</a>

      @if(session('success'))
        <div class="mb-4 text-green-600 font-semibold">
          {{ session('success') }}
        </div>
      @endif

      @if(count($notas) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
          @foreach($notas as $nota)
            <div class="bg-green-200 border-l-8 border-green-500 p-4 rounded shadow-sm">
              <h3 class="text-green-600 text-lg font-bold">{{ $nota->titulo }}</h3>
              <p class="text-gray-700 mt-2">{{ $nota->contenido }}</p>

              <div class="flex gap-2 mt-4">
                <a href="{{ route('nota.editar', $nota->id) }}" class="bg-green-400 text-green-900 px-3 py-1 rounded hover:bg-green-300 text-sm">
                  Editar
                </a>
                <form method="POST" action="{{ route('nota.eliminar', $nota->id) }}" onsubmit="return confirm('¿Seguro que quieres eliminar esta nota?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-200 text-red-900 px-3 py-1 rounded hover:bg-red-300 text-sm">
                    Eliminar
                  </button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-gray-500">No tienes notas aún. ¡Crea una nueva para comenzar!</p>
      @endif

    </div>
  </div>
</x-app-layout>





