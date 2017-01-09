@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('editarUsuario/' . $usuario->id ) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                            <label for="admin" class="col-md-4 control-label">Admin</label>
                            <div class="col-md-6">
                                <select class="form-control" id="admin" name="admin">
                                @if($usuario->admin == "Si")
                                    <option selected>Si</option>
                                    <option>No</option>
                                @else
                                    <option>Si</option>
                                    <option selected>No</option>   
                                @endif     
                                </select>

                                @if ($errors->has('admin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('activo') ? ' has-error' : '' }}">
                            <label for="activo" class="col-md-4 control-label">Activo</label>
                            <div class="col-md-6">
                                <select class="form-control" id="activo" name="activo">  
                                    @if($usuario->activo == "Si")
                                        <option selected>Si</option>
                                        <option>No</option>
                                    @else
                                        <option>Si</option>
                                        <option selected>No</option>   
                                    @endif    
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
                                <a class="btn btn-xs btn-default" href=" {{ URL::previous() }} ">Cancelar</a>
                                <button type="submit" class="btn btn-xs btn-primary">
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
