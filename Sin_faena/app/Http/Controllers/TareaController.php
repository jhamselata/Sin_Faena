<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Models\Tarea;
use App\Models\User;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $tareas = Tarea::with(['user'])->get();

        $users = User::all();

        return view('admin.tareas.index', compact('tareas','users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.tareas.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTareaRequest $request)
    {
        Tarea::create($request->validated());
        return redirect()->route('admin.tareas.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        $users = User::all();

        return view('admin.tareas.show', compact('users','tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        $users = User::all();

        return view('admin.tareas.edit', compact('users','tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareaRequest $request, Tarea $tarea)
    {
        $tarea->update($request->validated());
        return redirect()->route('admin.tareas.index')->with('success', 'Tarea actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return back();
    }
}
