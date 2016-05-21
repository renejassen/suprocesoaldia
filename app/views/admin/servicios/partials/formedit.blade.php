<div class="form-group {{ $errors->first('servicio', 'has-error') }}">
    {{ Form::label('servicio', 'Servicio') }}
    {{ Form::text('servicio', $servicio->servicio, array('class' => 'form-control')) }}
    {{ $errors->first('servicio', '<p class="help-block">:message</p>') }}
</div>
