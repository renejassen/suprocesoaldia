<div class="form-group {{ $errors->first('radicado', 'has-error') }}">
    {{ Form::label('radicado', 'Radicado') }}
    {{ Form::text('radicado', $instancia->radicado, array('class' => 'form-control')) }}
    {{ $errors->first('radicado', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('departamento_id', 'has-error') }}">
  	{{ Form::label('departamento_id', 'Departamento') }}
  	<select id="departamento_id" name="departamento_id" class="populate" style="width:100%">
    </select>
  	{{ $errors->first('departamento_id', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('Municipio', 'has-error') }}">
  	{{ Form::label('municipio_id', 'Municipio') }}
  	 <select id="municipio_id" name="municipio_id" class="populate" style="width:100%">
      <option value="">Es necesario seleccionar un departamento</option>
    </select>
    {{ $errors->first('municipio', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('despacho', 'has-error') }}">
  	{{ Form::label('despacho_id', 'Despacho') }}
  	 <select id="despacho_id" name="despacho_id" class="populate" style="width:100%">
      <option value="">Es necesario seleccionar un municipio</option>
    </select>
    {{ $errors->first('despacho', '<p class="help-block">:message</p>') }}
</div>