<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
	protected $table = 'vehiculo';

    protected $fillable = [
        'placa',
        'conductor',
        'id_conductor',
        'capacidad',
        'activo'
    ];
	
    public function historial()
    {
    	return $this->hasMany('Historial_vehiculo', 'id');
    }

    public function viajes()
    {
    	return $this->hasMany('App\Viaje');
    }
}
