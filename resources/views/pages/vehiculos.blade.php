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
                                    <td><a class="btn btn-xs btn-success" href="editarVehiculo/{{ $vehiculo->id }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td><a class="btn btn-xs btn-danger" href="borrarVehiculo/{{ $vehiculo->id }}"><span class="glyphicon glyphicon-off"></span></a></td>
                                    <td><a class="btn btn-xs btn-primary" href="historial/{{ $vehiculo->id }}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
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