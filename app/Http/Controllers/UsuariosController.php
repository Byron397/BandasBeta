<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Session;


class UsuariosController extends Controller
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
        $usuarios = Usuarios::select('id','nombre','ap_pat','ap_mat','tipo_usuario','correo','password')
                   ->orderBy('ap_pat')->get();

        $usuarioactual=Session::get('usuarioactual');
        return view('Usuarios.index')->with('usuarios',$usuarios)->with("usuario", $usuarioactual);
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
        Usuarios::create([
            'nombre' => $data['nombre'],
            'ap_pat' => $data['ap_pat'],
            'ap_mat' => $data['ap_mat'],
            'tipo_usuario' => $data['tipo_usuario'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('/usuarios')->with('success', 'El usuario ha sido agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = Usuarios::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $datos['password']=Hash::make($datos['password']);
        $usuarios = Usuarios::find($id);
        $usuarios->update($datos);
        return redirect('/usuarios')->with('success', 'El usuario ha sido actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->delete();
        return redirect('/usuarios')->with('success', 'El usuario ha sido eliminado con éxito');
    }
}
