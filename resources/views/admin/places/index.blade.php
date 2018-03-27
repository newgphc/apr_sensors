@extends('admin.layout')
@section('title', 'Áreas de Monitoreo')
@section('subtitle', 'Lista de áreas de Monitoreo de monitoreo')
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
              <h3 class="box-title">Lista de Áreas de Monitoreo</h3>
              <div class="form-inline pull-right">
                <a href="{{ url('places/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Lugar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                      <th>No</th>
                      <th>Nombre Lugar</th>
                      <th>Descripción</th>
                      <th width="280px">Operation</th>
                  </tr>
                @if(sizeOf($places) > 0)
                @foreach ($places as $place)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $place->name}}</td>
                      <td>{{ $place->description}}</td>
                      <td>
                          <!--<a class="btn btn-info" href="{{ route('places.show',$place->id) }}">Ver</a>-->
                          <a class="btn btn-primary" href="{{ route('places.edit',$place->id) }}"><i class="fa fa-edit"></i> Editar</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['places.destroy', $place->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                          <a class="btn btn-primary" href="{{ route('places.show',$place->id) }}"><i class="fa fa-search"></i> Ver</a>
                      </td>
                  </tr>
                @endforeach
                @else
                <tr><td class="text-center" colspan="4">No hay áreas de Monitoreo ingresados</td></tr>
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
