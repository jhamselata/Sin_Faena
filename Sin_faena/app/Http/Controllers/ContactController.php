<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompleteMail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
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

    public function sendFinalEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'link' => 'required'
        ]);

        $details = [
            'title' => 'Entrega',
            'email' => $request->email,
            'link' => $request->link
        ];

        Mail::to($request->email)->send(new \App\Mail\CompleteMail($details));

        return redirect()->route('dashboard')->with('success', 'Correo enviado exitosamente');
    }

    public function sendConfirmacionEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'link' => 'required'
        ]);

        $details = [
            'title' => 'Entrega',
            'email' => $request->email,
            'link' => $request->link
        ];

        Mail::to($request->email)->send(new \App\Mail\CompleteMail($details));

        return redirect()->route('dashboard')->with('success', 'Correo enviado exitosamente');
    }

    public function sendCompleteEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'cuenta' => 'required',
            'message' => 'required'
        ]);

        $details = [
            'title' => 'Solicitud de pago y pre-view de entrega',
            'email' => $request->email,
            'cuenta' => $request->cuenta,
            'message' => $request->message
        ];

        Mail::to($request->email)->send(new \App\Mail\CompleteMail($details));

        return redirect()->route('dashboard')->with('success', 'Correo enviado exitosamente');
    }


    public function completeEmail()
    {
        return view('admin.correos.complete');
    }

    public function confirmacionEmail()
    {
        return view('admin.correos.confirmacion');
    }

    public function finalEmail()
    {
        return view('admin.correos.final');
    }
}
