@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Vehículos</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Placa</th>
                            <th>Conductor</th>
                            <th>Cédula</th>
                            <th>Capacidad</th>
                            <th>Activo</th>
                            <th>Activar</th>
                            <th>Inactivar</th>
                            <th>Editar</th>
                            <th><a href="crearVehiculo" class="btn btn-sm btn-primary pull-right">Crear</a></th>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->id }}</td>
                                    <td>{{ $vehiculo->placa }}</td>
                                    <td>{{ $vehiculo->conductor }}</td>
                                    <td>{{ $vehiculo->id_conductor }}</td>
                                    <td>{{ $vehiculo->capacidad }}</td>
                                    <td>{{ $vehiculo->activo }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right" href="activarVehiculo/{{ $vehiculo->id }}">Activar</a></td>
                                    <td><a class="btn btn-xs btn-primary pull-right" href="inactivarVehiculo/{{ $vehiculo->id }}">Inactivar</a></td>
                                    <td><a class="btn btn-xs btn-primary pull-right" href="editarVehiculo/{{ $vehiculo->id }}">Editar</a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right" href="borrarVehiculo/{{ $vehiculo->id }}">Borrar</a></td>
                                    <td><a class="btn btn-xs btn-primary pull-right" href="historial/{{ $vehiculo->id }}">Historial</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection