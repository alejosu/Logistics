<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cod_Ciudad;

class CiudadesController extends Controller
{
    /**
     * Create a new Ciudad instance.
     *
     * @param  array  $data
     * @return Cod_ciudad
     */
    protected function create(Request $request)
    {
        
        $this->validate($request, [
            'nombre'    => 'required|min:2'
        ]);

        Cod_Ciudad::create([
            'nombre' => $request->nombre,
        ]);

        return redirect('ciudades');
    }

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function ciudades()
    {
		$ciudades = Cod_Ciudad::All();

    	return view('pages.ciudades', compact('ciudades'));
    }

    protected function newCiudad()
    {
    	return view('pages.crearCiudad');
    }

    protected function destroy(Request $request, $id)
    {
        $ciudad = Cod_Ciudad::findOrFail($id);
        $ciudad->delete();

        return redirect('ciudades');
    }

    protected function consultar(Request $request, $id)
    {
        $ciudad = Cod_Ciudad::where('id', $id)->first();

        return view('pages.editarCiudad', compact('ciudad')); 
    }

    protected function editar(Request $request, $id)
    {
        $ciudad = Cod_Ciudad::where('id',$id)->first();

        $this->validate($request, [
            'nombre'        => 'required'
        ]);

        $ciudad->nombre = $request->nombre;

        $ciudad->save();

        return redirect('ciudades');

    }
}
