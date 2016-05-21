{{ Form::model($proceso, array('route' => array('admin.procesos.update', $proceso->id), 'method' => 'put', 'files' => 'true')) }}
    <div class="form-group {{ $errors->first('clientes', 'has-error') }}">
	    {{ Form::label('cliente_lista', 'Clientes') }}
	    {{ Form::select('cliente_lista[]', $clientes , null, array('id' => 'e9', 'class' => 'populate', 'style'  => 'width:100%', 'multiple')) }}
	</div>
    <button type="submit" class="btn btn-primary">Guardar</button>
{{ Form::close() }}