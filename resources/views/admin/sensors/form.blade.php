<div class="box-body">
  <div class="form-group">
    {{ Form::label('place_id', 'Área de Monitoreo') }}
    {{ Form::select('place_id', $places, null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('fisical_sensor_id', 'ID Físico del sensor') }}
    {{ Form::text('fisical_sensor_id', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('description', 'Descripcion') }}
    {{ Form::text('description', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('long_description', 'Descripcion larga') }}
    {{ Form::textarea('long_description', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('refresh_interval', 'Intervalo de Refresco (en milisegundos)') }}
    {{ Form::text('refresh_interval', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('measurement_type_id', 'Tipo de medida') }}
    {{ Form::select('measurement_type_id', $measurements, null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('h', 'H') }}
    {{ Form::text('h', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('r', 'R') }}
    {{ Form::text('r', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('distance', 'Distancia') }}
    {{ Form::text('distance', null, array('class' => 'form-control')) }}
  </div>
  <div class="checkbox">
    <label>
    {{ Form::checkbox('active', null, false) }}
    Sensor activo</label>
  </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  {{ Form::submit('Gusrdar', array('class' => 'btn btn-primary')) }}
</div>
