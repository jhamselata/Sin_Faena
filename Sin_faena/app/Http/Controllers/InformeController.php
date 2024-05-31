<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInformeRequest;
use App\Http\Requests\UpdateInformeRequest;
use App\Models\Informe;
use App\Models\Tipo_informe;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informes = Informe::all();
        $tipoinformes = Tipo_informe::all();

        return view('admin.informes.index', compact('tipoinformes', 'informes'));
    }

    public function reporte()
    {
        $informes = Informe::all();
        $tipoinformes = Tipo_Informe::all();
  
        $pdf = facadePdf::loadView('admin.informes.reporte', compact('tipoinformes, informes'));

        return $pdf->stream('reporte_informes.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInformeRequest $request)
    {
        Informe::create($request->validated());

        return redirect()->route('admin.informes.index')->with('success', 'Informe creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Informe $informe)
    {
        $tipoinformes = Tipo_informe::all();

        return view('admin.informes.show', compact('tipoinformes', 'informe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informe $informe)
    {
        $tipoinformes = Tipo_informe::all();

        return view('admin.informes.edit', compact('tipoinformes', 'informe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInformeRequest $request, Informe $informe)
    {
        $informe->update($request->validated());

        return redirect()->route('admin.informes.index')->with('success', 'Informe actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informe $informe)
    {
        $informe->delete();

        return back();
    }
}
