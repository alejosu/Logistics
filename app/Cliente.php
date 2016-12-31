<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nit',
        'nombre',
        'telefono',
        'direccion',
        'contacto',
        'email'
    ];

    public function users()
    {
    	return $this->hasMany('App\User', 'id');
    }

    public function solicitudes()
    {
    	return $this->hasMany('App\Solicitud', 'id');
    }

    
}
