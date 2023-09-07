<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\BandasController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>'web'], function(){
    

    Route::get('/', [HomeController::class, 'index']);
    Route::get('main', [HomeController::class, 'main']);
    Route::post('login',[LoginController::class,"postLogin"])->name('login');
    Route::post('register',[LoginController::class,"postRegister"])->name('register');
    Route::get('cerrarsesion',[LoginController::class,"getLogout"]);
    Route::get("verbandas", [HomeController::class, "verbandas"]);
    Route::get("/mediabanda", [HomeController::class, "mediabanda"])->name('mediabanda');
    Route::get('/banda/multimedia/{id}', [HomeController::class,"mostrarMultimedia"])->name('banda.multimedia');

    /* Route::get('verbandas', function () {
        return view('verbandas');
        });
    */

});

Route::group(['middleware'=>'usuarioAdmin'], function(){

    //USUARIOS
    Route::get("/usuarios", [UsuariosController::class, "index"]);
    Route::post("/usuarios", [UsuariosController::class, "store"])->name('usuarios.store');
    Route::get("/usuarios/{id}", [UsuariosController::class, "show"])->name('usuarios.show');
    Route::delete("/usuarios/{id}", [UsuariosController::class, "destroy"])->name('usuarios.destroy');
    Route::put("/usuarios/{id}", [UsuariosController::class, "update"])->name('usuarios.update');

    //BANDAS
    Route::get("/bandas", [BandasController::class, "index"]);
    Route::post("/bandas", [BandasController::class, "store"])->name('bandas.store');
    Route::get("/bandas/{id}", [BandasController::class, "show"])->name('bandas.show');
    Route::delete("/bandas/{id}", [BandasController::class, "destroy"])->name('bandas.destroy');
    Route::put("/bandas/{id}", [BandasController::class, "update"])->name('bandas.update');

    //EVENTOS
    Route::get("/eventos", [EventosController::class, "index"]);
    Route::post("/eventos", [EventosController::class, "store"])->name('eventos.store');
    Route::get("/eventos/{id}", [EventosController::class, "show"])->name('eventos.show');
    Route::delete("/eventos/{id}", [EventosController::class, "destroy"])->name('eventos.destroy');
    Route::put("/eventos/{id}", [EventosController::class, "update"])->name('eventos.update');

    //MULTIMEDIA
    Route::get("/multimedia", [MultimediaController::class, "index"]);
    Route::post('/multimedia', [MultimediaController::class, 'store'])->name('multimedia.store');
    Route::get('/multimedia/{id}', [MultimediaController::class, 'show'])->name('multimedia.show');
    Route::delete('/multimedia/{multimedia}', [MultimediaController::class, 'destroy'])->name('multimedia.destroy');
    Route::put('/multimedia/{multimedia}', [MultimediaController::class, 'update'])->name('multimedia.update');
});

Route::group(['middleware'=>'usuarioBanda'], function(){

    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/perfil/editar-usuario', [PerfilController::class, 'editUsuario'])->name('perfil.editUsuario');
    Route::post('/perfil/editar-banda', [PerfilController::class, 'editBanda'])->name('perfil.editBanda');
    Route::post('/perfil/subir-multimedia', [PerfilController::class,'subirMultimedia'])->name('perfil.subirMultimedia');
    Route::delete('/perfil/{multimedia}', [PerfilController::class, 'destroy'])->name('perfil.destroy');

});
Route::group(['middleware'=>'usuarioCliente'], function(){

    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
    Route::post('/cliente/editar-usuario', [ClienteController::class, 'editUsuario'])->name('cliente.editUsuario');
    Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::put('/cliente/{evento}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete("/cliente/{id}", [ClienteController::class, "destroy"])->name('cliente.destroy');
    Route::get('/contacto-banda', [ContactoController::class, 'mostrarFormulario'])->name('contacto.banda');
    Route::post('/contacto-banda/enviar', [ContactoController::class ,'enviarCorreo'])->name('contacto.banda.enviar');
    
});
/*
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/