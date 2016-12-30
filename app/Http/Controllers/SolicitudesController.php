<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\Estado;
use App\Mercancia;
use App\Cliente;

class SolicitudesController extends Controller
{
    /**
     * Create a new Solicitud instance.
     *
     * @param  array  $data
     * @return Solicitud
     */
    protected function create(Request $request)
    {
        
        $this->validate($request, [
            'cliente'       => 'required',
            'mercancia' 	=> 'required',
            'cantidad'  	=> 'required',
            'estado'		=> 'required'
        ]);

        $cliente = Cliente::where('nombre', $request->cliente)->first();

        Solicitud::create([
            'id_cliente'    => $cliente->id,
            'mercancia' 	=> $request->mercancia,
            'cantidad'  	=> $request->cantidad,
            'estado'		=> $request->estado
        ]);

        return redirect('solicitudes');
    }

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function solicitudes()
    {
		$solicitudes = Solicitud::All();
		$estados     = Estado::All();

    	return view('pages.solicitudes', compact('solicitudes', 'estados'));
    }

    protected function newSolicitud()
    {
    	$mercancias = Mercancia::All();
    	$estados    = Estado::All();
        $clientes   = Cliente::All();

    	return view('pages.crearSolicitud', compact('mercancias', 'estados', 'clientes'));
    }

    protected function cambiarEstado(Request $request, $id)
    {
    	$estados = Estado::All();
    	$solicitud = Solicitud::where('id',$id)->first();

    	return view("pages.cambiarEstado", compact('estados', 'solicitud'));
    }

    protected function cambiar(Request $request, $id)
    {
        $solicitud = Solicitud::where('id',$id)->first();
        $estado    = Estado::where('descripcion', $request->estado)->first(); 
        $solicitud->estado = $estado->descripcion;
        $solicitud->save();
        
        return redirect('solicitudes');
    }
}
