<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('crearMedida', 'MedidaController@newMedida')->middleware('auth');
Route::post('crearMedida', 'MedidaController@create')->middleware('auth');
Route::get('medidas', 'MedidaController@medidas')->middleware('auth');
Route::get('borrarMedida/{id}', 'MedidaController@destroy')->middleware('auth');

Route::get('crearCiudad', 'CiudadesController@newCiudad')->middleware('auth');
Route::post('crearCiudad', 'CiudadesController@create')->middleware('auth');
Route::get('ciudades', 'CiudadesController@ciudades')->middleware('auth');
Route::get('borrarCiudad/{id}', 'CiudadesController@destroy')->middleware('auth');

Route::get('crearCliente', 'ClienteController@newCliente')->middleware('auth');
Route::post('crearCliente', 'ClienteController@create')->middleware('auth');
Route::get('clientes', 'ClienteController@clientes')->middleware('auth');
Route::get('borrarCliente/{id}', 'ClienteController@destroy')->middleware('auth');
Route::get('editarCliente/{id}', 'ClienteController@consultar')->middleware('auth');
Route::post('editarCliente/{id}', 'ClienteController@editar')->middleware('auth');

Route::get('crearEstado', 'EstadoController@newEstado')->middleware('auth');
Route::post('crearEstado', 'EstadoController@create')->middleware('auth');
Route::get('estados', 'EstadoController@estados')->middleware('auth');
Route::get('borrarEstado/{id}', 'EstadoController@destroy')->middleware('auth');

Route::get('crearMercancia', 'MercanciaController@newMercancia')->middleware('auth');
Route::post('crearMercancia', 'MercanciaController@create')->middleware('auth');
Route::get('mercancias', 'MercanciaController@mercancias')->middleware('auth');
Route::get('borrarMercancia/{id}', 'MercanciaController@destroy')->middleware('auth');

Route::get('crearVehiculo', 'VehiculoController@newVehiculo')->middleware('auth');
Route::post('crearVehiculo', 'VehiculoController@create')->middleware('auth');
Route::get('vehiculos', 'VehiculoController@vehiculos')->middleware('auth');
Route::get('borrarVehiculo/{id}', 'VehiculoController@destroy')->middleware('auth');
Route::get('activarVehiculo/{id}', 'VehiculoController@activar')->middleware('auth');
Route::get('inactivarVehiculo/{id}', 'VehiculoController@inactivar')->middleware('auth');
Route::get('editarVehiculo/{id}', 'VehiculoController@editarForm')->middleware('auth');
Route::post('editarVehiculo/{id}', 'VehiculoController@editar')->middleware('auth');

Route::get('usuarios', 'UsuarioController@usuarios')->middleware('auth');
Route::get('borrarUsuario/{id}', 'UsuarioController@destroy')->middleware('auth');

Route::get('crearSolicitud', 'SolicitudesController@newSolicitud')->middleware('auth');
Route::post('crearSolicitud', 'SolicitudesController@create')->middleware('auth');
Route::get('solicitudes', 'SolicitudesController@solicitudes')->middleware('auth');
Route::get('solicitud/{id}/cambiarEstado', 'SolicitudesController@cambiarEstado')->middleware('auth');
Route::post('solicitud/{id}/cambiar', 'SolicitudesController@cambiar')->middleware('auth');

Route::get('solicitud/{id}/viajes', 'ViajesController@viajes')->middleware('auth');
Route::get('solicitud/{id}/crearViaje', 'ViajesController@newViaje')->middleware('auth');
Route::post('solicitud/{id}/crearViaje', 'ViajesController@create')->middleware('auth');
Route::get('solicitud/{id}/Viaje/{idViaje}', 'ViajesController@editar')->middleware('auth');
Route::post('viaje/{id}/cambiarEstado', 'ViajesController@cambiarEstado')->middleware('auth');


Route::get('crearHistorial/{id_vehiculo}', 'HistorialController@newHistorial')->middleware('auth');
Route::post('crearHistorial/{id_vehiculo}', 'HistorialController@create')->middleware('auth');
Route::get('historial/{id_vehiculo}', 'HistorialController@historial')->middleware('auth');
Route::get('agregarHistorial/{id_vehiculo}', 'HistorialController@agregar')->middleware('auth');




