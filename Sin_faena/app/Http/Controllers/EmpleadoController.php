<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Models\User;
use App\Models\Puesto;
use App\Models\Empleado;
use App\Models\Departamento;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with(['user','puesto','departamento'])->get();

        $users = User::all();
        $puestos = Puesto::all();
        $departamentos = Departamento::all();

        return view('admin.empleados.index', compact('users','empleados','puestos','departamentos'));
    }

    public function reporte()
    {
        $empleados = Empleado::with(['user','puesto','departamento'])->get();
        $users = User::all();
        $puestos = Puesto::all();
        $departamentos = Departamento::all();

        $pdf = facadePdf::loadView('admin.empleados.reporte', compact('users', 'empleados', 'puestos', 'departamentos'));

        return $pdf->stream('reporte_empleados.pdf');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $puestos = Puesto::all();
        $departamentos = Departamento::all();

        return view('admin.empleados.create', compact('users','puestos','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleadoRequest $request)
    {
        Empleado::create($request->validated());
        return redirect()->route('admin.empleados.index')->with('success', 'Emplado actualizado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        $users = User::all();
        $puestos = Puesto::all();
        $departamentos = Departamento::all();

        return view('admin.empleados.show', compact('users','empleado','puestos','departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        $users = User::all();
        $puestos = Puesto::all();
        $departamentos = Departamento::all();

        return view('admin.empleados.edit', compact('users','empleado','puestos','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->update($request->validated());
        return redirect()->route('admin.empleados.index')->with('success', 'Emplado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return back();
    }
}
