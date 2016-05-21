<div class="form-group {{ $errors->first('cedula', 'has-error') }}">
    {{ Form::label('cedula', 'Cédula') }}
    {{ Form::text('cedula', $proceso->cedula, array('class' => 'form-control')) }}
    {{ $errors->first('cedula', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('obligacion', 'has-error') }}">
    {{ Form::label('obligacion', 'Obligación') }}
    {{ Form::text('obligacion', $proceso->obligacion, array('class' => 'form-control')) }}
    {{ $errors->first('obligacion', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('apoderado', 'has-error') }}">
    {{ Form::label('apoderado', 'Apoderado') }}
    {{ Form::text('apoderado', $proceso->apoderado, array('class' => 'form-control')) }}
    {{ $errors->first('apoderado', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('num_interno', 'has-error') }}">
    {{ Form::label('num_interno', '# Interno') }}
    {{ Form::text('num_interno', $proceso->num_interno, array('class' => 'form-control')) }}
    {{ $errors->first('num_interno', '<p class="help-block">:message</p>') }}
</div>