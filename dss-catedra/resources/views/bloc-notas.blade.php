@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Bloc de Notas</h1>

    <p>Bienvenido, {{ Auth::user()->name }}.</p>

    <!-- Aquí más adelante mostraremos las notas del usuario -->

</div>
@endsection
