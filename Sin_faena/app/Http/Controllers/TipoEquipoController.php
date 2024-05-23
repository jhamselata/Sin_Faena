<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoEquipoRequest;
use Illuminate\Http\Request;
use App\Models\TipoEquipo;

class TipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoequipos = TipoEquipo::all();

        return view('admin.tipoequipos.index', compact('tipoequipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoequipos = TipoEquipo::all();

        return view('admin.tipoequipos.create', compact('tipoequipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoEquipoRequest $request)
    {
        TipoEquipo::create($request->validated());

        return redirect()->route('admin.tipoequipos.index')->with('success', 'Tipo equipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoEquipo $tipoequipo)
    {
        return view('admin.tipoequipos.show', compact('tipoequipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoEquipo $tipoequipo)
    {
        return view('admin.tipoequipos.edit', compact('tipoequipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTipoEquipoRequest $request, TipoEquipo $tipoequipo)
    {
        $tipoequipo->update($request->validated());

        return redirect()->route('admin.tipoequipos.index')->with('success', 'Tipo equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoEquipo $tipoequipo)
    {
        $tipoequipo->delete();

        return back();
    }
}
