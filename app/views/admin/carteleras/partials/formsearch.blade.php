<div class="form-group {{ $errors->first('fecha_publicacion', 'has-error') }}">
  {{ Form::label('fecha_publicacion', 'Fecha de publicaciones') }}
  {{ Form::text('fecha_publicacion', '', array('class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '36')) }}
  {{ $errors->first('fecha_publicacion', '<p class="help-block">:message</p>') }}
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

<div class="form-group {{ $errors->first('rama_id', 'has-error') }}">
    {{ Form::label('rama_id', 'Rama') }}
    {{ Form::select('rama_id', $ramas = array('' => 'Seleccionar') + Rama::lists('nombre','id') , null, array('id' => 'rama_id', 'class' => 'populate', 'style'  => 'width:100%')) }}
    {{ $errors->first('rama_id', '<p class="help-block">:message</p>') }}
</div>