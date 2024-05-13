<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Tipo_cliente;
use App\Models\User;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $tipo_clientes = Tipo_cliente::all();
        $users = User::all();

        return view('admin.clientes.index', compact('clientes', 'tipo_clientes', 'users'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $tipo_clientes = Tipo_cliente::all();
        $users = User::all();

        return view('admin.clientes.create', compact('clientes', 'tipo_clientes', 'users'));
    }
    
    public function store(StoreClienteRequest $request) {
        Cliente::create($request->validated());
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function show(Cliente $cliente) {
        $tipo_clientes = Tipo_cliente::all();
        $users = User::all();

        return view('admin.clientes.show', compact('cliente', 'tipo_clientes', 'users'));
    }

    public function edit(Cliente $clientes) {
        $tipo_clientes = Tipo_cliente::all();
        $users = User::all();

        return view('admin.clientes.edit', compact('clientes', 'tipo_clientes', 'users'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente) {
        $cliente->update($request->validated());
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Cliente $cliente) {
        $cliente->delete();
        return back();
    }

}
