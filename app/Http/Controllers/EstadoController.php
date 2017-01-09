<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;

class EstadoController extends Controller
{
    /**
     * Create a new Estado instance.
     *
     * @param  array  $data
     * @return Cod_ciudad
     */
    protected function create(Request $request)
    {
        
        $this->validate($request, [
            'descripcion'    => 'required|min:2'
        ]);

        Estado::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect('estados');
    }

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function estados()
    {
		$estados = Estado::All();

    	return view('pages.estados', compact('estados'));
    }

    protected function newEstado()
    {
    	return view('pages.crearEstado');
    }

    protected function destroy(Request $request, $id)
    {
        Estado::where('id',$id)->delete();
        
        return redirect('estados');
    }

    protected function consultar(Request $request, $id)
    {
        $estado = Estado::where('id', $id)->first();

        return view('pages.editarEstado', compact('estado')); 
    }

    protected function editar(Request $request, $id)
    {
        $estado = Estado::where('id',$id)->first();

        $this->validate($request, [
            'descripcion'        => 'required'
        ]);

        $estado->descripcion = $request->descripcion;

        $estado->save();

        return redirect('estados');

    }
}
