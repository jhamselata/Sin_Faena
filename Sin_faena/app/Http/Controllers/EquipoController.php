<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use App\Models\Equipo;
use App\Models\TipoEquipo;

use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all();
        $tipoequipos = TipoEquipo::all();

        return view('admin.equipo.index', compact('equipos', 'tipoequipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoequipos = TipoEquipo::all();

        return view('admin.equipo.create', compact('tipoequipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipoRequest $request)
    {
        Equipo::create($request->validated());

        return redirect()->route('admin.equipos.index')->with('success', 'Equipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        $tipoequipos = TipoEquipo::all();

        return view('admin.equipo.show', compact('equipo' ,'tipoequipos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        $tipoequipos = TipoEquipo::all();
        
        return view('admin.equipo.edit', compact('equipo', 'tipoequipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEquipoRequest $request, Equipo $equipo)
    {
        $equipo->update($request->validated());
        return redirect()->route('admin.equipos.index')->with('success', 'Equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return back();
    }
}
