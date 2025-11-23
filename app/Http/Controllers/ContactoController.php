<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoFormulario;
use App\Models\Suscripcion; 

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        // 2. Enviar el correo (A ti misma)
        // Asegúrate de configurar MAIL_FROM_ADDRESS en tu .env
        Mail::to(env('MAIL_FROM_ADDRESS', 'tu_correo@gmail.com'))->send(new ContactoFormulario($request->all()));

        // 3. Redirigir con mensaje de éxito
        return back()->with('status', '¡Mensaje enviado con éxito! Te responderemos pronto.');
    }
    public function subscribe(Request $request)
    {
        // 1. Validar
        $request->validate([
            'email' => 'required|email|unique:suscripcions,email'
        ], [
            'email.unique' => '¡Este correo ya está suscrito!',
            'email.required' => 'Por favor escribe tu correo.',
            'email.email' => 'El formato del correo no es válido.'
        ]);

        // 2. Guardar en BD
        Suscripcion::create([
            'email' => $request->email
        ]);

        // 3. Redirigir con éxito
        return back()->with('status', '¡Gracias por unirte al lado oscuro! 👻 Te avisaremos de las novedades.');
    }
}