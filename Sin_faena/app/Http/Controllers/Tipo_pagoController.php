<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipo_pagoRequest;
use App\Http\Requests\UpdateTipo_pagoRequest;
use App\Models\Tipo_pago;

class Tipo_pagoController extends Controller
{
    public function index()
    {
        $tipo_pagos = Tipo_pago::all();

        return view('admin.tipo_pago.index', compact('tipo_pagos'));
    }

    public function create()
    {
        $tipo_pagos = Tipo_pago::all();

        return view('admin.tipo_pago.create', compact('tipo_pagos'));
    }

    public function store(StoreTipo_pagoRequest $request)
    {
        Tipo_pago::create($request->validated());
        return redirect()->route('admin.tipo_pago.index')->with('success', 'Tipo de pago actualizado exitosamente');
    }

    public function show(Tipo_pago $tipo_pago)
    {

        return view('admin.tipo_pago.show', compact('tipo_pago'));
    }

    public function edit(Tipo_pago $tipo_pagos)
    {

        return view('admin.tipo_pago.edit', compact('tipo_pagos'));
    }

    public function update(UpdateTipo_pagoRequest $request, Tipo_pago $tipo_pago)
    {
        $tipo_pago->update($request->validated());
        return redirect()->route('admin.tipo_pago.index')->with('success', 'El tipo de pago ha sido actualizado exitosamente.');
    }

    public function destroy(Tipo_pago $tipo_pago)
    {
        $tipo_pago->delete();
        return back();
    }
}
