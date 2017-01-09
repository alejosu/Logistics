<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UsuarioController extends Controller
{

    /**
     * Return All items from Medida to the medidas main view 
     * 	
     */
    protected function usuarios()
    {
		$usuarios = User::All();

    	return view('pages.usuarios', compact('usuarios'));
    }

    protected function destroy(Request $request, $id)
    {
        User::where('id',$id)->delete();
        
        return redirect('usuarios');
    }

    protected function consultar(Request $request, $id)
    {
        $usuario  = User::where('id', $id)->first();

        return view('pages.editarUsuario', compact('usuario')); 
    }

    protected function editar(Request $request, $id)
    {
        $usuario = User::where('id', $id)->first();

        $this->validate($request, [
            'name'          => 'required|min:6',
            'email'         => 'required|email'
        ]);

        
        $usuario->name      = $request->name;
        $usuario->email     = $request->email;
        $usuario->admin     = $request->admin;
        $usuario->activo    = $request->activo; 

        $usuario->save();

        return redirect('usuarios');

    }
}
