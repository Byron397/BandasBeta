<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $table = 'multimedia';

    protected $fillable = ['id_banda','tipo','archivo'];

    public function bandas()
    {
    	return $this->belongsTo('App\Models\Bandas','id_banda','id');
    }
}
