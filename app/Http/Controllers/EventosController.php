<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Bandas;
use App\Models\Usuarios;
use App\Models\Eventos;
use Session;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function __construct(){

        $this->middleware('usuarioAdmin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::where('tipo_usuario', 'cliente')->get();
        $bandas = Bandas::orderBy('nombre')->get();
        $eventos = Eventos::orderBy('fecha')->get();

        $usuarioactual=Session::get('usuarioactual');
        return view('Eventos.index')->with('eventos', $eventos)->with('bandas',$bandas)
            ->with('usuarios', $usuarios)->with("usuario", $usuarioactual);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Eventos::create([
            'id_cliente' => $data['id_cliente'],
            'id_banda' => $data['id_banda'],
            'nombre' => $data['nombre'],
            'fecha' => $data['fecha'],
            'ubicacion' => $data['ubicacion'],
        ]);
        return redirect('/eventos')->with('success', 'Evento creado con éxito');
    }

    public function show($id)
    {
        $eventos = Eventos::find($id);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $eventos = Eventos::find($id);
        $eventos->update($datos);
        return redirect('/eventos')->with('success', 'El Evento ha sido actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $eventos = Eventos::find($id);
        $eventos->delete();
        return redirect('/eventos')->with('success', 'Evento eliminado con éxito');
    }
}
