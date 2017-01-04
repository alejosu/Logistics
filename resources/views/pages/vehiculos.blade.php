@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Vehículos</div>
                <div class="panel-body">
                    <a href="crearVehiculo" class="btn btn-xs btn-primary pull-right">Crear</a>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Placa</th>
                            <th>Activo</th>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->id }}</td>
                                    <td>{{ $vehiculo->placa }}</td>
                                    <td>{{ $vehiculo->activo }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right" href="editarVehiculo/{{ $vehiculo->id }}">Edit</a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right" href="borrarVehiculo/{{ $vehiculo->id }}">Del</a></td>
                                    <td><a class="btn btn-xs btn-primary pull-right" href="historial/{{ $vehiculo->id }}">Hist</a></td>
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