<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = ['nombre','ap_pat','ap_mat','tipo_usuario','correo','password'];

    public function banda()
    {
        return $this->hasOne('App\Models\Bandas', 'id_usuario', 'id');
    }

    public function evento()
    {
        return $this->hasMany('App\Models\Eventos', 'id_cliente', 'id');
    }

}
