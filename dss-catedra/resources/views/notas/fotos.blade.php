<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"><a href="{{ route('dashboard') }}" class="inline-block mb-4 bg-green-400 text-white px-4 py-2 rounded-full font-bold hover:bg-green-500">
        ← Volver al Panel</a>
            {{ __('Notas con Fotos') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6 max-w-4xl mx-auto">
        <form action="{{ route('fotos.guardar') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="foto" class="block font-medium text-gray-700">Seleccionar imagen</label>
                <input type="file" name="foto" id="foto" required class="mt-2 block w-full">
            </div>

            <div class="mb-4">
                <label for="nota" class="block font-medium text-gray-700">Nota</label>
                <textarea name="nota" id="nota" rows="4" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Escribe tu nota aquí..." required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar Nota</button>
        </form>

        @if ($notas->count())
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($notas as $nota)
                    <div class="bg-white rounded shadow p-4">
                        <img src="{{ asset('storage/' . $nota->foto) }}" alt="Imagen" class="w-full h-48 object-cover rounded mb-2">
                        <p class="text-gray-700">{{ $nota->nota }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

