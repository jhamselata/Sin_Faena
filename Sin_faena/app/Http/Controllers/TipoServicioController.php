<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoServicioRequest;
use App\Http\Requests\UpdateTipoServicioRequest;
use App\Models\Tipo_servicio;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposervicios = Tipo_servicio::all();

        return view('admin.tiposervicios.index', compact('tiposervicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tiposervicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoServicioRequest $request)
    {
        Tipo_servicio::create($request->validated());

        return redirect()->route('admin.tiposervicios.index')->with('success', 'Tipo de servicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo_servicio $tiposervicios)
    {
        return view('admin.tiposervicios.show', compact('tiposervicios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo_servicio $tiposervicios)
    {
        return view('admin.tiposervicios.edit', compact('tiposervicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoServicioRequest $request, Tipo_servicio $tiposervicios)
    {
        $tiposervicios->update($request->validated());

        return redirect()->route('admin.tiposervicios.index')->with('success', 'Tipo de servicio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo_servicio $tiposervicios)
    {
        $tiposervicios->delete();

        return back();
    }
}
