<div class="form-group {{ $errors->first('nombre', 'has-error') }}">
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', '', array('class' => 'form-control')) }}
    {{ $errors->first('nombre', '<p class="help-block">:message</p>') }}
</div>
