<div class="box-body">
  <div class="form-group">
    {{ Form::label('name', 'Nombre Lugar') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('description', 'Descripción Lugar') }}
    {{ Form::text('description', null, array('class' => 'form-control')) }}
  </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  {{ Form::submit('Gusrdar', array('class' => 'btn btn-primary')) }}
</div>
