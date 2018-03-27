@extends('admin.layout')
@section('title', 'Detalle Área de Monitoreo '.$place->name)
@section('subtitle', 'Lista de áreas de Monitoreo de monitoreo')
@section('content')
      <div class="row">
          <div class="col-md-12">
            <h1>Detalle Área {{ $place->name }}</h1>
            <p>{{ $place->description }}</p>
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Sensores</h3>
                <div class="form-inline pull-right">
                  <a href="{{ url('sensors/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Sensor</a>
                </div>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Descripción</th>
                        <th>ID Físico</th>
                        <th width="280px">Operation</th>
                    </tr>
                  @if(sizeOf($place->sensors) > 0)
                  @foreach ($place->sensors as $sensor)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $sensor->description}}</td>
                        <td>{{ $sensor->fisical_sensor_id}}</td>
                        <td>
                            <!--<a class="btn btn-info" href="{{ route('sensors.show',$sensor->id) }}">Ver</a>-->
                            <a class="btn btn-primary" href="{{ route('sensors.edit',$sensor->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['sensors.destroy', $sensor->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                  @endforeach
                  @else
                  <tr><td class="text-center" colspan="5">No hay sensores ingresados</td></tr>
                  @endif
                </table>
                </div>
                <!-- /.box-body -->

                <!--<div class="box-footer">
                </div>-->
            </div>
            <!-- /.box -->
          </div>
      </div>
@stop
