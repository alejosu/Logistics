@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Vehículo</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('crearVehiculo') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('placa') ? ' has-error' : '' }}">
                            <label for="placa" class="col-md-4 control-label">PLaca</label>

                            <div class="col-md-6">
                                <input id="placa" type="text" class="form-control" name="placa" value="{{ old('placa') }}" required autofocus>

                                @if ($errors->has('placa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('placa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('conductor') ? ' has-error' : '' }}">
                            <label for="conductor" class="col-md-4 control-label">Conductor</label>

                            <div class="col-md-6">
                                <input id="conductor" type="text" class="form-control" name="conductor" value="{{ old('conductor') }}" required autofocus>

                                @if ($errors->has('conductor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('conductor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_conductor') ? ' has-error' : '' }}">
                            <label for="id_conductor" class="col-md-4 control-label">ID Conductor</label>

                            <div class="col-md-6">
                                <input id="id_conductor" type="text" class="form-control" name="id_conductor" value="{{ old('id_conductor') }}" required autofocus>

                                @if ($errors->has('id_conductor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_conductor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('capacidad') ? ' has-error' : '' }}">
                            <label for="capacidad" class="col-md-4 control-label">Capacidad</label>

                            <div class="col-md-6">
                                <input id="capacidad" type="text" class="form-control" name="capacidad" value="{{ old('capacidad') }}" required autofocus>

                                @if ($errors->has('capacidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('capacidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('activo') ? ' has-error' : '' }}">
                            <label for="activo" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select class="form-control" id="activo" name="activo">
                                    <option>Activo</option>
                                    <option>Inactivo</option>
                                </select>

                                @if ($errors->has('activo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('activo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                  

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ URL::previous() }}" class="btn btn-default btn-xs">Cancelar</a>
                                <button type="submit" class="btn btn-primary btn-xs">
                                    Crear
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
