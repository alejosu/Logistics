<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
    	'id_cliente',
        'mercancia',
        'cantidad',
        'estado'
    ];
    
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    public function viajes()
    {
    	return $this->hasMany('App\Viaje');
    }
}
