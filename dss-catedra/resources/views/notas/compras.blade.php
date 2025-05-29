@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4">
        
        <a href="{{ route('dashboard') }}" class="inline-block mb-4 bg-green-400 text-white px-4 py-2 rounded-full font-bold hover:bg-green-500">
        ← Volver al Panel
      </a>
        <h1 class="text-3xl font-bold text-green-800 mb-6">Notas de Compras</h1>

        <form action="{{ route('guardar.compras') }}" method="POST" class="bg-white p-6 rounded shadow mb-6">
            @csrf
            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" id="titulo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-green-200" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Checklist</label>
                <div id="checklist-container">
                    <input type="text" name="checklist[]" placeholder="Elemento 1" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 mt-2">
                </div>
                <button type="button" onclick="agregarChecklist()" class="mt-2 text-sm text-green-600 hover:underline">+ Agregar ítem</button>
            </div>

            <button type="submit"
              class="binline-block mb-4 bg-green-400 text-white px-4 py-2 rounded-full font-bold hover:bg-green-500">
              Aceptar
            </button>
        </form>

      
        <div class="grid gap-4">
            @foreach($notas as $nota)
                <div class="bg-white rounded shadow p-4">
                    <h2 class="text-xl font-semibold text-green-700">{{ $nota->titulo }}</h2>
                    <ul class="list-disc list-inside mt-2">
                        @foreach(json_decode($nota->checklist, true) ?? [] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function agregarChecklist() {
            const container = document.getElementById('checklist-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'checklist[]';
            input.placeholder = 'Nuevo ítem';
            input.className = 'block w-full border border-gray-300 rounded-md shadow-sm p-2 mt-2';
            container.appendChild(input);
        }
    </script>
@endsection


