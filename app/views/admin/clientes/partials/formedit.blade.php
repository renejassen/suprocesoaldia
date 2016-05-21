<div class="form-group {{ $errors->first('empresa', 'has-error') }}">
    {{ Form::label('empresa', 'Empresa') }}
    {{ Form::text('empresa', $cliente->empresa, array('class' => 'form-control')) }}
    {{ $errors->first('empresa', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('nit', 'has-error') }}">
    {{ Form::label('nit', 'Nit') }}
    {{ Form::text('nit', $cliente->nit, array('class' => 'form-control' , 'data-mask' => '999.999.999-9')) }}
    {{ $errors->first('nit', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('cargo', 'has-error') }}">
    {{ Form::label('cargo', 'Cargo') }}
    {{ Form::text('cargo', $cliente->cargo, array('class' => 'form-control')) }}
    {{ $errors->first('cargo', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('nombres', 'has-error') }}">
    {{ Form::label('nombres', 'Nombres') }}
    {{ Form::text('nombres', $cliente->nombres, array('class' => 'form-control')) }}
    {{ $errors->first('nombres', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('apellidos', 'has-error') }}">
    {{ Form::label('apellidos', 'Apellidos') }}
    {{ Form::text('apellidos', $cliente->apellidos, array('class' => 'form-control')) }}
    {{ $errors->first('apellidos', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('telefono', 'has-error') }}">
    {{ Form::label('telefono', 'Teléfono') }}
    {{ Form::text('telefono', $cliente->telefono, array('class' => 'form-control', 'data-mask' => '(999) 999 9999', 'placeholder' => '(031) 555 5555')) }}
    {{ $errors->first('telefono', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('celular', 'has-error') }}">
    {{ Form::label('celular', 'Celular') }}
    {{ Form::text('celular', $cliente->celular, array('class' => 'form-control', 'data-mask' => '(999) 999 9999', 'placeholder' => '(310) 555 5555')) }}
    {{ $errors->first('celular', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('direccion', 'has-error') }}">
    {{ Form::label('direccion', 'Dirección') }}
    {{ Form::text('direccion', $cliente->direccion, array('class' => 'form-control')) }}
    {{ $errors->first('direccion', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('servicios', 'has-error') }}">
    {{ Form::label('servicio_lista', 'Servicios') }}
    {{ Form::select('servicio_lista[]', $servicios , null, array('id' => 'e9', 'class' => 'populate', 'style'  => 'width:100%', 'multiple')) }}
    <!-- <select multiple name="e9" id="e9" style="width:100%" class="populate">
        <optgroup label="Servicios virtuales">
            <option value="1">Vigilancia diaria</option>
            <option value="2">Cartelera virtual</option>
        </optgroup>
    </select> -->
</div>
<div class="form-group {{ $errors->first('email', 'has-error') }}">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', $user->email, array('class' => 'form-control')) }}
    {{ $errors->first('email', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group {{ $errors->first('password', 'has-error') }}">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
    {{ $errors->first('password', '<p class="help-block">:message</p>') }}
</div>