@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Mercancías</div>
                <div class="panel-body">
                    <a href="crearMercancia" class="btn btn-primary btn-xs pull-right">Crear</a>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Descripción</th>
                        </thead>
                        <tbody>
                            @foreach ($mercancias as $mercancia)
                                <tr>
                                    <td>{{ $mercancia->id }}</td>
                                    <td>{{ $mercancia->descripcion }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right" href="editarMercancia/{{ $mercancia->id }}" data-toggle="tooltip" data-placement="left"  title="Editar">E</a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right" href="borrarMercancia/{{ $mercancia->id }}" data-toggle="tooltip" data-placement="left"  title="Borrar">B</a></td>
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