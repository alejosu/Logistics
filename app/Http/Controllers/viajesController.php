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
    protected function viajes(Request $request, $id)
    {
    	$viajes 	= Viaje::where('id_solicitud', $id)->get();
    	
    	$solicitud  = Solicitud::where('id', $id)->first();

        $cliente    = Cliente::where('nombre', $solicitud->cliente)->first();
    	
    	return view('pages.viajes', compact('viajes', 'solicitud', 'cliente'));
    }

    protected function create(Request $request, $id)
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
        ]);

        $solicitud  = Solicitud::where('id', $id)->first();
        $cliente    = Cliente::where('id', $solicitud->id_cliente)->first();
        $destinatario = Cliente::where('nombre', $request->destinatario)->first();
        
        Viaje::create([
            'cantidad'      => $request->cantidad,
            'fecha_salida'  => $request->fecha_salida,
            'fecha_entrega' => $request->fecha_entrega,
            'manifiesto'    => $request->manifiesto,
            'placa'         => $request->placa,
            'origen'        => $request->origen,
            'destino'       => $request->destino,
            'medida'        => $request->medida,
            'destinatario'  => $destinatario->id,
            'estado'        => 'Creado',
            'id_solicitud'  => $solicitud->id          
        ]);

        return redirect('solicitudes/' . $solicitud->id . '/viajes');
    }

    protected function newViaje(Request $request, $id)
    {
        $estados    = Estado::All();
        $vehiculos  = Vehiculo::where('activo', 1)->get();
        $solicitud  = Solicitud::find($id)->first();
        $destinatario = Cliente::All();
        $ciudades   = Cod_Ciudad::All();
        $medidas    = Medida::All();

        return view('pages.crearViaje', compact('estados', 'vehiculos', 'solicitud', 'destinatario', 'ciudades', 'medidas'));
    }
}
