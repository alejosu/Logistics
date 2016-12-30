<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_vehiculo extends Model
{
    protected $table = 'historial_vehiculo';

    public function vehiculo()
    {
    	return $this->belongsTo('App\Vehiculo', 'id_vehiculo');
    }
}
