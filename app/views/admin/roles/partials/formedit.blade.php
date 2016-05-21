<div class="form-group {{ $errors->first('name', 'has-error') }}">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', $role->name, array('class' => 'form-control')) }}
    {{ $errors->first('name', '<p class="help-block">:message</p>') }}
</div>

{{-- <div class="form-group {{ $errors->first('permissions', 'has-error') }}">
    {{ Form::label('permission_lista', 'Permisos') }}
    {{ Form::select('permission_lista[]', $permissions , null, array('id' => 'e9', 'class' => 'populate', 'style'  => 'width:100%', 'multiple')) }}
</div> --}}