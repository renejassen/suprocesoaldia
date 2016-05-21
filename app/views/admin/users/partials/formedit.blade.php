{{-- <div class="form-group {{ $errors->first('username', 'has-error') }}">
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', '', array('class' => 'form-control')) }}
    {{ $errors->first('username', '<p class="help-block">:message</p>') }}
</div> --}}

<div class="form-group {{ $errors->first('first_name', 'has-error') }}">
    {{ Form::label('first_name', 'Nombres') }}
    {{ Form::text('first_name', $user->first_name, array('class' => 'form-control')) }}
    {{ $errors->first('first_name', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('last_name', 'has-error') }}">
    {{ Form::label('last_name', 'Apellidos') }}
    {{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}
    {{ $errors->first('last_name', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('role_id', 'has-error') }}">
    {{ Form::label('role_id', 'Rol') }}
	  {{ Form::select('role_id', $roles, $rol_seleccionado, array('class' => 'form-control')) }}
    {{ $errors->first('role_id', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('email', 'has-error') }}">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', $user->email, array('class' => 'form-control')) }}
    {{ $errors->first('email', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('password', 'has-error') }}">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
    {{ $errors->first('password', '<p class="help-block">:message</p>') }}
</div>
