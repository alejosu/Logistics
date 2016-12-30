@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Mercancías</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th>Medida</th>
                            <th>Observaciones</th>
                            <th><a href="crearMercancia" class="btn btn-primary pull-right">Crear Mercancía</a></th>
                        </thead>
                        <tbody>
                            @foreach ($mercancias as $mercancia)
                                <tr>
                                    <td>{{ $mercancia->id }}</td>
                                    <td>{{ $mercancia->descripcion }}</td>
                                    <td>{{ $mercancia->medida }}</td>
                                    <td>{{ $mercancia->observaciones }}</td>
                                    <td><a class="btn btn-xs btn-danger pull-right" href="borrarMercancia/{{ $mercancia->id }}">Borrar</a></td>
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