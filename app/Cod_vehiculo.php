<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conf_vehiculo extends Model
{
    protected $table = 'configuracion_vehiculos';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'tipo'
    ];
}
