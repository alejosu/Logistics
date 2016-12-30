<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viajes';
    
    public function solicitud()
    {
    	return $this->belongsTo('App\Solicitud');
    }
}
