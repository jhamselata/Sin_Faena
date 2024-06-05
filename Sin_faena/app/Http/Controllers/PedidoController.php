<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with(['servicios'])->get();
        $users = User::all();

        $user = Auth::user();
        $layout = 'layouts.app'; // Default view

        if ($user->hasRole('admin')) {
            $layout = 'layouts.admin';
        } elseif ($user->hasRole('empleado')) {
            $layout = 'layouts.empleado';
        } elseif ($user->hasRole('supervisor')) {
            $layout = 'layouts.supervisor';
        }

        return view('admin.pedidos.index', compact('pedidos', 'users', 'layout'));
    }

    public function dashboard()
    {
        $pedidosPendientes = Pedido::where('estado_pedido', 'pendiente')->get();
        $pedidosEnprogresos = Pedido::where('estado_pedido', 'En progreso')->get();
        return view('dashboard', compact('pedidosPendientes','pedidosEnprogresos'));
    }

    public function dashboardEmpleado()
    {
        $pedidosPendientes = Pedido::where('estado_pedido', 'pendiente')->get();
        $pedidosEnprogresos = Pedido::where('estado_pedido', 'En progreso')->get();
        return view('dashboardEmpleado', compact('pedidosPendientes','pedidosEnprogresos'));
    }

    public function dashboardSupervisor()
    {
        $pedidosPendientes = Pedido::where('estado_pedido', 'pendiente')->get();
        $pedidosEnprogresos = Pedido::where('estado_pedido', 'En progreso')->get();
        return view('dashboardSupervisor', compact('pedidosPendientes','pedidosEnprogresos'));
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

        return redirect()->route('dashboard')->with('success', 'Pedido aceptado exitosamente');
    }

    public function cancelar($id)
    {
        $pedido = Pedido::find($id);
        $pedido->estado_pedido = 'Cancelado';
        $pedido->save();

        return redirect()->route('dashboard')->with('success', 'Pedido cancelado exitosamente');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::all();
        $users = User::all();

        return view('admin.pedidos.create', compact('servicios', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->load('servicios'); // Cargar los servicios asociados
        $servicios = Servicio::all(); // Obtener todos los servicios disponibles
        $serviciosSeleccionados = $pedido->servicios->pluck('id')->toArray(); // Convertir la colección de servicios seleccionados a un array de IDs
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

        // Obtener los IDs de los servicios seleccionados
        $serviciosSeleccionados = $pedido->servicios->pluck('id')->toArray();

        return view('admin.pedidos.edit', compact('servicios', 'users', 'serviciosSeleccionados', 'pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        // Eliminar los servicios asociados en la tabla intermedia
        $pedido->servicios()->detach();

        // Eliminar el pedido
        $pedido->delete();

        return back();
    }
}
