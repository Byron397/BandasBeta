<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoBandaMail;
use App\Models\Usuarios;
use App\Models\Bandas;


class ContactoController extends Controller
{
    /*
        public function mostrarFormulario()
        {
            $usuarioactual = session('usuarioactual');
            $banda = null;
            
            if ($usuarioactual) {
                $usuario = Usuarios::with('banda')->find($usuarioactual->id);
                
                if ($usuario->banda) {
                    $banda = $usuario->banda;
                }
            }
            
            return view('contacto.formulario', compact('banda', 'usuario'));

        }
    */
    public function mostrarFormulario()
    {
        $usuarioactual = session('usuarioactual');
        $banda = null;
        $correoContacto = null;
        
        if ($usuarioactual) {
            $usuario = Usuarios::with('banda')->find($usuarioactual->id);
            
            if ($usuario->banda) {
                $banda = $usuario->banda;
                $correoContacto = $banda->contacto; // Obtener el correo de contacto de la banda
            }
        }
        
        return view('Contacto.formulario', compact('banda', 'usuario', 'correoContacto'));
    }

    public function enviarCorreo(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        $banda = Bandas::find($request->input('banda_id'));

        if (!$banda) {
            return redirect()->back()->withErrors(['message' => 'La banda no existe.']);
        }

        $datosCorreo = [
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje'),
        ];

        Mail::to($banda->contacto)->send(new ContactoBandaMail($datosCorreo));

        return redirect()->back()->with('success', 'El correo ha sido enviado exitosamente.');
    }
}
