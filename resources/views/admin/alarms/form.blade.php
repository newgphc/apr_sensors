<div class="box-body">
  <div class="form-group">
    {{ Form::label('name', 'Nombre alarma') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('sensor_id', 'Sensor') }}
    {{ Form::select('sensor_id', $sensors, null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('alarm_type', 'Comparativo') }}
    {{ Form::select('alarm_type', array('0' => 'Mayor &gt;',
		'1' => 'Menor &lt;',
		'2' => 'Mayor o igual &gt;=',
		'3' => 'Menor o Igual &lt;=',
		'4' => 'Igual =',
		'5' => 'Distinto &lt;&gt;'), null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('value', 'Valor a medir') }}
    {{ Form::text('value', null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label(null, 'Asignar Alarma a los siguientes usuarios') }}
    <div class="checkbox">
      <label>
      {{ Form::checkbox('select_all', null, false) }}
      <strong>Seleccionar Todos</strong></label>
    </div>
    @foreach($users as $user)
    <div class="checkbox">
      <label>
      {{ Form::checkbox('user['.$user->id.']', null, $user->isActive ) }}
      {!! (Auth::user()->id == $user->id ? '<strong>'.$user->name.' (YO)</strong>' : $user->name) !!}</label>
    </div>
    @endforeach
  </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  {{ Form::submit('Gusrdar', array('class' => 'btn btn-primary')) }}
</div>
