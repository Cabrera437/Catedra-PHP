<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\Nota2Controller; // ✅ Controlador para Notas de Compras y Planificador
use Illuminate\Support\Facades\Redirect;



// Página de bienvenida


Route::get('/', function () {
    return Redirect::route('login');
});


// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Dashboard principal
    Route::get('/dashboard', [NotaController::class, 'index'])->name('dashboard'); // 📋 Página principal con resumen de notas

    // CRUD de Notas simples
    Route::get('/notas', [NotaController::class, 'index'])->name('nota.index'); // Ver lista de notas
    Route::get('/notas/crear', [NotaController::class, 'crear'])->name('nota.crear'); //  Formulario para nueva nota
    Route::post('/notas/guardar', [NotaController::class, 'guardar'])->name('nota.guardar'); //  Guardar nota
    Route::get('/notas/{id}/editar', [NotaController::class, 'editar'])->name('nota.editar'); //  Editar nota
    Route::put('/notas/{id}', [NotaController::class, 'actualizar'])->name('nota.actualizar'); //  Actualizar nota
    Route::delete('/notas/{id}', [NotaController::class, 'eliminar'])->name('nota.eliminar'); //  Eliminar nota
    Route::get('/notas/todas', [NotaController::class, 'todas'])->name('nota.todas'); //  Ver todas las notas
Route::get('/notas.index', [NotaController::class, 'index'])->name('nota.index');
    // Bloc de Notas de Compras
    Route::get('/compras', [Nota2Controller::class, 'vistaCompras'])->name('compras'); // 🛒 Mostrar vista de notas de compras
    Route::post('/compras/guardar', [Nota2Controller::class, 'guardarNotaCompras'])->name('guardar.compras'); // 💾 Guardar nota de compras

    // Planificador Semanal
    Route::get('/planificador', [Nota2Controller::class, 'vistaPlanificador'])->name('planificador'); // 🗓️ Mostrar vista del planificador
    Route::post('/planificador/guardar', [Nota2Controller::class, 'guardarPlanificador'])->name('guardar.planificador'); // 💾 Guardar planificador

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // ⚙️ Editar perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // ✅ Actualizar perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // 🗑️ Eliminar cuenta


    //rutas para las notas de planificacion semanal
    Route::get('/planificador', [Nota2Controller::class, 'vistaPlanificador'])->middleware(['auth'])->name('planificador');
    Route::post('/planificador', [Nota2Controller::class, 'guardarPlanificador'])->middleware(['auth'])->name('planificador.guardar');
    Route::get('/notas', [Nota2Controller::class, 'vistaNotas'])->name('notas');

//estas para  las notas de fotos asiesza
Route::middleware(['auth'])->group(function () {
    Route::get('/fotos', [Nota2Controller::class, 'vistaNotasFotos'])->name('fotos.index');
    Route::post('/fotos', [Nota2Controller::class, 'guardarNotaFoto'])->name('fotos.guardar');
});

//rutas del contacto
Route::get('/contacto', [Nota2Controller::class, 'mostrarContacto'])->name('contacto');
Route::post('/contacto', [Nota2Controller::class, 'enviarContacto'])->name('contacto.enviar');




});

// Rutas de autenticación (Login, Registro, etc.)
require __DIR__.'/auth.php'; // 🔐 Incluye las rutas generadas por Breeze para login/registro





