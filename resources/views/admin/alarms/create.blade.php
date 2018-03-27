@extends('admin.layout')
@section('title', 'Agregar nueva Alarma')
@section('subtitle', 'Agregue una nueva alarma')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar nueva Alarma</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Hay errores en el formulario.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(array('url' => 'alarms', 'role' => 'form')) }}
              @include('admin.alarms.form')
            {{ Form::close() }}
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
@stop
