@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cambiar Estado</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('solicitud/'.$solicitud->id.'/cambiar') }}">
                        {{ csrf_field() }}
                        
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
                                <button type="submit" class="btn btn-primary">
                                    Cambiar
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