<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Usuarios;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest')->except('getLogout');
    }

    public function postLogin(Request $request)
    {
        try {
            $datos = $request->all();
            $correo = $datos['correo'];
            $password = $datos['password'];
    
            $usu=\DB::table('usuarios')->where('correo', $correo)->first();
    
            if ($usu) {
                if (Hash::check($password, $usu->password)) {
                    Session::put(['usuarioactual' => $usu]);
                    $usuarioactual = Session::get('usuarioactual');
                    return redirect('main')->with("usuario", $usuarioactual)->with('exito', '¡Bienvenido! '. $usu->nombre);
                } else {
                    return redirect('main')->with('error', 'Contraseña incorrecta');
                }
            } else {
                return redirect('main')->with('error', 'Correo incorrecto');
            }
        } catch (\Exception $e) {
            $errorMessage = 'Error: ' . $e->getMessage();
            return redirect()->back()->withInput()->with('error', $errorMessage);
        }
    }    

    public function getLogout(){
        session()->forget('usuarioactual');
        return redirect("/")->with('success', 'Sesión Cerrada');
    }

    public function postRegister(Request $request){
        $data = $request->all();

        Usuarios::create([
            'nombre' => $data['nombre'],
            'ap_pat' => $data['ap_pat'],
            'ap_mat' => $data['ap_mat'],
            'tipo_usuario' => $data['tipo_usuario'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
        ]);

        //echo"<script>alert('Usuario Registrado, Puedes iniciar sesion')</script>";

        $usuarioactual=Session::get('usuarioactual');
        return redirect('main')->with("usuario", $usuarioactual)
        ->with('success', 'Registro Éxitoso');
        
    } 
}
