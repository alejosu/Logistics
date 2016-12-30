<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cod_ciudad extends Model
{
    protected $table = 'cod_ciudades';

    protected $fillable = [
        'nombre'
    ];
}
