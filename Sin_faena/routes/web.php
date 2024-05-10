<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('layouts.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::resource('clientes', ClientController::class);
});

Route::get('/clientes', [ClientController::class, 'index'])->name("admin.clientes.cliente");

Route::get('/agendas', [AgendaController::class, 'index'])->name("admin.agendas.agenda");

Route::get('/empleados', [EmpleadoController::class, 'index'])->name("admin.empleados.empleado");

Route::get('/pedidos', [PedidoController::class, 'index'])->name("admin.pedidos.pedido");

Route::get('/servicios', [ServicioController::class, 'index'])->name("admin.servicios.servicio");

Route::get('/solicitudes', [SolicitudController::class, 'index'])->name("admin.solicitudes.solicitud");

Route::get('tareas', [TareaController::class, 'index'])->name('admin.tareas.index');
Route::get('tareas/create', [TareaController::class, 'create'])->name('admin.tareas.create');
Route::post('tareas', [TareaController::class,'store'])->name('admin.tareas.store');
Route::get('tareas/{tarea}', [TareaController::class,'show'])->name('admin.tareas.show');
Route::get('tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('admin.tareas.edit');
Route::put('tareas/{tarea}', [TareaController::class,'update'])->name('admin.tareas.update');
Route::delete('tareas/{tarea}', [TareaController::class,'destroy'])->name('admin.tareas.destroy');

Route::get('empleados', [EmpleadoController::class, 'index'])->name('admin.empleados.index');
Route::get('empleados/create', [EmpleadoController::class, 'create'])->name('admin.empleados.create');
Route::post('empleados', [EmpleadoController::class,'store'])->name('admin.empleados.store');
Route::get('empleados/{empleado}', [EmpleadoController::class,'show'])->name('admin.empleados.show');
Route::get('empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('admin.empleados.edit');
Route::put('empleados/{empleado}', [EmpleadoController::class,'update'])->name('admin.empleados.update');
Route::delete('empleados/{empleado}', [EmpleadoController::class,'destroy'])->name('admin.empleados.destroy');


//Route::get('/index', [UsuarioController::class, 'index'])->name("admin.clientes.cliente");


require __DIR__.'/auth.php';
