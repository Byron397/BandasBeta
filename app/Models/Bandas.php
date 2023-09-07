<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandas extends Model
{
    use HasFactory;

    protected $table = 'bandas';

    protected $fillable = ['id_usuario','nombre','genero','descripcion','redes_sociales','zona','contacto'];

    public function usuarios()
    {
    	return $this->belongsTo('App\Models\Usuarios','id_usuario','id');
    }
    
    public function multimedia()
    {
        return $this->hasMany('App\Models\Multimedia', 'id_banda', 'id');
    }

    public function eventos()
    {
        return $this->hasMany('App\Models\Eventos', 'id_banda', 'id');
    }

}
