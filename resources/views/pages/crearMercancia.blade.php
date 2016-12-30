@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Mercancía</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('crearMercancia') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
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

                        <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                            <label for="observaciones" class="col-md-4 control-label">Observaciónes</label>

                            <div class="col-md-6">
                                <textarea id="observaciones" type="text" class="form-control" name="observaciones" value="{{ old('observaciones') }}" required autofocus></textarea>

                                @if ($errors->has('observaciones'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observaciones') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
