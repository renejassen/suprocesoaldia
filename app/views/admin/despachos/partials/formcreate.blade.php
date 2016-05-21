<div class="form-group {{ $errors->first('nombre', 'has-error') }}">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', '', array('class' => 'form-control')) }}
    {{ $errors->first('nombre', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('rama_id', 'has-error') }}">
    {{ Form::label('rama_id', 'Rama') }}
    {{ Form::select('rama_id', $ramas = array('0' => 'Seleccionar') + Rama::lists('nombre', 'id') , null, array('id' => 'rama_id', 'class' => 'form-control m-bot15', 'style'  => 'width:100%')) }}
    {{ $errors->first('rama_id', '<p class="help-block">:message</p>') }}
</div>
