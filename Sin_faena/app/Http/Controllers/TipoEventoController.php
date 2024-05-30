<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipoEventoRequest;
use App\Http\Requests\UpdateTipoEventoRequest;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoeventos = TipoEvento::all();

        return view('admin.tipoeventos.index', compact('tipoeventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoeventos = TipoEvento::all();

        return view('admin.tipoeventos.create', compact('tipoeventos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoEventoRequest $request)
    {
        TipoEvento::create($request->validated());

        return redirect()->route('admin.tipoeventos.index')->with('success', 'Tipo evento creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoEvento $tipoeventos)
    {
        
    return view('admin.tipoeventos.show', compact('tipoeventos'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoEvento $tipoeventos)
    {
        return view('admin.tipoeventos.edit', compact('tipoeventos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoEventoRequest $request, TipoEvento $tipoeventos)
    {
        $tipoeventos->update($request->validated());

        return redirect()->route('admin.tipoeventos.index')->with('success', 'Tipo evento actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoEvento $tipoeventos)
    {
        $tipoeventos->delete();

        return back();
    }
}
