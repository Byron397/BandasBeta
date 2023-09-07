<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = ['id_cliente','id_banda','nombre','fecha','ubicacion'];

    public function usuarios()
    {
    	return $this->belongsTo('App\Models\Usuarios','id_cliente','id');
    }

    public function bandas()
    {
    	return $this->belongsTo('App\Models\Bandas','id_banda','id');
    }
}
