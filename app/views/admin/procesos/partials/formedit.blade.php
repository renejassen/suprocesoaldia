<div class="form-group {{ $errors->first('proceso_tipo_id', 'has-error') }}">
    {{ Form::label('proceso_tipo_id', 'Tipo de proceso') }}
    {{ Form::select('proceso_tipo_id', $procesotipos = array('0' => 'Seleccionar') + ProcesoTipo::lists('tipo') , $proceso->proceso_tipo_id, array('id' => 'proceso_tipo_id', 'class' => 'populate', 'style'  => 'width:100%')) }}
    {{ $errors->first('proceso_tipo_id', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{ $errors->first('clientes', 'has-error') }}">
    {{ Form::label('cliente_lista', 'Clientes') }}
    {{ Form::select('cliente_lista[]', $clientes , null, array('id' => 'cliente_lista', 'class' => 'populate', 'style'  => 'width:100%', 'multiple')) }}
</div>