<?php

namespace App\Http\Controllers;

use App\Models\Tipo_cliente;
use App\Http\Requests\StoreTipoClienteRequest;
use App\Http\Requests\UpdateTipoClienteRequest;

class TipoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoclientes = Tipo_cliente::all();

        return view('admin.tipoclientes.index', compact('tipoclientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tipoclientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoClienteRequest $request)
    {
        Tipo_cliente::create($request->validated());

        return redirect()->route('admin.tipoclientes.index')->with('success', 'Tipo de cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo_cliente $tipocliente)
    {
        return view('admin.tipoclientes.show', compact('tipocliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo_cliente $tipocliente)
    {
        return view('admin.tipoclientes.edit', compact('tipocliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoClienteRequest $request, Tipo_cliente $tipocliente)
    {
        $tipocliente->update($request->validated());

        return redirect()->route('admin.tipoclientes.index')->with('success', 'Tipo de cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo_cliente $tipocliente)
    {
        $tipocliente->delete();

        return back();
    }
}
