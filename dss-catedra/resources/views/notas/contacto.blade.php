<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contáctenos</h2><br>
         <a href="{{ route('dashboard') }}" class="inline-block mb-4 bg-green-400 text-white px-4 py-2 rounded-full font-bold hover:bg-green-500">
        ← Volver al Panel</a>
    </x-slot>

    <div class="py-12 px-6 max-w-3xl mx-auto">
        <form action="{{ route('contacto.enviar') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-medium text-gray-700">Nombre:</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="message" class="block font-medium text-gray-700">Mensaje:</label>
                <textarea id="message" name="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700">Calificación:</label>
                <div class="flex gap-2">
                    @for ($i = 5; $i >= 1; $i--)
                        <label class="flex items-center">
                            <input type="radio" name="rating" value="{{ $i }}" class="mr-1" required> ★
                        </label>
                    @endfor
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enviar</button>
        </form>

        @if (session('success'))
            <div class="mt-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-app-layout>
