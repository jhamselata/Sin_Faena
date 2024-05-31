<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\Tipo_pagoController;
use App\Http\Controllers\ProfileController;
use App\Mail\ContactMail;
use App\Models\Tipo_pago;
use App\Http\Controllers\TipoEquipoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\TipoClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\TipoInformeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;

//Route::get('/', [UserController::class, 'index'])->name('inicio');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/inicio', [UserController::class, 'index'])->name('inicio');


/**  Route::get('/inicio', function() {
    return view('layouts.index');
})->name('inicio'); 
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::resource('clientes', ClientController::class);
});

Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');
Route::post('/send-email', [ContactController::class, 'sendCompleteEmail'])->name('send.complete.email');
Route::post('admin.correos.complete', [ContactController::class, 'completeEmail'])->name('admin.correos.complete');

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
Route::get('admin.clientes.reporte', [ClientController::class, 'reporte'])->name('admin.clientes.reporte');

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
Route::get('admin.servicios.reporte', [ServicioController::class, 'reporte'])->name('admin.servicios.reporte');

//Ruta de los tipos de servicios
Route::get('tiposervicios', [TipoServicioController::class, 'index'])->name('admin.tiposervicios.index');
Route::get('tiposervicios/create', [TipoServicioController::class, 'create'])->name('admin.tiposervicios.create');
Route::post('tiposervicios', [TipoServicioController::class,'store'])->name('admin.tiposervicios.store');
Route::get('tiposervicios/{tiposervicios}', [TipoServicioController::class,'show'])->name('admin.tiposervicios.show');
Route::get('tiposervicios/{tiposervicios}/edit', [TipoServicioController::class, 'edit'])->name('admin.tiposervicios.edit');
Route::put('tiposervicios/{tiposervicios}', [TipoServicioController::class,'update'])->name('admin.tiposervicios.update');
Route::delete('tiposervicios/{tiposervicios}', [TipoServicioController::class,'destroy'])->name('admin.tiposervicios.destroy');

//Ruta de los Pedidos (Empleado)
Route::get('pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
Route::get('pedidos/create', [PedidoController::class, 'create'])->name('admin.pedidos.create');
Route::post('pedidos', [PedidoController::class,'store'])->name('admin.pedidos.store');
Route::get('pedidos/{pedido}', [PedidoController::class,'show'])->name('admin.pedidos.show');
Route::get('pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('admin.pedidos.edit');
Route::put('pedidos/{id}', [PedidoController::class,'update'])->name('admin.pedidos.update');
Route::delete('pedidos/{pedido}', [PedidoController::class,'destroy'])->name('admin.pedidos.destroy');
Route::get('/dashboard', [PedidoController::class, 'dashboard'])->name('dashboard');
Route::get('/pedidos/aceptar/{id}', [PedidoController::class, 'aceptar'])->name('pedidos.aceptar');
Route::post('/pedidos/cancelar/{id}', [PedidoController::class, 'cancelar'])->name('pedidos.cancelar');
Route::post('/pedidos/completado/{id}', [PedidoController::class, 'completado'])->name('pedidos.completado');

//Rutas de los Pedidos (Cliente)
Route::get('user.pedidos.espera', [UserController::class, 'espera'])->name('user.pedidos.espera');
Route::get('user.pedidos.create', [UserController::class, 'create'])->name('user.pedidos.create');
Route::post('user.pedidos.store', [UserController::class,'store'])->name('user.pedidos.clientStore');
//Reporte
Route::get('admin/pedidos/{id}/reporte', [PedidoController::class, 'reporte'])->name('admin.pedidos.reporte');

//Ruta para los clientes
Route::post('index/{id}/marcar-como-leida', [UserController::class, 'marcarComoLeida'])->name('notificaciones.marcarComoLeida');

//Ruta de los Eventos
Route::get('eventos', [EventoController::class, 'index'])->name('admin.eventos.index');
Route::get('/eventos/all', [EventoController::class, 'getAllEvents'])->name('admin.eventos.all');
Route::get('eventos/create', [EventoController::class, 'create'])->name('admin.eventos.create');
Route::post('eventos', [EventoController::class,'store'])->name('admin.eventos.store');
Route::get('eventos/{eventos}', [EventoController::class,'show'])->name('admin.eventos.show');
Route::get('eventos/{evento}/edit', [EventoController::class, 'edit'])->name('admin.eventos.edit');
Route::put('eventos/update/{evento}', [EventoController::class,'update'])->name('admin.eventos.update');
Route::delete('eventos/{evento}', [EventoController::class,'destroy'])->name('admin.eventos.destroy');

//Rutas de los bancos
Route::get('bancos', [BancoController::class, 'index'])->name('admin.bancos.index');
Route::get('bancos/create', [BancoController::class, 'create'])->name('admin.bancos.create');
Route::post('bancos', [BancoController::class,'store'])->name('admin.bancos.store');
Route::get('bancos/{banco}', [BancoController::class,'show'])->name('admin.bancos.show');
Route::get('bancos/{bancos}/edit', [BancoController::class, 'edit'])->name('admin.bancos.edit');
Route::put('bancos/{banco}', [BancoController::class,'update'])->name('admin.bancos.update');
Route::delete('bancos/{banco}', [BancoController::class,'destroy'])->name('admin.bancos.destroy');

//Rutas de los departamentos
Route::get('departamentos', [DepartamentoController::class, 'index'])->name('admin.departamentos.index');
Route::get('departamentos/create', [DepartamentoController::class, 'create'])->name('admin.departamentos.create');
Route::post('departamentos', [DepartamentoController::class,'store'])->name('admin.departamentos.store');
Route::get('departamentos/{departamento}', [DepartamentoController::class,'show'])->name('admin.departamentos.show');
Route::get('departamentos/{departamentos}/edit', [DepartamentoController::class, 'edit'])->name('admin.departamentos.edit');
Route::put('departamentos/{departamento}', [DepartamentoController::class,'update'])->name('admin.departamentos.update');
Route::delete('departamentos/{departamento}', [DepartamentoController::class,'destroy'])->name('admin.departamentos.destroy');

//Rutas de los tipo de pago
Route::get('tipo_pagos', [Tipo_pagoController::class, 'index'])->name('admin.tipo_pago.index');
Route::get('tipo_pagos/create', [Tipo_pagoController::class, 'create'])->name('admin.tipo_pago.create');
Route::post('tipo_pagos', [Tipo_pagoController::class,'store'])->name('admin.tipo_pago.store');
Route::get('tipo_pagos/{tipo_pago}', [Tipo_pagoController::class,'show'])->name('admin.tipo_pago.show');
Route::get('tipo_pagos/{tipo_pagos}/edit', [Tipo_pagoController::class, 'edit'])->name('admin.tipo_pago.edit');
Route::put('tipo_pagos/{tipo_pago}', [Tipo_pagoController::class,'update'])->name('admin.tipo_pago.update');
Route::delete('tipo_pagos/{tipo_pago}', [Tipo_pagoController::class,'destroy'])->name('admin.tipo_pago.destroy');
//reportes
Route::get('admin.tipo_pagos.reporte', [Tipo_pagoController::class, 'reporte'])->name('admin.tipo_pagos.reporte');

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
Route::get('admin.equipos.reporte', [EquipoController::class, 'reporte'])->name('admin.equipos.reporte');

//Ruta de tipos de equipos
Route::get('tipoequipos', [TipoEquipoController::class, 'index'])->name('admin.tipoequipos.index');
Route::get('/tipoequipos/all', [TipoEquipoController::class, 'getAllEvents'])->name('admin.tipoequipos.all');
Route::get('tipoequipos/create', [TipoEquipoController::class, 'create'])->name('admin.tipoequipos.create');
Route::post('tipoequipos', [TipoEquipoController::class,'store'])->name('admin.tipoequipos.store');
Route::get('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'show'])->name('admin.tipoequipos.show');
Route::get('tipoequipos/{tipoequipo}/edit', [TipoEquipoController::class, 'edit'])->name('admin.tipoequipos.edit');
Route::put('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'update'])->name('admin.tipoequipos.update');
Route::delete('tipoequipos/{tipoequipo}', [TipoEquipoController::class,'destroy'])->name('admin.tipoequipos.destroy');

//Ruta de los informes
Route::get('informes', [InformeController::class, 'index'])->name('admin.informes.index');
Route::get('/informes/all', [InformeController::class, 'getAllEvents'])->name('admin.informes.all');
Route::get('informes/create', [InformeController::class, 'create'])->name('admin.informes.create');
Route::post('informes', [InformeController::class,'store'])->name('admin.informes.store');
Route::get('informes/{informe}', [InformeController::class,'show'])->name('admin.informes.show');
Route::get('informes/{informe}/edit', [InformeController::class, 'edit'])->name('admin.informes.edit');
Route::put('informes/{informe}', [InformeController::class,'update'])->name('admin.informes.update');
Route::delete('informes/{informe}', [InformeController::class,'destroy'])->name('admin.informes.destroy');
//Reporte
Route::get('admin.informes.reporte', [InformeController::class, 'reporte'])->name('admin.informes.reporte');

//Ruta de los Tipos de Informe
Route::get('tipoinformes', [TipoInformeController::class, 'index'])->name('admin.tipoinformes.index');
Route::get('/tipoinformes/all', [TipoInformeController::class, 'getAllEvents'])->name('admin.tipoinformes.all');
Route::get('tipoinformes/create', [TipoInformeController::class, 'create'])->name('admin.tipoinformes.create');
Route::post('tipoinformes', [TipoInformeController::class,'store'])->name('admin.tipoinformes.store');
Route::get('tipoinformes/{tipoinforme}', [TipoInformeController::class,'show'])->name('admin.tipoinformes.show');
Route::get('tipoinformes/{tipoinforme}/edit', [TipoInformeController::class, 'edit'])->name('admin.tipoinformes.edit');
Route::put('tipoinformes/{tipoinforme}', [TipoInformeController::class,'update'])->name('admin.tipoinformes.update');
Route::delete('tipoinformes/{tipoinforme}', [TipoInformeController::class,'destroy'])->name('admin.tipoinformes.destroy');

//Ruta de los Usuarios
Route::get('/users', [UsuarioController::class, 'index'])->name("admin.users.servicio");
Route::delete('users/{user}', [ServicioController::class,'destroy'])->name('admin.users.destroy');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name("admin.usuarios.index");
Route::delete('users/{user}', [UsuarioController::class,'destroy'])->name('admin.users.destroy');
Route::get('admin.users.reporte', [UsuarioController::class, 'reporte'])->name('admin.users.reporte');

//Route::get('/index', [UsuarioController::class, 'index'])->name("admin.clientes.cliente");

require __DIR__.'/auth.php';
