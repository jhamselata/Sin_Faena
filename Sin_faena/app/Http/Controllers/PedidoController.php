<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Servicio;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('detallePedidos.servicio')->get();
        $users = User::all();

        return view('admin.pedidos.index', compact('pedidos', 'users'));
    }

    public function dashboard()
    {
        $pedidosPendientes = Pedido::where('estado_pedido', 'pendiente')->get();
        $pedidosEnprogresos = Pedido::where('estado_pedido', 'En progreso')->get();
        return view('dashboard', compact('pedidosPendientes','pedidosEnprogresos'));
    }

    public function completado($id)
{
    $pedido = Pedido::find($id);
    $pedido->estado_pedido = 'Completado';
    $pedido->save();

    $users = User::all(); // Obtén todos los usuarios

    // Redirige a una vista que contiene el formulario para enviar el correo
    return view('admin.correos.complete', compact('pedido', 'users'));
}

    public function aceptar($id)
    {
        $pedido = Pedido::find($id);
        $pedido->estado_pedido = 'En progreso';
        $pedido->save();

        return redirect()->route('dashboard')->with('success', 'Pedido aceptado exitosamente.');
    }

    public function cancelar($id)
    {
        $pedido = Pedido::find($id);
        $pedido->estado_pedido = 'Cancelado';
        $pedido->save();

        return redirect()->route('dashboard')->with('success', 'Pedido cancelado exitosamente.');
    }

    public function reporte($id)
    {
        $pedido = Pedido::findOrFail($id);
        $users = User::all();
        $servicios = Servicio::all();

        $pdf = facadePdf::loadView('admin.pedidos.reporte', compact('users', 'servicios', 'pedido'));

        return $pdf->stream('reporte_pedidos.pdf');
    }

    public function create()
    {
        $servicios = Servicio::all();
        $users = User::all();

        return view('admin.pedidos.create', compact('servicios', 'users'));
    }

    public function store(StorePedidoRequest $request)
    {
        $pedido = new Pedido();

        $pedido->id_usuario = $request->input('id_usuario');
        $pedido->descripcion_pedido = $request->input('descripcion_pedido');
        $pedido->fecha_pedido = $request->input('fecha_pedido');
        $pedido->estado_pedido = $request->input('estado_pedido', 'pendiente');

        $pedido->save();

        $pedido->servicios()->sync($request->input('servicios'));

        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido creado exitosamente');
    }

    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->load('detallePedidos.servicio'); // Cargar las relaciones correctamente
        $servicios = Servicio::all();
        $serviciosSeleccionados = $pedido->detallePedidos->pluck('id_servicio')->toArray();
        $users = User::all();

        return view('admin.pedidos.show', compact('pedido', 'servicios', 'serviciosSeleccionados', 'users'));
    }
    




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $servicios = Servicio::all();
        $users = User::all();
        $serviciosSeleccionados = $pedido->detallePedidos->pluck('id_servicio')->toArray();

        return view('admin.pedidos.edit', compact('servicios', 'users', 'serviciosSeleccionados', 'pedido'));
    }

    public function update(UpdatePedidoRequest $request, $id)
{
    $pedido = Pedido::findOrFail($id);
    
    // Actualizar otros campos del pedido
    $pedido->id_usuario = $request->input('id_usuario');
    $pedido->descripcion_pedido = $request->input('descripcion_pedido');
    $pedido->fecha_pedido = $request->input('fecha_pedido');
    $pedido->estado_pedido = $request->input('estado_pedido');

        $pedido->save();

    // Actualizar los servicios seleccionados en la tabla intermedia
    $pedido->servicios()->sync($request->input('servicios'));

        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido actualizado exitosamente');
    }

    public function destroy(Pedido $pedido)
{
    // Eliminar los servicios asociados en la tabla intermedia
    $pedido->servicios()->detach();

    // Eliminar el pedido
    $pedido->delete();

        return back();
    }
}
