@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Viajes de solicitud {{ $solicitud->id }}</div>
                <div class="panel-body">
                    <a href="crearViaje" class="btn btn-xs btn-primary pull-right">Crear viaje</a>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Solicitud</th>
                            <th>Cantidad</th>
                            <th>Fecha entrega</th>
                            <th>Fecha salida</th>
                            <th>Manifiesto</th>
                            <th>Vehiculo</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Medida</th>
                            <th>Destinatario</th>
                            <th>Estado</th>
                            <th>Creación</th>
                            
                        </thead>
                        <tbody>
                            @foreach ($viajes as $viaje)
                                <tr>
                                    <td>{{ $viaje->id }}</td>
                                    <td>{{ $solicitud->id }}</td>
                                    <td>{{ $viaje->cantidad }}</td>
                                    <td>{{ $viaje->fecha_salida }}</td>
                                    <td>{{ $viaje->fecha_entrega }}</td>
                                    <td>{{ $viaje->manifiesto }}</td>
                                    <td>{{ $viaje->placa }}</td>
                                    <td>{{ $viaje->origen }} - {{ $viaje->dir_origen }}</td>
                                    <td>{{ $viaje->destino }} - {{ $viaje->dir_destino }}</td>
                                    <td>{{ $viaje->medida }}</td>
                                    <td>{{ $viaje->destinatario }}</td>
                                    <td>{{ $viaje->estado }}</td>
                                    <td>{{ $viaje->created_at }}</td>
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