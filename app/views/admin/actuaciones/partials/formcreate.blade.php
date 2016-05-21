<div class="form-group {{ $errors->first('instancia_id', 'has-error') }}">
    {{ Form::label('instancia_id', 'Instancia (Despacho)') }}
    {{-- {{ Form::select('instancia_id', $instancias, null, array('class' => 'form-control')) }} --}}
    <select id="instancia_id" name="instancia_id" class="populate" style="width:100%">
      <option value="">Seleccionar</option>
      @foreach($instancias as $instancia)
        <option value="{{ $instancia->id }}">{{ Despacho::where('id',$instancia->despacho_id)->pluck('nombre') }}</option>
      @endforeach
    </select>
    {{ $errors->first('instancia_id', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('publicacion_id', 'has-error') }}">
    {{ Form::label('publicacion_id', 'Tipo de publicación') }}
    {{ Form::select('publicacion_id', $procesotipos = Publicacion::lists('tipo','id') , null, array('id' => 'publicacion_id', 'class' => 'populate', 'style'  => 'width:100%')) }}
    {{ $errors->first('publicacion_id', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('fecha_publicacion', 'has-error') }}">
  {{ Form::label('fecha_publicacion', 'Fecha de publicación') }}
  {{ Form::text('fecha_publicacion', '', array('readonly', 'class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '36')) }}
  {{ $errors->first('fecha_publicacion', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('fecha_auto', 'has-error') }}">
  {{ Form::label('fecha_auto', 'Fecha de auto') }}
  {{ Form::text('fecha_auto', '', array('readonly', 'class' => 'form-control form-control-inline input-medium default-date-picker', 'size' => '36')) }}
  {{ $errors->first('fecha_auto', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('etapa_id', 'has-error') }}">
    {{ Form::label('etapa_id', 'Etapa procesal') }}
    {{ Form::select('etapa_id', $procesotipos = Etapa::lists('tipo','id') , null, array('id' => 'etapa_id', 'class' => 'populate', 'style'  => 'width:100%')) }}
    {{ $errors->first('etapa_id', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('actuacion_tipo_id', 'has-error') }}">
    {{ Form::label('actuacion_tipo_id', 'Actuación') }}
    {{ Form::select('actuacion_tipo_id', $procesotipos = ActuacionTipo::lists('tipo','id') , null, array('id' => 'actuacion_tipo_id', 'class' => 'populate', 'style'  => 'width:100%')) }}
    {{ $errors->first('actuacion_tipo_id', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('resumen', 'has-error') }}">
    {{ Form::label('resumen', 'Resumen de la actuación') }}
    {{ Form::textarea('resumen', '', array('class' => 'form-control', 'rows' => '6')) }}
    {{ $errors->first('resumen', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('fecha_audiencia', 'has-error') }}">
  {{ Form::label('fecha_audiencia', 'Fecha de audiencia') }}
  {{ Form::text('fecha_audiencia', '', array('readonly', 'class' => 'form_datetime form-control', 'size' => '36')) }}
  {{ $errors->first('fecha_audiencia', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('pdf', 'has-error') }}">
    {{ Form::label('pdf', 'Auto (PDF)') }}
    {{ Form::file('pdf') }}
    {{-- <p class="help-block">Seleccione el archivo PDF</p> --}}
    {{ $errors->first('pdf', '<p class="help-block">:message</p>') }}
</div>

{{ Form::hidden('user_id', Auth::user()->id, array('id' => 'user_id')) }}