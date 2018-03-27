@extends('admin.layout')
@section('title', 'Alarmas')
@section('subtitle', 'Lista de alarmas de monitoreo')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          @if ($message = Session::get('success'))
               <div class="alert alert-success">
                   <p>{{ $message }}</p>
               </div>
           @endif
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Alarmas</h3>
              <div class="form-inline pull-right">
                <a href="{{ url('alarms/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Alarma</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                      <th>No</th>
                      <th>Nombre Alarma</th>
                      <th>Area Monitoreo \ Sensor</th>
                      <th width="280px">Operation</th>
                  </tr>
                @if(sizeOf($alarms) > 0)
                @foreach ($alarms as $alarm)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $alarm->name}}</td>
                      <td>{{ $alarm->sensor->place->name.' \ '.$alarm->sensor->description }}</td>
                      <td>
                          <!--<a class="btn btn-info" href="{{ route('alarms.show',$alarm->id) }}">Ver</a>-->
                          <a class="btn btn-primary" href="{{ route('alarms.edit',$alarm->id) }}"><i class="fa fa-edit"></i> Editar</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['alarms.destroy', $alarm->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                  </tr>
                @endforeach
                @else
                <tr><td class="text-center" colspan="4">No hay alarmas ingresados</td></tr>
                @endif
              </table>
              </div>
              <!-- /.box-body -->

              <!--<div class="box-footer">
              </div>-->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
@stop
