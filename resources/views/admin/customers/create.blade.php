@extends('admin.layout')
@section('title', 'Agregar nuevo cliente')
@section('subtitle', 'Agregue un nuevo cliente')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar nuevo cliente</h3>
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
            {{ Form::open(array('url' => 'customers', 'role' => 'form')) }}
              @include('admin.customers.form')
            {{ Form::close() }}
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
@stop
