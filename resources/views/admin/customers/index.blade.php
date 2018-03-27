@extends('admin.layout')
@section('title', 'Clientes')
@section('subtitle', 'Lista de clientes')
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
              <h3 class="box-title">Lista de Clientes</h3>
              <div class="form-inline pull-right">
                <a href="{{ url('customers/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Agregar cliente</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                      <th>No</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Dirección</th>
                      <th>Celular</th>
                      <th width="280px">Operation</th>
                  </tr>
                @if(sizeOf($customers) > 0)
                @foreach ($customers as $customer)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $customer->name}}</td>
                      <td>{{ $customer->mail}}</td>
                      <td>{{ $customer->address}}</td>
                      <td>{{ $customer->phone_1}}</td>
                      <td>
                          <!--<a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Ver</a>-->
                          <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}"><i class="fa fa-edit"></i> Editar</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['customers.destroy', $customer->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>
                  </tr>
                @endforeach
                @else
                <tr><td class="text-center" colspan="6">No hay clientes ingresados</td></tr>
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
