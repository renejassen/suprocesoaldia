<div class="form-group {{ $errors->first('fecha_publicacion', 'has-error') }}">
  {{ Form::label('fecha_publicacion', 'Fecha de publicaciones') }}
  {{ Form::text('fecha_publicacion', '', array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '36')) }}
  {{ $errors->first('fecha_publicacion', '<p class="help-block">:message</p>') }}
</div>