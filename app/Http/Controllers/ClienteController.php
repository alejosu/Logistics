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
            'nit'        => 'required|unique:clientes|max:12|min:6',
            'nombre'    => 'required',
            'telefono'  => 'required',
            'direccion' => 'required',
            'contacto'  => 'required',
            'email'     => 'required|email'
        ]);

        Cliente::create([
            'nit'       => $request->nit,
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

    protected function consultar(Request $request, $id)
    {
        $cliente = Cliente::where('id',$id)->first();

        return view('pages.editarCliente', compact('cliente')); 
    }

    protected function editar(Request $request, $id)
    {
        $cliente = Cliente::where('id',$id)->first();

        $this->validate($request, [
            'nit'        => 'required|unique:clientes|max:12|min:6',
            'nombre'    => 'required',
            'telefono'  => 'required',
            'direccion' => 'required',
            'contacto'  => 'required',
            'email'     => 'required|email'
        ]);

        $cliente->nit        = $request->nit;
        $cliente->nombre     = $request->nombre;
        $cliente->telefono   = $request->telefono;
        $cliente->direccion  = $request->direccion;
        $cliente->contacto   = $request->contacto;
        $cliente->email      = $request->email;

        $cliente->save();

        return redirect('editarCliente/' . $cliente->id);

    }
}
