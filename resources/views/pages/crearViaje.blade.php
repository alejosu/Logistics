@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Viaje</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('solicitud/' . $solicitud->id . '/crearViaje') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required autofocus>

                                @if ($errors->has('cantidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_salida') ? ' has-error' : '' }}">
                            <label for="fecha_salida" class="col-md-4 control-label">Salida</label>

                            <div class="col-md-6">
                                <input id="fecha_salida" type="date" class="form-control" name="fecha_salida" value="{{ old('fecha_salida') }}" required autofocus>

                                @if ($errors->has('fecha_salida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_salida') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_entrega') ? ' has-error' : '' }}">
                            <label for="fecha_entrega" class="col-md-4 control-label">Entrega</label>

                            <div class="col-md-6">
                                <input id="fecha_entrega" type="date" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega') }}" required autofocus>

                                @if ($errors->has('fecha_entrega'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_entrega') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manifiesto') ? ' has-error' : '' }}">
                            <label for="manifiesto" class="col-md-4 control-label">Manifiesto</label>

                            <div class="col-md-6">
                                <input id="manifiesto" type="file" accept=".png, .jpg, .jpeg" class="form-control" name="manifiesto" value="{{ old('manifiesto') }}" required autofocus>

                                @if ($errors->has('manifiesto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manifiesto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('placa') ? ' has-error' : '' }}">
                            <label for="placa" class="col-md-4 control-label">Placa</label>

                            <div class="col-md-6">
                                <select class="form-control" id="placa" name="placa">
                                    @foreach($vehiculos as $vehiculo)
                                        <option>{{$vehiculo->placa}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('placa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('placa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('origen') ? ' has-error' : '' }}">
                            <label for="origen" class="col-md-4 control-label">Origen</label>

                            <div class="col-md-6">
                                <select class="form-control" id="origen" name="origen">
                                    @foreach($ciudades as $ciudad)
                                        <option>{{$ciudad->nombre}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('origen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('origen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dir_origen') ? ' has-error' : '' }}">
                            <label for="dir_origen" class="col-md-4 control-label">Dir</label>

                            <div class="col-md-6">
                                <input id="dir_origen" type="text"  class="form-control" name="dir_origen" value="{{ old('dir_origen') }}" required autofocus>

                                @if ($errors->has('dir_origen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dir_origen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('destino') ? ' has-error' : '' }}">
                            <label for="destino" class="col-md-4 control-label">Destino</label>

                            <div class="col-md-6">
                                <select class="form-control" id="destino" name="destino">
                                    @foreach($ciudades as $ciudad)
                                        <option>{{$ciudad->nombre}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('destino'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('destino') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dir_destino') ? ' has-error' : '' }}">
                            <label for="dir_destino" class="col-md-4 control-label">Dir</label>

                            <div class="col-md-6">
                                <input id="dir_destino" type="text"  class="form-control" name="dir_destino" value="{{ old('dir_destino') }}" required autofocus>

                                @if ($errors->has('dir_destino'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dir_destino') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('medida') ? ' has-error' : '' }}">
                            <label for="medida" class="col-md-4 control-label">Medida</label>

                            <div class="col-md-6">
                                <select class="form-control" id="medida" name="medida">
                                    @foreach($medidas as $medida)
                                        <option>{{$medida->descripcion}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('medida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medida') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('destinatario') ? ' has-error' : '' }}">
                            <label for="destinatario" class="col-md-4 control-label">Destinatario</label>

                            <div class="col-md-6">
                                <select class="form-control" id="destinatario" name="destinatario">
                                    @foreach($destinatario as $dest)
                                        <option>{{$dest->nombre}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('destinatario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('destinatario') }}</strong>
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
