<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandas;
use App\Models\Eventos;
use App\Models\Usuarios;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;
use Session;

class ClienteController extends Controller
{
    public function index()
    {
        $usuarioactual = session('usuarioactual');
        $banda = Bandas::orderBy('nombre')->get();
        $evento = null;
        if ($usuarioactual) {
            $usuario = Usuarios::with('evento')->find($usuarioactual->id);
            
            if ($usuario->evento) {
                $evento = $usuario->evento;
            }
        }
        return view('Cliente.index', compact('usuario', 'banda', 'evento'));
    }

    public function editUsuario(Request $request)
    {
        $usuarioactual = session('usuarioactual');

        if ($usuarioactual) {
            $usuario = Usuarios::find($usuarioactual->id);
            
            $usuario->nombre = $request->input('nombre');
            $usuario->ap_pat = $request->input('ap_pat');
            $usuario->ap_mat = $request->input('ap_mat');
            $usuario->correo = $request->input('correo');
            
            $usuario->save();
        }

        return redirect()->route('Cliente.index')->with('success','Cambios Guardados');
    }

    public function store(Request $request)
    {
        $usuarioactual = session('usuarioactual');
        $evento = new Eventos([
            'id_cliente' => $usuarioactual->id,
            'id_banda' => $request->input('id_banda'),
            'nombre' => $request->input('nombre'),
            'fecha' => $request->input('fecha'),
            'ubicacion' => $request->input('ubicacion')
        ]);
        $evento->save();

        return redirect()->route('cliente.index')->with('success', 'Evento creado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $evento = Eventos::findOrFail($id);
        $evento->id_banda = $request->input('id_banda');
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->ubicacion = $request->input('ubicacion');
        $evento->save();

        return redirect()->route('cliente.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $eventos = Eventos::find($id);
        $eventos->delete();
        return redirect('/cliente')->with('success', 'Evento eliminado con éxito');
    }

}
