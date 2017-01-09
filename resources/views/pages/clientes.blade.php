@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Clientes</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                            <th><a href="crearCliente" class="btn btn-xs btn-primary pull-right glyphicon glyphicon-plus"></a></th>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right glyphicon glyphicon-pencil" href="editarCliente/{{ $cliente->id }}"></a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right glyphicon glyphicon-trash" data-target="#myModal" data-toggle="modal"></a></td>
                                </tr>
                                <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Confirmar Borrado</h4>
                                      </div>
                                      <div class="modal-body">
                                        <p>¿Realmente desea borrar este registro?</p>
                                        <p>Recuerde que si existen solicitudes asociadas a este cliente no se podrá eliminar.</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-danger pull-right" href="borrarCliente/{{ $cliente->id }}" >Borrar</a>
                                      </div>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection