<div class="form-group {{ $errors->first('tipo', 'has-error') }}">
    {{ Form::label('tipo', 'Tipo') }}
    {{ Form::text('tipo', '', array('class' => 'form-control')) }}
    {{ $errors->first('tipo', '<p class="help-block">:message</p>') }}
</div>