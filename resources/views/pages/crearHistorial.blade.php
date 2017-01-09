@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Historial</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('historial/'. $vehiculo->id . '/crearHistorial') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('anotacion') ? ' has-error' : '' }}">
                            <label for="anotacion" class="col-md-4 control-label">Anotacion</label>

                            <div class="col-md-6">
                                <input id="anotacion" type="text" class="form-control" name="anotacion" value="{{ old('anotacion') }}" required autofocus>

                                @if ($errors->has('anotacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anotacion') }}</strong>
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
