<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notificacion;
use App\Models\Pedido;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notificaciones = collect();

        if ($user) {
            $notificaciones = $user->notificaciones()->whereNull('read_at')->get();
        }

        return view('layouts.index', compact('notificaciones'));
    }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'title' => 'Nuevo mensaje de contacto',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to('sinfaena@gmail.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }



    public function marcarComoLeida($id)
    {
        $notificacion = Notificacion::find($id);
        $notificacion->read_at = now();
        $notificacion->save();

        return redirect()->back()->with('success', 'Notificación marcada como leída.');
    }

    public function espera()
    {

        $pedidos = Pedido::with(['servicios'])->get();
        $users = User::all();

        return view('user.pedidos.espera', compact('pedidos', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::all();
        $users = User::all();

        $user = Auth::user();
        $notificaciones = collect();

        if ($user) {
            $notificaciones = $user->notificaciones()->whereNull('read_at')->get();
        }

        return view('user.pedidos.create', compact('servicios', 'users','notificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();

        $pedido->id_usuario = $request->input('id_usuario');
        $pedido->descripcion_pedido = $request->input('descripcion_pedido');
        $pedido->fecha_pedido = $request->input('fecha_pedido');
        $pedido->estado_pedido = $request->input('estado_pedido', 'pendiente');

        $pedido->save();

        $pedido->servicios()->sync($request->input('servicios'));

        return redirect()->route('user.pedidos.espera')->with('success', 'Pedido creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
