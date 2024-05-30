<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\TipoEquipoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\TipoClienteController;
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
//Reporte
Route::get('admin.empleados.reporte', [EmpleadoController::class, 'reporte'])->name('admin.empleados.reporte');

//Rutas de los tipos de eventos
Route::get('tipoeventos', [TipoEventoController::class, 'index'])->name('admin.tipoeventos.index');
Route::get('tipoeventos/create', [TipoEventoController::class, 'create'])->name('admin.tipoeventos.create');
Route::post('tipoeventos', [TipoEventoController::class,'store'])->name('admin.tipoeventos.store');
Route::get('tipoeventos/{tipoeventos}', [TipoEventoController::class,'show'])->name('admin.tipoeventos.show');
Route::get('tipoeventos/{tipoeventos}/edit', [TipoEventoController::class, 'edit'])->name('admin.tipoeventos.edit');
Route::put('tipoeventos/{tipoeventos}', [TipoEventoController::class,'update'])->name('admin.tipoeventos.update');
Route::delete('tipoeventos/{tipoeventos}', [TipoEventoController::class,'destroy'])->name('admin.tipoeventos.destroy');

//Rutas de los puestos
Route::get('puestos', [PuestoController::class, 'index'])->name('admin.puestos.index');
Route::get('puestos/create', [PuestoController::class, 'create'])->name('admin.puestos.create');
Route::post('puestos', [PuestoController::class,'store'])->name('admin.puestos.store');
Route::get('puestos/{puestos}', [PuestoController::class,'show'])->name('admin.puestos.show');
Route::get('puestos/{puestos}/edit', [PuestoController::class, 'edit'])->name('admin.puestos.edit');
Route::put('puestos/{puestos}', [PuestoController::class,'update'])->name('admin.puestos.update');
Route::delete('puestos/{puestos}', [PuestoController::class,'destroy'])->name('admin.puestos.destroy');

//Rutas para los clientes
Route::get('clientes', [ClientController::class, 'index'])->name('admin.clientes.index');
Route::get('clientes/create', [ClientController::class, 'create'])->name('admin.clientes.create');
Route::post('clientes', [ClientController::class,'store'])->name('admin.clientes.store');
Route::get('clientes/{cliente}', [ClientController::class,'show'])->name('admin.clientes.show');
Route::get('clientes/{clientes}/edit', [ClientController::class, 'edit'])->name('admin.clientes.edit');
Route::put('clientes/{cliente}', [ClientController::class,'update'])->name('admin.clientes.update');
Route::delete('clientes/{cliente}', [ClientController::class,'destroy'])->name('admin.clientes.destroy');

//Rutas de los tipos de clientes
Route::get('tipoclientes', [TipoClienteController::class, 'index'])->name('admin.tipoclientes.index');
Route::get('tipoclientes/create', [TipoClienteController::class, 'create'])->name('admin.tipoclientes.create');
Route::post('tipoclientes', [TipoClienteController::class,'store'])->name('admin.tipoclientes.store');
Route::get('tipoclientes/{tipocliente}', [TipoClienteController::class,'show'])->name('admin.tipoclientes.show');
Route::get('tipoclientes/{tipocliente}/edit', [TipoClienteController::class, 'edit'])->name('admin.tipoclientes.edit');
Route::put('tipoclientes/{tipocliente}', [TipoClienteController::class,'update'])->name('admin.tipoclientes.update');
Route::delete('tipoclientes/{tipocliente}', [TipoClienteController::class,'destroy'])->name('admin.tipoclientes.destroy');

//Ruta de los servicios
Route::get('servicios', [ServicioController::class, 'index'])->name('admin.servicios.index');
Route::get('servicios/create', [ServicioController::class, 'create'])->name('admin.servicios.create');
Route::post('servicios', [ServicioController::class,'store'])->name('admin.servicios.store');
Route::get('servicios/{servicio}', [ServicioController::class,'show'])->name('admin.servicios.show');
Route::get('servicios/{servicios}/edit', [ServicioController::class, 'edit'])->name('admin.servicios.edit');
Route::put('servicios/{servicio}', [ServicioController::class,'update'])->name('admin.servicios.update');
Route::delete('servicios/{servicio}', [ServicioController::class,'destroy'])->name('admin.servicios.destroy');

//Ruta de los tipos de servicios
Route::get('tiposervicios', [TipoServicioController::class, 'index'])->name('admin.tiposervicios.index');
Route::get('tiposervicios/create', [TipoServicioController::class, 'create'])->name('admin.tiposervicios.create');
Route::post('tiposervicios', [TipoServicioController::class,'store'])->name('admin.tiposervicios.store');
Route::get('tiposervicios/{tiposervicios}', [TipoServicioController::class,'show'])->name('admin.tiposervicios.show');
Route::get('tiposervicios/{tiposervicios}/edit', [TipoServicioController::class, 'edit'])->name('admin.tiposervicios.edit');
Route::put('tiposervicios/{tiposervicios}', [TipoServicioController::class,'update'])->name('admin.tiposervicios.update');
Route::delete('tiposervicios/{tiposervicios}', [TipoServicioController::class,'destroy'])->name('admin.tiposervicios.destroy');

//Ruta de los Pedidos
Route::get('pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
Route::get('pedidos/create', [PedidoController::class, 'create'])->name('admin.pedidos.create');
Route::post('pedidos', [PedidoController::class,'store'])->name('admin.pedidos.store');
Route::get('pedidos/{pedido}', [PedidoController::class,'show'])->name('admin.pedidos.show');
Route::get('pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('admin.pedidos.edit');
Route::put('pedidos/{id}', [PedidoController::class,'update'])->name('admin.pedidos.update');
Route::delete('pedidos/{pedido}', [PedidoController::class,'destroy'])->name('admin.pedidos.destroy');
//Reporte
Route::get('admin.pedidos.reporte', [PedidoController::class, 'reporte'])->name('admin.pedidos.reporte');

//Ruta de los Eventos
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

//Ruta de los Equipos
Route::get('equipos', [EquipoController::class, 'index'])->name('admin.equipos.index');
Route::get('/equipos/all', [EquipoController::class, 'getAllEvents'])->name('admin.equipos.all');
Route::get('equipos/create', [EquipoController::class, 'create'])->name('admin.equipos.create');
Route::post('equipos', [EquipoController::class,'store'])->name('admin.equipos.store');
Route::get('equipos/{equipo}', [EquipoController::class,'show'])->name('admin.equipos.show');
Route::get('equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('admin.equipos.edit');
Route::put('equipos/{equipo}', [EquipoController::class,'update'])->name('admin.equipos.update');
Route::delete('equipos/{equipo}', [EquipoController::class,'destroy'])->name('admin.equipos.destroy');
//Reporte


//Ruta de tipos de equipos
Route::get('tipoequipos', [TipoEquipoController::class, 'index'])->name('admin.tipoequipos.index');
Route::get('/tipoequipos/all', [TipoEquipoController::class, 'getAllEvents'])->name('admin.tipoequipos.all');
Route::get('tipoequipos/create', [TipoEquipoController::class, 'create'])->name('admin.tipoequipos.create');
Route::post('tipoequipos', [TipoEquipoController::class,'store'])->name('admin.tipoequipos.store');
Route::get('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'show'])->name('admin.tipoequipos.show');
Route::get('tipoequipos/{tipoequipo}/edit', [TipoEquipoController::class, 'edit'])->name('admin.tipoequipos.edit');
Route::put('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'update'])->name('admin.tipoequipos.update');
Route::delete('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'destroy'])->name('admin.tipoequipos.destroy');

//Ruta de los Usuarios
Route::get('/users', [UsuarioController::class, 'index'])->name("admin.users.servicio");
Route::delete('users/{user}', [ServicioController::class,'destroy'])->name('admin.users.destroy');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name("admin.usuarios.index");
Route::delete('users/{user}', [UsuarioController::class,'destroy'])->name('admin.users.destroy');

//Route::get('/index', [UsuarioController::class, 'index'])->name("admin.clientes.cliente");

require __DIR__.'/auth.php';
