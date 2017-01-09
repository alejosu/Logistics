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
                            <th>Mercancía</th>
                            <th></th>
                            <th><a href="crearMercancia" class="btn btn-primary btn-xs pull-right glyphicon glyphicon-plus"></a></th>
                        </thead>
                        <tbody>
                            @foreach ($mercancias as $mercancia)
                                <tr>
                                    <td>{{ $mercancia->descripcion }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right glyphicon glyphicon-pencil" href="editarMercancia/{{ $mercancia->id }}" data-toggle="tooltip" data-placement="left"  title="Editar"></a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right glyphicon glyphicon-trash" data-target="#myModal" data-toggle="modal" data-placement="left"  title="Borrar"></a></td>
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
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-danger pull-right" href="borrarMercancia/{{ $mercancia->id }}" >Borrar</a>
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