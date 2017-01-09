<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medida;

class MedidaController extends Controller
{
    /**
     * Create a new Medida instance.
     *
     * @param  array  $data
     * @return Medida
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'descripcion'  => 'required|min:2',
        ]);

        Medida::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect('medidas');
    }

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function medidas()
    {
		$medidas = Medida::All();

    	return view('pages.medidas', compact('medidas'));
    }

    protected function newMedida()
    {
    	return view('pages.crearMedida');
    }

    protected function destroy(Request $request, $id)
    {
        Medida::where('id',$id)->delete();
        
        return redirect('medidas');
    }

    protected function consultar(Request $request, $id)
    {
        $medida = Medida::where('id', $id)->first();

        return view('pages.editarMedida', compact('medida')); 
    }

    protected function editar(Request $request, $id)
    {
        $medida = Medida::where('id',$id)->first();

        $this->validate($request, [
            'descripcion'        => 'required'
        ]);

        $medida->descripcion = $request->descripcion;

        $medida->save();

        return redirect('medidas');

    }
}
