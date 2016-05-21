<div class="form-group {{ $errors->first('actor_tipo_id', 'has-error') }}">
  	{{ Form::label('actor_tipo_id', 'Tipo de actor') }}
	{{ Form::select('actor_tipo_id', ActorTipo::lists('tipo', 'id'), null, array('class' => 'form-control')) }}
    {{ $errors->first('actor_tipo', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('nombre', 'has-error') }}">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', '', array('class' => 'form-control')) }}
    {{ $errors->first('nombre', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('documento_tipo_id', 'has-error') }}">
  	{{ Form::label('documento_tipo_id', 'Tipo de documento') }}
	{{ Form::select('documento_tipo_id', DocumentoTipo::lists('tipo', 'id'), null, array('class' => 'form-control')) }}
    {{ $errors->first('documento_tipo', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('documento', 'has-error') }}">
    {{ Form::label('documento', '# Documento') }}
    {{ Form::text('documento', '', array('class' => 'form-control')) }}
    {{ $errors->first('documento', '<p class="help-block">:message</p>') }}
</div>
