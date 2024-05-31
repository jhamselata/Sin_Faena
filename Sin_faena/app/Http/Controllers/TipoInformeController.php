<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoInformeRequest;
use App\Http\Requests\UpdateTipoInformeRequest;
use App\Models\Tipo_informe;

class TipoInformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoinformes = Tipo_informe::all();

        return view('admin.tipoinformes.index', compact('tipoinformes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tipoinformes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoInformeRequest $request)
    {
        Tipo_informe::create($request->validated());

        return redirect()->route('admin.tipoinformes.index')->with('success', 'Tipo de informe creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo_informe $tipoinforme)
    {
        return view('admin.tipoinformes.show', compact('tipoinforme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo_informe $tipoinforme)
    {
        return view('admin.tipoinformes.edit', compact('tipoinforme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoInformeRequest $request, Tipo_informe $tipoinforme)
    {
        $tipoinforme->update($request->validated());

        return redirect()->route('admin.tipoinformes.index')->with('success', 'Tipo de informe actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo_informe $tipoinforme)
    {
        $tipoinforme->delete();

        return back();
    }
}
