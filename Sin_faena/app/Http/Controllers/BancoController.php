<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBancoRequest;
use App\Http\Requests\UpdateBancoRequest;
use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    public function index()
    {
        $bancos = Banco::all();
        
        return view('admin.bancos.index', compact('bancos'));
    }

    public function create()
    {
        $bancos = Banco::all();
        
        return view('admin.bancos.create', compact('bancos'));
    }

    public function store(StoreBancoRequest $request)
    {
        Banco::create($request->validated());
        return redirect()->route('admin.bancos.index')->with('success', 'Banco actualizado exitosamente');
    }

    public function show(Banco $banco)
    {        
        return view('admin.bancos.show', compact('banco'));
    }

    public function edit(Banco $bancos)
    {
        return view('admin.bancos.edit', compact('bancos'));

    }

    public function update(UpdateBancoRequest $request, Banco $banco)
    {
        $banco->update($request->validated());
        return redirect()->route('admin.bancos.index')->with('success', 'Banco actualizado exitosamente');
    }

    public function destroy(Banco $banco)
    {
        $banco->delete();
        return back();
    }
}
