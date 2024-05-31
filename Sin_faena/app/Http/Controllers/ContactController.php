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
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $details = [
            'title' => 'Nuevo mensaje acerca de su pedido',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        $attachments = $request->file('attachments') ?? [];

        Mail::to('sinfaena@gmail.com')->send(new CompleteMail($details, $attachments));

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }

    public function completeEmail()
    {


        return view('admin.correos.complete');
    }
}
