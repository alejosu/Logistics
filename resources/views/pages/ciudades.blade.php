@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Ciudades</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th><a href="crearCiudad" class="btn btn-primary pull-right">Crear Ciudad</a></th>
                        </thead>
                        <tbody>
                            @foreach ($ciudades as $ciudad)
                                <tr>
                                    <td>{{ $ciudad->id }}</td>
                                    <td>{{ $ciudad->nombre }}</td>
                                    <td><a class="btn btn-xs btn-danger pull-right" href="borrarCiudad/{{ $ciudad->id }}">Borrar</a></td>
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