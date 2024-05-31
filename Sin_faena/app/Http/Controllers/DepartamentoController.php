<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();

        return view('admin.departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        $departamentos = Departamento::all();

        return view('admin.departamentos.create', compact('departamentos'));
    }
    
    public function store(StoreDepartamentoRequest $request) {
        Departamento::create($request->validated());
        return redirect()->route('admin.departamentos.index')->with('success', 'Departamento actualizado exitosamente');
    }

    public function show(Departamento $departamento) {

        return view('admin.departamentos.show', compact('departamento'));
    }

    public function edit(Departamento $departamentos) {

        return view('admin.departamentos.edit', compact('departamentos'));
    }

    public function update(UpdateDepartamentoRequest $request, Departamento $departamento) {
        $departamento->update($request->validated());
        return redirect()->route('admin.departamentos.index')->with('success', 'Departamento actualizado exitosamente');
    }

    public function destroy(Departamento $departamento) {
        $departamento->delete();
        return back();
    }

}
