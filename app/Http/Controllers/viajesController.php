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
            'dir_origen'    => 'required',
            'dir_destino'   => 'required'          
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
            'destinatario'  => $destinatario->nombre,
            'estado'        => 'Creado',
            'id_solicitud'  => $solicitud->id,
            'dir_origen'    => $request->dir_origen,
            'dir_destino'   => $request->dir_destino          
        ]);

        return redirect('solicitud/' . $solicitud->id . '/viajes');
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

    protected function editarEstado()
    {
        $estados = Estado::all();

        return view('editarViaje');
    }

    protected function cambiarEstado(Request $request, $id)
    {
        $viaje = Viaje::where('id', $id)->first();

        $viaje->estado = $request->estado;

        $viaje->save();

        return redirect('solicitud/' . $viaje->id_solicitud . '/viajes');
    }

    protected function consulta(Request $request, $idViaje)
    {
        $viaje = Viaje::where('id', $idViaje)->first();
        $solicitud = Solicitud::where('id', $viaje->id_solicitud)->first();
        $estados    = Estado::All();
        $vehiculos  = Vehiculo::where('activo', 1)->get();
        $destinatario = Cliente::All();
        $ciudades   = Cod_Ciudad::All();
        $medidas    = Medida::All();


        return view('pages.editarViaje', compact('viaje', 'solicitud', 'estados', 'vehiculos', 'destinatario', 'ciudades', 'medidas'));
    }

    protected function editar(Request $request, $idViaje)
    {
        $this->validate($request, [
            'cantidad'      => 'required',
            'fecha_salida'  => 'required',
            'fecha_entrega' => 'required',
            'manifiesto'    => 'required',
            'placa'         => 'required',
            'origen'        => 'required',
            'destino'       => 'required',
            'medida'        => 'required',
            'destinatario'  => 'required', 
            'dir_origen'    => 'required',
            'dir_destino'   => 'required',
            'estado'        => 'required'          
        ]);

        $viaje = Viaje::where('id', $idViaje)->first();

        $viaje->cantidad       = $request->cantidad;
        $viaje->fecha_salida   = $request->fecha_salida;
        $viaje->fecha_entrega  = $request->fecha_entrega;
        $viaje->manifiesto     = $request->manifiesto;
        $viaje->placa          = $request->placa;
        $viaje->origen         = $request->origen;
        $viaje->destino        = $request->destino;
        $viaje->medida         = $request->medida;
        $viaje->destinatario   = $request->destinatario;
        $viaje->dir_origen     = $request->dir_origen;
        $viaje->dir_destino    = $request->dir_destino;
        $viaje->estado         = $request->estado;

        $viaje->save();

        return redirect('solicitud/' . $viaje->id_solicitud . '/viajes');
    }
}
