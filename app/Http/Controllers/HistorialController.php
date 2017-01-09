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

    protected function newHistorial(Request $request, $id)
    {
    	$vehiculo  = Vehiculo::where('id', $id)->first();

    	return view('pages.crearHistorial', compact('vehiculo'));
    }

    protected function create(Request $request, $id)
    {
        
        $this->validate($request, [
            'anotacion' 	=> 'required'
        ]);

        $anotacion = new Historial_vehiculo();

        $anotacion->id_vehiculo = $id;
        $anotacion->anotacion 	= $request->anotacion;

        $anotacion->save();	

        $historial = Historial_vehiculo::where('id_vehiculo', $id)->get();
    	$vehiculo  = Vehiculo::where('id', $id)->first();

        return view('pages.historial', compact('historial', 'vehiculo'));
    }
}
