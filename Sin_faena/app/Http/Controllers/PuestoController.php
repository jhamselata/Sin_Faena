<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePuestoRequest;
use App\Http\Requests\UpdatePuestoRequest;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puestos = Puesto::all();

        return view('admin.puestos.index', compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puestos = Puesto::all();

        return view('admin.puestos.create', compact('puestos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePuestoRequest $request)
    {
        Puesto::create($request->validated());

        return redirect()->route('admin.puestos.index')->with('success', 'Puesto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puesto $puestos)
    {
        return view('admin.puestos.show', compact('puestos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puesto $puestos)
    {
        return view('admin.puestos.edit', compact('puestos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePuestoRequest $request, Puesto $puestos)
    {
        $puestos->update($request->validated());

        return redirect()->route('admin.puestos.index')->with('success', 'Puesto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puesto $puestos)
    {
        $puestos->delete();

        return back();
    }
}
