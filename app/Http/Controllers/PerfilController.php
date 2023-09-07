<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandas;
use App\Models\Usuarios;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;
use Session;

class PerfilController extends Controller
{
    public function __construct(){

        $this->middleware('usuarioBanda');

    }

    /*    public function index()
        {
            $usuarioactual = session('usuarioactual');
            $banda = null;
            
            if ($usuarioactual) {
                $usuario = Usuarios::with('banda')->find($usuarioactual->id);
                
                if ($usuario->banda) {
                    $banda = $usuario->banda;
                }
            }
            
            return view('perfil.index', compact('usuario', 'banda'));
        }
    */

    public function index()
    {
        $usuarioactual = session('usuarioactual');
        $banda = null;
        $eventos = null;
        
        if ($usuarioactual) {
            $usuario = Usuarios::with('banda.eventos')->find($usuarioactual->id);
            
            if ($usuario->banda) {
                $banda = $usuario->banda;
                
                if ($banda->eventos) {
                    $eventos = $banda->eventos;
                }
            }
        }
        
        return view('perfil.index', compact('usuario', 'banda', 'eventos'));
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

        return redirect()->route('perfil.index')->with('success','Cambios Guardados');
    }

    public function editBanda(Request $request)
    {
        $usuarioactual = session('usuarioactual');

        if ($usuarioactual) {
            $usuario = Usuarios::find($usuarioactual->id);
            
            if ($usuario->banda) {
                $banda = $usuario->banda;
                
                $banda->nombre = $request->input('nombre');
                $banda->genero = $request->input('genero');
                $banda->descripcion = $request->input('descripcion');
                $banda->redes_sociales = $request->input('redes_sociales');
                $banda->zona = $request->input('zona');
                $banda->contacto = $request->input('contacto');
                
                $banda->save();
            } else {
                $banda = new Bandas();
                $banda->nombre = $request->input('nombre');
                $banda->genero = $request->input('genero');
                $banda->descripcion = $request->input('descripcion');
                $banda->redes_sociales = $request->input('redes_sociales');
                $banda->zona = $request->input('zona');
                $banda->contacto = $request->input('contacto');
                
                $usuario->banda()->save($banda);
            }
        }

        return redirect()->route('perfil.index')->with('success','Cambios Guardados');
    }

    public function subirMultimedia(Request $request)
    {
        $usuarioactual = session('usuarioactual');

        if ($usuarioactual) {
            $banda = Bandas::with('multimedia')->where('id_usuario', $usuarioactual->id)->first();

            if ($banda) {
                $archivos = $request->file('archivo');
                $tipo = $request->input('tipo');

                // Verificar que se hayan enviado archivos
                if ($archivos) {
                    foreach ($archivos as $archivo) {
                        // Guardar cada archivo en el sistema de archivos (por ejemplo, en la carpeta "public/storage/multimedia")
                        $rutaArchivo = $archivo->store('multimedia', 'public');

                        // Crear una nueva entrada en la tabla "multimedia" relacionada con la banda
                        $multimedia = new Multimedia();
                        $multimedia->id_banda = $banda->id;
                        $multimedia->tipo = $tipo;
                        $multimedia->archivo = $rutaArchivo;
                        $multimedia->save();
                    }
                }
            }
        }

        return redirect()->route('perfil.index')->with('success', 'Archivos multimedia subidos correctamente');
    }

    public function destroy($id)
    {
        $multimedia = Multimedia::find($id);

        if (!$multimedia) {
            return redirect('/perfil')->with('error', 'Registro no encontrado');
        }

        $multimedia->delete();

        return redirect('/perfil')->with('success', 'Registro eliminado correctamente');
    }

}
