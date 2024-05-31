<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Evento;
use App\Models\TipoEvento;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_eventos = TipoEvento::all();
        $eventos = Evento::all();

        return view('admin.eventos.index', compact('tipo_eventos', 'eventos'));
    }

    public function reporte()
    {
        $eventos = Evento::with(['tipoevento'])->get();
        $tipoeventos = TipoEvento::all();

        $pdf = facadePdf::loadView('admin.eventos.reporte', compact('eventos', 'tipoeventos'));

        return $pdf->stream('reporte_eventos.pdf');
    }


    public function getAllEvents()
    {
        $eventos = Evento::all();

        $events = [];
        foreach ($eventos as $evento) {
            $events[] = [
                'id' => $evento->id,
                'title' => $evento->titulo_evento,
                'start' => $evento->fecha_inicio,
                'end' => $evento->fecha_fin,
                'description' => $evento->descripcion_evento,
            ];
        }

        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {
        $evento = new Evento();
        $evento->id_tipoEvento = $request->id_tipoEvento;
        $evento->titulo_evento = $request->titulo_evento;
        $evento->descripcion_evento = $request->descripcion_evento;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;

        if ($request->hasFile('anexos')) {
            $file = $request->file('anexos');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/eventos', $fileName, 'public');
            $evento->anexos = $filePath;
        }

        $evento->save();
        return response()->json($evento);
    }


    /**
     * Display the specified resource.
     */
    public function show($eventos)
    {
        $evento = Evento::findOrFail($eventos);
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($evento)
    {
        $eventos = Evento::find($evento);

        return response()->json($eventos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, $evento)
    {
        $eventos = Evento::findOrFail($evento);

        if ($request->hasFile('anexos')) {
            $file = $request->file('anexos');
            $path = $file->store('anexos', 'public');
            $request->merge(['anexos' => $path]);
        }

        $eventos->update($request->all());

        return response()->json($eventos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($evento)
    {
        $eventos = Evento::find($evento);
        $eventos->delete();
    }
}
