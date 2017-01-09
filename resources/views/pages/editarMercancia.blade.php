@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Mercancía</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('editarMercancia/' . $mercancia->id) }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ $mercancia->descripcion }}" required autofocus>

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
                                        @if($medida->descripcion == $mercancia->medida)
                                            <option selected>{{$medida->descripcion}}</option>
                                        @else
                                            <option>{{$medida->descripcion}}</option>            
                                        @endif                                    
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
                            <label for="observaciones" class="col-md-4 control-label">Observaciones</label>

                            <div class="col-md-6">
                                <input id="observaciones" type="text" class="form-control" name="observaciones" value="{{ $mercancia->observaciones }}" required autofocus>

                                @if ($errors->has('observaciones'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observaciones') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                  

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ URL::previous() }}" class="btn btn-default btn-xs">Cancelar</a>
                                <button type="submit" class="btn btn-primary btn-xs">
                                    editar
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
