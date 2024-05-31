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

    public function sendCompleteEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'title' => 'Nuevo mensaje relacionado a pedidos',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to('sinfaena@gmail.com')->send(new \App\Mail\CompleteMail($details));

        return redirect()->route('dashboard')->with('success', 'Correo enviado exitosamente');
    }



    public function completeEmail()
    {


        return view('admin.correos.complete');
    }
}
