<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historial_vehiculo;
use App\Vehiculo;

class HistorialController extends Controller
{
    protected function historial($id)
    {
    	$historial = Historial_vehiculo::where('id_vehiculo', $id)->get();
    	$vehiculo  = Vehiculo::where('id', $id)->first();
    	
    	return view('pages.historial', compact('historial', 'vehiculo'));
    }
}
