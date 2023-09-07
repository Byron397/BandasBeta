<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Eventos;
use App\Models\Bandas;
use App\Models\Multimedia;
use Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = Usuarios::where('tipo_usuario', 'banda')->get();
        $bandas = Bandas::select('id','id_usuario','nombre','genero','descripcion','redes_sociales',
        'zona','contacto')->orderBy('nombre')->get();
        $multimedia = Multimedia::all();

        $usuarioactual=Session::get('usuarioactual');
        return view('welcome')->with('bandas',$bandas)->with('multimedia', $multimedia)
            ->with('usuarios', $usuarios)->with("usuario", $usuarioactual);
        
    }

    public function verbandas()
    {
        $usuarios = Usuarios::where('tipo_usuario', 'banda')->get();
        $bandas = Bandas::select('id','id_usuario','nombre','genero','descripcion','redes_sociales',
        'zona','contacto')->orderBy('nombre')->get();
        $multimedia = Multimedia::all();

        $usuarioactual=Session::get('usuarioactual');
        return view('verbandas')->with('bandas',$bandas)->with('multimedia', $multimedia)
            ->with('usuarios', $usuarios)->with("usuario", $usuarioactual);
    }


    public function main()
    {
        $usuarios = Usuarios::where('tipo_usuario', 'banda')->get();
        $bandas = Bandas::select('id','id_usuario','nombre','genero','descripcion','redes_sociales',
        'zona','contacto')->orderBy('nombre')->get();
        $multimedia = Multimedia::all();

        $usuarioactual=Session::get('usuarioactual');
        return view('welcome')->with('bandas',$bandas)->with('multimedia', $multimedia)
            ->with('usuarios', $usuarios)->with("usuario", $usuarioactual);
        
    }

    public function mediabanda(Request $request)
    {
        $multimedia = Multimedia::all();
        $bandas = Bandas::orderBy('nombre')->get();
        $usuarioactual = Session::get('usuarioactual');
        $archivosBanda = [];

        if ($request->has('bandaSeleccionada')) {
            $bandaSeleccionada = $request->input('bandaSeleccionada');
            $archivosBanda = Multimedia::where('id_banda', $bandaSeleccionada)->get();
        }

        return view('mediabanda')->with('multimedia', $multimedia)
            ->with('bandas', $bandas)
            ->with('archivosBanda', $archivosBanda)
            ->with('usuario', $usuarioactual);
    }

}
