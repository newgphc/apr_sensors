@extends('admin.layout')
@section('title', 'Resumen de inicio')
@section('subtitle', 'Indicadores de actividad')
@section('content')
<h1>Áreas de Monitoreo</h1>
<div class="row">
  @foreach($places as $place)
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box {{ $boxes_backgrounds[rand (0, 3)] }}">
            <div class="inner">
              <span class="info-box-text"><strong>{{ $place->name }}</strong></span>
              <span class="info-box-text">Sensores</span>
              <h3>{{ sizeOf($place->sensors) }}</h3>

              <p>{{ $place->description }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Detaelle <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
      </div>
@stop
