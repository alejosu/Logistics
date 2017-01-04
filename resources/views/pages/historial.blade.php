@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Historial del Vehículo {{ $vehiculo->placa }}</div>
                <div class="panel-body">
                    <a href="crearHistorial/{{ $vehiculo->id }}" class="btn btn-xs btn-primary pull-right">Nueva</a>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Anotacion</th>
                            <th>Fecha</th>
                        </thead>
                        <tbody>
                            @foreach ($historial as $anotacion)
                                <tr>
                                    <td>{{ $anotacion->id }}</td>
                                    <td>{{ $anotacion->anotacion }}</td>
                                    <td>{{ $anotacion->created_at }}</td>
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