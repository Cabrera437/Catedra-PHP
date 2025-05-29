<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                🗓️ Planificador Semanal
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-block mb-4 bg-green-400 text-white px-4 py-2 rounded-full font-bold hover:bg-green-500">
                ← Volver al Panel
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('planificador.guardar') }}">
                @csrf

                @php
                    $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes'];
                @endphp

                @foreach ($dias as $dia)
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold capitalize mb-2" for="{{ $dia }}">{{ ucfirst($dia) }}</label>
                        <input type="text" name="{{ $dia }}" id="{{ $dia }}" value="{{ $planificador->$dia ?? '' }}"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                @endforeach

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="objetivos">🎯 Objetivos</label>
                    <textarea name="objetivos" id="objetivos" rows="3"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ $planificador->objetivos ?? '' }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="notas">📝 Notas</label>
                    <textarea name="notas" id="notas" rows="3"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ $planificador->notas ?? '' }}</textarea>
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Guardar</button>
            </form>
        </div>

        {{-- Mostrar Planificador Guardado --}}
        <div class="max-w-3xl mx-auto mt-10">
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-700">📋 Mi Planificador</h2>

            @if ($planificador)
                <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><strong class="text-green-600">Lunes:</strong> {{ $planificador->lunes }}</div>
                        <div><strong class="text-green-600">Martes:</strong> {{ $planificador->martes }}</div>
                        <div><strong class="text-green-600">Miércoles:</strong> {{ $planificador->miercoles }}</div>
                        <div><strong class="text-green-600">Jueves:</strong> {{ $planificador->jueves }}</div>
                        <div><strong class="text-green-600">Viernes:</strong> {{ $planificador->viernes }}</div>
                    </div>

                    <div>
                        <strong class="text-blue-600">🎯 Objetivos:</strong>
                        <p class="mt-1 text-gray-700">{{ $planificador->objetivos }}</p>
                    </div>

                    <div>
                        <strong class="text-purple-600">📝 Notas:</strong>
                        <p class="mt-1 text-gray-700">{{ $planificador->notas }}</p>
                    </div>
                </div>
            @else
                <p class="text-center text-gray-600 mt-4">Aún no tienes un planificador guardado.</p>
            @endif
        </div>
    </div>
</x-app-layout>

