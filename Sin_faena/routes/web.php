<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\TipoEventoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('layouts.index');
})->name('inicio');

Route::get('/login', function () {
    return view('auth.login');
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

Route::get('/users', [UsuarioController::class, 'index'])->name("admin.users.servicio");

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
//reporte
Route::get('admin.empleados.reporte', [EmpleadoController::class, 'reporte'])->name('admin.empleados.reporte');

Route::get('tipoeventos', [TipoEventoController::class, 'index'])->name('admin.tipoeventos.index');
Route::get('tipoeventos/create', [TipoEventoController::class, 'create'])->name('admin.tipoeventos.create');
Route::post('tipoeventos', [TipoEventoController::class,'store'])->name('admin.tipoeventos.store');
Route::get('tipoeventos/{tipoeventos}', [TipoEventoController::class,'show'])->name('admin.tipoeventos.show');
Route::get('tipoeventos/{tipoeventos}/edit', [TipoEventoController::class, 'edit'])->name('admin.tipoeventos.edit');
Route::put('tipoeventos/{tipoeventos}', [TipoEventoController::class,'update'])->name('admin.tipoeventos.update');
Route::delete('tipoeventos/{tipoeventos}', [TipoEventoController::class,'destroy'])->name('admin.tipoeventos.destroy');

Route::get('puestos', [PuestoController::class, 'index'])->name('admin.puestos.index');
Route::get('puestos/create', [PuestoController::class, 'create'])->name('admin.puestos.create');
Route::post('puestos', [PuestoController::class,'store'])->name('admin.puestos.store');
Route::get('puestos/{puestos}', [PuestoController::class,'show'])->name('admin.puestos.show');
Route::get('puestos/{puestos}/edit', [PuestoController::class, 'edit'])->name('admin.puestos.edit');
Route::put('puestos/{puestos}', [PuestoController::class,'update'])->name('admin.puestos.update');
Route::delete('puestos/{puestos}', [PuestoController::class,'destroy'])->name('admin.puestos.destroy');

Route::get('clientes', [ClientController::class, 'index'])->name('admin.clientes.index');
Route::get('clientes/create', [ClientController::class, 'create'])->name('admin.clientes.create');
Route::post('clientes', [ClientController::class,'store'])->name('admin.clientes.store');
Route::get('clientes/{cliente}', [ClientController::class,'show'])->name('admin.clientes.show');
Route::get('clientes/{clientes}/edit', [ClientController::class, 'edit'])->name('admin.clientes.edit');
Route::put('clientes/{cliente}', [ClientController::class,'update'])->name('admin.clientes.update');
Route::delete('clientes/{cliente}', [ClientController::class,'destroy'])->name('admin.clientes.destroy');

Route::get('servicios', [ServicioController::class, 'index'])->name('admin.servicios.index');
Route::get('servicios/create', [ServicioController::class, 'create'])->name('admin.servicios.create');
Route::post('servicios', [ServicioController::class,'store'])->name('admin.servicios.store');
Route::get('servicios/{servicio}', [ServicioController::class,'show'])->name('admin.servicios.show');
Route::get('servicios/{servicios}/edit', [ServicioController::class, 'edit'])->name('admin.servicios.edit');
Route::put('servicios/{servicio}', [ServicioController::class,'update'])->name('admin.servicios.update');
Route::delete('servicios/{servicio}', [ServicioController::class,'destroy'])->name('admin.servicios.destroy');

Route::get('pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
Route::get('pedidos/create', [PedidoController::class, 'create'])->name('admin.pedidos.create');
Route::post('pedidos', [PedidoController::class,'store'])->name('admin.pedidos.store');
Route::get('pedidos/{pedido}', [PedidoController::class,'show'])->name('admin.pedidos.show');
Route::get('pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('admin.pedidos.edit');
Route::put('pedidos/{id}', [PedidoController::class,'update'])->name('admin.pedidos.update');
Route::delete('pedidos/{pedido}', [PedidoController::class,'destroy'])->name('admin.pedidos.destroy');

Route::get('eventos', [EventoController::class, 'index'])->name('admin.eventos.index');
Route::get('/eventos/all', [EventoController::class, 'getAllEvents'])->name('admin.eventos.all');
Route::get('eventos/create', [EventoController::class, 'create'])->name('admin.eventos.create');
Route::post('eventos', [EventoController::class,'store'])->name('admin.eventos.store');
Route::get('eventos/{eventos}', [EventoController::class,'show'])->name('admin.eventos.show');
Route::get('eventos/{evento}/edit', [EventoController::class, 'edit'])->name('admin.eventos.edit');
Route::put('eventos/update/{evento}', [EventoController::class,'update'])->name('admin.eventos.update');
Route::delete('eventos/{evento}', [EventoController::class,'destroy'])->name('admin.eventos.destroy');
//reportes
Route::get('admin.eventos.reporte', [EventoController::class, 'reporte'])->name('admin.eventos.reporte');

Route::get('/users', [UsuarioController::class, 'index'])->name("admin.users.servicio");
Route::delete('users/{user}', [ServicioController::class,'destroy'])->name('admin.users.destroy');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name("admin.usuarios.index");
Route::delete('users/{user}', [UsuarioController::class,'destroy'])->name('admin.users.destroy');



//Route::get('/index', [UsuarioController::class, 'index'])->name("admin.clientes.cliente");


require __DIR__.'/auth.php';
