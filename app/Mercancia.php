<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mercancia extends Model
{
    protected $table = 'mercancias';

    protected $fillable = [
        'descripcion',
        'medida',
        'observaciones'
    ];

    public function viaje()
    {
    	return $this->belongsTo('App\Viaje');
    }

    
}
