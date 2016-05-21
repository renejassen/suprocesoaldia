<div class="form-group {{ $errors->first('tipo', 'has-error') }}">
    {{ Form::label('name', 'Rol') }}
    {{ Form::text('name', '', array('class' => 'form-control')) }}
    {{ $errors->first('name', '<p class="help-block">:message</p>') }}
</div>
