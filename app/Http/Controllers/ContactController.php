<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.form');
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Enregistrement des données dans la base de données ou envoi d'un e-mail, etc.

        // Redirection avec un message de confirmation
        return redirect()->route('contact.form')->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dès que possible.');
    }
}
