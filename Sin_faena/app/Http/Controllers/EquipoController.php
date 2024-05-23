<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipoRequest;
use Illuminate\Http\Request;
use app\Models\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all();

        return view('admin.equipo.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::all();

        return view('admin.equipo.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipoRequest $request)
    {
        Equipo::create($request->validated());

        return redirect()->route('admin.equipo.index')->with('success', 'Equipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        return view('admin.equipo.show', compact('equipos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        return view('admin.equipo.edit', compact('equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEquipoRequest $request, Equipo $equipo)
    {
        $equipo->update($request->validated());

        return redirect()->route('admin.equipo.index')->with('success', 'Equipo actualizado exitosamente.');
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
