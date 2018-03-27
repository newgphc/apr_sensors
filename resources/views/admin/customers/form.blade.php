<div class="box-body">
    <legend>Datos de Cliente</legend>
    <div class="form-group">
      {{ Form::label('rut', 'Rut') }}
      {{ Form::text('rut', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('name', 'Nombre') }}
      {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('mail', 'Correo electrónico') }}
      {{ Form::text('mail', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('address', 'Dirección') }}
      {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('contact_name', 'Nombre Contacto administrativo') }}
      {{ Form::text('contact_name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('phone_1', 'Celular') }}
      {{ Form::text('phone_1', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
      {{ Form::label('phone_2', 'Telefono Fijo') }}
      {{ Form::text('phone_2', null, array('class' => 'form-control')) }}
    </div>
    @if(isset($isCreate) && $isCreate)
    <legend>Datos de Usuario</legend>
    <div class="form-group">
      {{ Form::label('password', 'Contraseña') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    @endif
</div>
<!-- /.box-body -->

<div class="box-footer">
  {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
</div>
