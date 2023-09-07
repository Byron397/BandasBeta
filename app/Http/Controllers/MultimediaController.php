<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Bandas;
use App\Models\Multimedia;
use Session;

class MultimediaController extends Controller
{
    public function __construct(){

        $this->middleware('usuarioAdmin');

    }
    public function index()
    {
        $multimedia = Multimedia::all();
        $bandas = Bandas::orderBy('nombre')->get();

        $usuarioactual=Session::get('usuarioactual');
        return view('Multimedia.index')->with('multimedia', $multimedia)
            ->with('bandas',$bandas)->with("usuario", $usuarioactual);
    }

    public function store(Request $request)
    {
        $archivos = $request->file('archivo');

        foreach ($archivos as $archivo) {
            $extension = $archivo->getClientOriginalExtension();
            $ruta = Storage::disk('public')->putFileAs('multimedia', $archivo, uniqid().'.'.$extension);
        
            $multimedia = new Multimedia();
            $multimedia->id_banda = $request->input('id_banda');
            $multimedia->tipo = $request->input('tipo');
            $multimedia->archivo = $ruta;
            $multimedia->save();
        }
        
        return redirect('/multimedia')->with('success', 'Archivos subidos correctamente');
        
    }

    public function update(Request $request, $id)
    {
        $multimedia = Multimedia::find($id);

        if (!$multimedia) {
            return redirect('/multimedia')->with('error', 'Registro no encontrado');
        }

        $multimedia->id_banda = $request->input('id_banda');
        $multimedia->tipo = $request->input('tipo');

        if ($request->hasFile('archivo')) {
            $archivos = $request->file('archivo');

            foreach ($archivos as $archivo) {
                $extension = $archivo->getClientOriginalExtension();
                $ruta = Storage::disk('public')->putFileAs('multimedia', $archivo, uniqid().'.'.$extension);
                $multimedia->archivo = $ruta;
            }
        }

        $multimedia->save();

        return redirect('/multimedia')->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $multimedia = Multimedia::find($id);

        if (!$multimedia) {
            return redirect('/multimedia')->with('error', 'Registro no encontrado');
        }

        $multimedia->delete();

        return redirect('/multimedia')->with('success', 'Registro eliminado correctamente');
    }

}
