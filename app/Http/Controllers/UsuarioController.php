<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
}
