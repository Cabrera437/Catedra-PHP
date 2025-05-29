<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-2xl text-green-800 leading-tight text-center">
      Editar Nota
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 rounded-lg shadow-md border border-green-200">
        <form action="{{ route('nota.actualizar', $nota->id) }}" method="POST" class="space-y-4">
          @csrf
          @method('PUT')

          <div>
            <label for="note-title" class="block text-sm font-medium text-green-700">Título</label>
            <input type="text" id="note-title" name="note-title" value="{{ $nota->titulo }}"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
              required>
          </div>

          <div>
            <label for="note-content" class="block text-sm font-medium text-green-700">Contenido</label>
            <textarea id="note-content" name="note-content" rows="8"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
              required>{{ $nota->contenido }}</textarea>
          </div>

          <div class="flex flex-col items-center mt-6 space-y-4">
            <button type="submit"
              class="binline-block mb-4 bg-green-400 text-white px-4 py-2 rounded-full font-bold hover:bg-green-500">
              Aceptar
            </button>
            <a href="{{ route('nota.todas') }}">← volver a Notas</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

