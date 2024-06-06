<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteServicioRequest;
use App\Http\Requests\UpdateClienteServicioRequest;
use App\Models\ClienteServicio;
use App\Models\ServiciosWeb;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = ClienteServicio::with(['serviciosWeb'])->get();
        $users = User::all();

        return view('admin.clientes.index', compact('clientes', 'users'));
    }

    public function dashboard()
    {
        $clientesPendientes = ClienteServicio::where('estado_cliente', 'pendiente')->get();
        $clientesEnProgreso = ClienteServicio::where('estado_cliente', 'En progreso')->get();
        return view('dashboard', compact('clientesPendientes', 'clientesEnProgreso'));
    }

    public function completado($id)
    {
        $cliente = ClienteServicio::find($id);
        $cliente->estado_cliente = 'Completado';
        $cliente->save();

        $users = User::all(); // Obtén todos los usuarios

        // Redirige a una vista que contiene el formulario para enviar el correo
        return view('admin.correos.complete', compact('cliente', 'users'));
    }

    public function aceptar($id)
    {
        $cliente = ClienteServicio::find($id);
        $cliente->estado_cliente = 'En progreso';
        $cliente->save();

        return redirect()->route('admin.correos.confirmacion')->with('success', 'Cliente aceptado exitosamente');
    }

    public function cancelar($id)
    {
        $cliente = ClienteServicio::find($id);
        $cliente->estado_cliente = 'Cancelado';
        $cliente->save();

        return redirect()->route('dashboard')->with('success', 'Cliente cancelado exitosamente');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('admin.clientes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteServicioRequest $request)
    {
        $cliente = new ClienteServicio();

        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        $cliente->preferencia_comunicacion = $request->input('preferencia_comunicacion');
        $cliente->otra_via_comunicacion = $request->input('otra_via_comunicacion', null);

        $cliente->save();

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = ClienteServicio::findOrFail($id);
        $cliente->load('serviciosWeb'); // Cargar los servicios web asociados
        $users = User::all();

        return view('admin.clientes.show', compact('cliente', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = ClienteServicio::findOrFail($id);
        $users = User::all();

        return view('admin.clientes.edit', compact('cliente', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteServicioRequest $request, $id)
    {
        $cliente = ClienteServicio::findOrFail($id);

        // Actualizar los campos del cliente
        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        $cliente->preferencia_comunicacion = $request->input('preferencia_comunicacion');
        $cliente->otra_via_comunicacion = $request->input('otra_via_comunicacion', null);

        $cliente->save();

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClienteServicio $cliente)
    {
        // Eliminar los servicios web asociados
        $cliente->serviciosWeb()->delete();

        // Eliminar el cliente
        $cliente->delete();

        return back();
    }
}
