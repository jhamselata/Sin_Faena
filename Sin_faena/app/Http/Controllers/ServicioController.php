<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Models\Servicio;
use App\Models\Tipo_servicio;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;


use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        $tipo_servicios = Tipo_servicio::all();

        return view('admin.servicios.index', compact('servicios', 'tipo_servicios'));
    }

    public function reporte()
    {
        $servicios = Servicio::get();
        $tipo_servicios = Tipo_servicio::all();

        $pdf = facadePdf::loadView('admin.servicios.reporte', compact('tipo_servicios','servicios'));

        return $pdf->stream('reporte_servicios.pdf');
    }

    public function create()
    {
        $servicios = Servicio::all();
        $tipo_servicios = Tipo_servicio::all();

        return view('admin.servicios.create', compact('servicios', 'tipo_servicios'));
    }
    
    public function store(StoreServicioRequest $request) {
        Servicio::create($request->validated());
        return redirect()->route('admin.servicios.store')->with('success', 'Servicio actualizado exitosamente');
    }

    public function show(Servicio $servicio) {
        $tipo_servicios = Tipo_servicio::all();

        return view('admin.servicios.show', compact('servicio', 'tipo_servicios'));
    }

    public function edit(Servicio $servicios) {
        $tipo_servicios = Tipo_servicio::all();

        return view('admin.servicios.edit', compact('servicios', 'tipo_servicios'));
    }

    public function update(UpdateServicioRequest $request, Servicio $servicio) {
        $servicio->update($request->validated());
        return redirect()->route('admin.servicios.index')->with('success', 'Servicio actualizado exitosamente');
    }

    public function destroy(Servicio $servicio) {
        $servicio->delete();
        return back();
    }

}
