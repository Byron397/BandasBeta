<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bandas;
use App\Models\Usuarios;
use Session;

class BandasController extends Controller
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
        $usuarios = Usuarios::where('tipo_usuario', 'banda')->get();
        $bandas = Bandas::select('id','id_usuario','nombre','genero','descripcion','redes_sociales',
        'zona','contacto')->orderBy('nombre')->get();

        $usuarioactual=Session::get('usuarioactual');
        return view('Bandas.index')->with('bandas',$bandas)
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
        Bandas::create([
            'id_usuario' => $data['id_usuario'],
            'nombre' => $data['nombre'],
            'genero' => $data['genero'],
            'descripcion' => $data['descripcion'],
            'redes_sociales' => $data['redes_sociales'],
            'zona' => $data['zona'],
            'contacto' => $data['contacto'],
        ]);
        return redirect('/bandas')->with('success', 'La Banda ha sido añadido con éxito');
    }

    public function show($id)
    {
        $bandas = Bandas::find($id);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $bandas = Bandas::find($id);
        $bandas->update($datos);
        return redirect('/bandas')->with('success', 'La Banda ha sido actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $bandas = Bandas::find($id);
        $bandas->delete();
        return redirect('/bandas')->with('success', 'La Banda ha sido eliminada con éxito');
    }

}
