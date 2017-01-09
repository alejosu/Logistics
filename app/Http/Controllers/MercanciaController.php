<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mercancia;
use App\Medida;

class MercanciaController extends Controller
{
    /**
     * Create a new Mercancia instance.
     *
     * @param  array  $data
     * @return Mercancia
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'descripcion'   => 'required|min:2'
        ]);

        $medida = Medida::where('descripcion', $request->medida)->firstOrFail();

        $mercancia = new Mercancia();

        $mercancia->descripcion = $request->descripcion;
        $mercancia->observaciones = $request->observaciones;

        $mercancia->medida = $request->medida;
        $mercancia->save();

        /*Mercancia::create([
            'descripcion' 	=> $request->descripcion,
            'medida' 		=> $medida->id,
            'observaciones' => $request->observaciones
        ]);*/

        return redirect('mercancias');
    }

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function mercancias()
    {
		$mercancias = Mercancia::All();

    	return view('pages.mercancias', compact('mercancias'));
    }

    protected function newMercancia()
    {
    	$medidas = Medida::all();

        return view('pages.crearMercancia', compact('medidas'));
    }

    protected function destroy(Request $request, $id)
    {
        Mercancia::where('id',$id)->delete();
        
        return redirect('mercancias');
    }

    protected function consultar(Request $request, $id)
    {
        $mercancia  = Mercancia::where('id', $id)->first();
        $medidas    = Medida::All();

        return view('pages.editarMercancia', compact('mercancia', 'medidas')); 
    }

    protected function editar(Request $request, $id)
    {
        $mercancia = Mercancia::where('id',$id)->first();

        $this->validate($request, [
            'descripcion'   => 'required',
            'medida'        => 'required'
        ]);

        $mercancia->descripcion = $request->descripcion;
        $mercancia->medida      = $request->medida;
        if($request->observaciones != null)
        {
            $mercancia->observaciones = $request->observaciones;
        }
        $mercancia->save();

        return redirect('mercancias');

    }

}
