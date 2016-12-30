<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Viaje;
use App\Solicitud;
use App\Medida;
use App\Vehiculo;
use App\Cod_Ciudad;
use App\Cliente;
use App\Estado;

class viajesController extends Controller
{
    protected function viajes($id)
    {
    	$viajes 	= Viaje::where('id_solicitud', $id)->get();
    	
    	$solicitud  = Solicitud::where('id', $id)->first();
    	
    	return view('pages.viajes', compact('viajes', 'solicitud'));
    }

    protected function create(Request $request)
    {
        
        $this->validate($request, [
            'cantidad' 		=> 'required',
            'fecha_salida' 	=> 'required',
            'fecha_entrega'	=> 'required',
            'manifiesto'	=> 'required',
            'placa'			=> 'required',
            'origen'		=> 'required',
            'destino'		=> 'required',
            'medida'		=> 'required',
            'destinatario'	=> 'required',
            'estado'		=> 'required'            
        ]);

        $cliente = Cliente::where('nombre', $request->cliente)->first();

        Solicitud::create([
            'id_cliente'    => $cliente->id,
            
        ]);

        return redirect('viajes');
    }
}
