@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('solicitud/'.$solicitud->id.'/editar') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('cliente') ? ' has-error' : '' }}">
                            <label for="placa" class="col-md-4 control-label">Cliente</label>

                            <div class="col-md-6">
                                <select class="form-control" id="cliente" name="cliente">
                                    @foreach($clientes as $cliente)
                                        <option>{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('cliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mercancia') ? ' has-error' : '' }}">
                            <label for="mercancia" class="col-md-4 control-label">Mercancia</label>

                            <div class="col-md-6">
                                <select class="form-control" id="mercancia" name="mercancia">
                                    @foreach($mercancias as $mercancia)
                                        <option>{{$mercancia->descripcion}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('mercancia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mercancia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control" name="cantidad" value="{{ $solicitud->cantidad }}" required autofocus>

                                @if ($errors->has('cantidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                            <label for="estado" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select class="form-control" id="estado" name="estado">
                                    @foreach($estados as $estado)
                                        <option>{{$estado->descripcion}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ URL::previous() }}" class="btn btn-default btn-xs">Cancelar</a>
                                <button type="submit" class="btn btn-primary btn-xs">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
