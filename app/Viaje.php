<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viajes';

    protected $fillable = [
    	'cantidad',
        'fecha_salida',
        'fecha_entrega',
        'manifiesto',
        'placa',
        'origen',
        'destino',
        'medida',
        'destinatario',
        'estado',
        'id_solicitud',
        'dir_origen',
        'dir_destino'
    ];
    
    public function solicitud()
    {
    	return $this->belongsTo('App\Solicitud');
    }
}
