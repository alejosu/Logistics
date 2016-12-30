<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Create a new Client instance.
     *
     * @param  array  $data
     * @return Client
     */
    protected function create(Request $request)
    {
        
        $this->validate($request, [
            'id'        => 'required|unique:clientes|max:12|min:6',
            'nombre'    => 'required',
            'telefono'  => 'required',
            'direccion' => 'required',
            'contacto'  => 'required',
            'email'     => 'required|email'
        ]);

        Cliente::create([
            'id'        => $request->id,
            'nombre' 	=> $request->nombre,
            'telefono' 	=> $request->telefono,
            'direccion' => $request->direccion,
            'contacto' 	=> $request->contacto,
            'email' 	=> $request->email
        ]);

        return redirect('clientes');
    }

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function clientes()
    {
		$clientes = Cliente::All();

    	return view('pages.clientes', compact('clientes'));
    }

    protected function newCliente()
    {
    	return view('pages.crearCliente');
    }

    protected function destroy(Request $request, $id)
    {
        Cliente::where('id',$id)->delete();
        
        return redirect('clientes');
    }
}
