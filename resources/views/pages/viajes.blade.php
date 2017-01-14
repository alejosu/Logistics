@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Viajes de solicitud {{ $solicitud->id }}</div>
                <div class="panel-heading">
                  <a href="crearViaje" class="btn btn-xs btn-primary pull-right glyphicon glyphicon-plus"></a>
                  <a href="/solicitudes" class="btn btn-xs btn-default glyphicon glyphicon-chevron-left"></a>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        
                        @foreach ($viajes as $viaje)  
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading {{ $viaje->id }}">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $viaje->id }}" aria-expanded="true" aria-controls="{{ $viaje->id }}">
                                  Viaje: {{ $viaje->id }} - {{ $viaje->origen}} - {{ $viaje->dir_origen }} - {{ $viaje->destino}} - {{ $viaje->dir_destino }} 
                                </a>
                              </h4>
                            </div>
                            <div id="{{ $viaje->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{ $viaje->id }}">
                              <div class="panel-body">
                                <strong>Estado: </strong> {{ $viaje->estado }} <br>
                                <strong>Cantidad: </strong>{{ $viaje->cantidad }} {{ $viaje->medida }} <br>
                                <strong>Placa: </strong> {{ $viaje->placa }} <br>
                                <strong>Fecha Salida: </strong> {{ $viaje->fecha_salida }} <br>
                                <strong>Fecha Entrega: </strong> {{ $viaje->fecha_entrega}} <br>
                                <strong>Destinatario: </strong> {{ $viaje->destinatario }}
                                <hr>
                                <ul class="list-unstyled list-inline pull-right">
                                  <li><a href="/solicitud/{{$viaje->id_solicitud}}/viaje/{{$viaje->id}}" class="btn btn-xs btn-success glyphicon glyphicon-edit pull-right"></a></li>
                                  <li><a href="" class="btn btn-xs btn-primary glyphicon glyphicon-list pull-right"></a></li>
                                  <li><a href="" class="btn btn-xs btn-primary glyphicon glyphicon-globe pull-right"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection