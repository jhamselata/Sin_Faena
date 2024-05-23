<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\TipoEquipoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
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

//Rutas de las tareas
Route::get('tareas', [TareaController::class, 'index'])->name('admin.tareas.index');
Route::get('tareas/create', [TareaController::class, 'create'])->name('admin.tareas.create');
Route::post('tareas', [TareaController::class,'store'])->name('admin.tareas.store');
Route::get('tareas/{tarea}', [TareaController::class,'show'])->name('admin.tareas.show');
Route::get('tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('admin.tareas.edit');
Route::put('tareas/{tarea}', [TareaController::class,'update'])->name('admin.tareas.update');
Route::delete('tareas/{tarea}', [TareaController::class,'destroy'])->name('admin.tareas.destroy');

//Rutas de los empleados
Route::get('empleados', [EmpleadoController::class, 'index'])->name('admin.empleados.index');
Route::get('empleados/create', [EmpleadoController::class, 'create'])->name('admin.empleados.create');
Route::post('empleados', [EmpleadoController::class,'store'])->name('admin.empleados.store');
Route::get('empleados/{empleado}', [EmpleadoController::class,'show'])->name('admin.empleados.show');
Route::get('empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('admin.empleados.edit');
Route::put('empleados/{empleado}', [EmpleadoController::class,'update'])->name('admin.empleados.update');
Route::delete('empleados/{empleado}', [EmpleadoController::class,'destroy'])->name('admin.empleados.destroy');

//Rutas para los clientes
Route::get('clientes', [ClientController::class, 'index'])->name('admin.clientes.index');
Route::get('clientes/create', [ClientController::class, 'create'])->name('admin.clientes.create');
Route::post('clientes', [ClientController::class,'store'])->name('admin.clientes.store');
Route::get('clientes/{cliente}', [ClientController::class,'show'])->name('admin.clientes.show');
Route::get('clientes/{clientes}/edit', [ClientController::class, 'edit'])->name('admin.clientes.edit');
Route::put('clientes/{cliente}', [ClientController::class,'update'])->name('admin.clientes.update');
Route::delete('clientes/{cliente}', [ClientController::class,'destroy'])->name('admin.clientes.destroy');

//Ruta de los servicios
Route::get('servicios', [ServicioController::class, 'index'])->name('admin.servicios.index');
Route::get('servicios/create', [ServicioController::class, 'create'])->name('admin.servicios.create');
Route::post('servicios', [ServicioController::class,'store'])->name('admin.servicios.store');
Route::get('servicios/{servicio}', [ServicioController::class,'show'])->name('admin.servicios.show');
Route::get('servicios/{servicios}/edit', [ServicioController::class, 'edit'])->name('admin.servicios.edit');
Route::put('servicios/{servicio}', [ServicioController::class,'update'])->name('admin.servicios.update');
Route::delete('servicios/{servicio}', [ServicioController::class,'destroy'])->name('admin.servicios.destroy');

//Ruta de los tipos por equipo
Route::get('tipoequipos', [TipoEquipoController::class, 'index'])->name('admin.tipoequipos.index');
Route::get('tipoequipos/create', [TipoEquipoController::class, 'create'])->name('admin.tipoequipos.create');
Route::post('tipoequipos', [TipoEquipoController::class,'store'])->name('admin.tipoequipos.store');
Route::get('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'show'])->name('admin.tipoequipos.show');
Route::get('tipoequipos/{tipoequipo}/edit', [TipoEquipoController::class, 'edit'])->name('admin.tipoequipos.edit');
Route::put('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'update'])->name('admin.tipoequipos.update');
Route::delete('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'destroy'])->name('admin.tipoequipos.destroy');

//Ruta de los Equipos
Route::get('equipos', [EquipoController::class, 'index'])->name('admin.equipos.index');
Route::get('equipos/create', [EquipoController::class, 'create'])->name('admin.equipos.create');
Route::post('equipos', [EquipoController::class,'store'])->name('admin.equipos.store');
Route::get('equipos/{equipo}', [EquipoController::class,'show'])->name('admin.equipos.show');
Route::get('equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('admin.equipos.edit');
Route::put('equipos/{equipo}', [EquipoController::class,'update'])->name('admin.equipos.update');
Route::delete('equipos/{equipo}', [EquipoController::class,'destroy'])->name('admin.equipos.destroy');

//Rutas de los Usuarios
Route::get('/users', [UsuarioController::class, 'index'])->name("admin.users.servicio");
Route::delete('users/{user}', [ServicioController::class,'destroy'])->name('admin.users.destroy');



//Route::get('/index', [UsuarioController::class, 'index'])->name("admin.clientes.cliente");


require __DIR__.'/auth.php';
