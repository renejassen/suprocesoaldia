<div class="panel-body">

    @if(Entrust::can('crear_instancias'))
    <a href="{{ URL::route('admin.procesos.instancias.create', $proceso->id) }}" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus"></i> Crear</a>
    @endif
    
    @if(Entrust::can('ver_instancias'))
    <div class="adv-table" style="margin-top:10px">
        <table  class="display table table-bordered table-striped">
            <thead>
            <tr>
                <th>Radicado</th>
                <th>Municipio</th>
                <th>Despacho</th>
                @if(Entrust::can('editar_instancias') && Entrust::can('eliminar_instancias'))
                <th>Acciones</th>
                @endif
            </tr>
            </thead>
            <tbody>

            @foreach($instancias as $instancia)
            <tr class="">
                <td>{{ $instancia->radicado }}</td>
                <td>{{ Municipio::where('id',$instancia->municipio_id)->pluck('nombre') }}</td>
                <td>{{ Despacho::where('id',$instancia->despacho_id)->pluck('nombre') }}</td>
                @if(Entrust::can('editar_instancias') && Entrust::can('eliminar_instancias'))
                <td>
                    <div class="botones">
                        
                        @if(Entrust::can('editar_instancias'))
                        <a class="btn btn-primary btn-sm tooltips" href="{{ URL::route('admin.procesos.instancias.edit', array($proceso->id, $instancia->id)) }}" title="" data-placement="top" data-toggle="tooltip" data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
                        @endif
                        
                        @if(Entrust::can('eliminar_instancias'))
                        {{ Form::button('<i class="fa fa-trash-o"></i>', array(
                                'onclick' =>    'showConfirmDeleteInstanciaModal(
                                                    "' . Despacho::where('id',$instancia->despacho_id)->pluck('nombre') . '",
                                                    "' . route('admin.procesos.instancias.destroy', array($proceso->id, $instancia->id)) . '"
                                                )',
                                'class' => 'btn btn-danger btn-sm tooltips', 'title' => '', 'data-placement' => 'top', 'data-toggle' => 'tooltip', 'data-original-title' => 'Eliminar'
                            )) 
                        }}
                        @endif
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif

</div>

<div class="modal fade" id="modal-confirmDeleteInstancia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Instancias</h4>
            </div>
            <div class="modal-body">

                Esta seguro de eliminar el instancia <strong><span id="deleteNameInstancia"></span></strong>?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                {{ Form::open(array('id' => 'deleteFormInstancia', 'method' => 'delete', 'style' => 'display:inline-block')) }}
                {{ Form::submit('Confirmar', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>