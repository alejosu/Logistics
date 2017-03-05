<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Historial_vehiculo;
use App\Conf_vehiculos;

class VehiculoController extends Controller
{
    /**
     * Create a new Vehiculo instance.
     *
     * @param  array  $data
     * @return Vehiculo
     */
    protected function create(Request $request)
    {
        
        $this->validate($request, [
            'placa'     	=> 'required|unique:vehiculo|max:6|min:6',
            'conductor' 	=> 'required|min:2',
            'id_conductor'  => 'required|min:2',
            'capacidad' 	=> 'required',
            'codigo'        => 'required'
        ]);

        if($request->activo == 'Inactivo')
        {
            $activo = 0;
        }
        else
        {
            $activo = 1;
        }

        $vehiculo = Vehiculo::create([
            'placa'     	=> $request->placa,
            'conductor' 	=> $request->conductor,
            'id_conductor'  => $request->id_conductor,
            'capacidad' 	=> $request->capacidad,
            'activo'        => $activo,
            'codigo'        => $request->codigo
        ]);

        $anotacion = New Historial_vehiculo();

        $anotacion->id_vehiculo = $vehiculo->id;
        $anotacion->anotacion = "Registro";

        $anotacion->save();

        return redirect('vehiculos');
    }

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function vehiculos()
    {
		$vehiculos = Vehiculo::All();

    	return view('pages.vehiculos', compact('vehiculos'));
    }

    protected function newVehiculo()
    {
        $codigos = new Conf_vehiculos::all();

    	return view('pages.crearVehiculo', compact('codigos'));
    }

    protected function destroy(Request $request, $id)
    {
        Vehiculo::where('id',$id)->delete();
        
        return redirect('vehiculos');
    }

    protected function activar(Request $request, $id)
    {
        $vehiculo = Vehiculo::where('id',$id)->first();
        $vehiculo->activo = 1;
        $vehiculo->save();

        $anotacion = new Historial_vehiculo();

        $anotacion->id_vehiculo = $vehiculo->id;
        $anotacion->anotacion = "Activación";

        $anotacion->save();

        
        return redirect('vehiculos');
    }

    protected function inactivar(Request $request, $id)
    {
        $vehiculo = Vehiculo::where('id',$id)->first();
        $vehiculo->activo = 0;
        $vehiculo->save();
        
        $anotacion = new Historial_vehiculo();

        $anotacion->id_vehiculo = $vehiculo->id;
        $anotacion->anotacion = "Inactivación";

        $anotacion->save();

        return redirect('vehiculos');
    }

    protected function editarForm(Request $request, $id)
    {
        $vehiculo = Vehiculo::where('id',$id)->first();
        
        return view('pages.editarVehiculo', compact('vehiculo'));
    }

    protected function editar(Request $request, $id)
    {
        
        $this->validate($request, [
            'conductor'     => 'required|min:2',
            'id_conductor'  => 'required|min:2',
            'capacidad'     => 'required'
        ]);

        if($request->activo == 'Inactivo')
        {
            $activo = 0;
        }
        else
        {
            $activo = 1;
        }

        $vehiculo = Vehiculo::where('id',$id)->first();

        $vehiculo->conductor = $request->conductor;
        $vehiculo->id_conductor = $request->id_conductor;
        $vehiculo->capacidad = $request->capacidad;
        $vehiculo->activo = $activo;

        $vehiculo->save();

        $anotacion = new Historial_vehiculo();

        $anotacion->id_vehiculo = $vehiculo->id;
        $anotacion->anotacion = "Edición";

        $anotacion->save();

        return redirect('vehiculos');
    }
}
