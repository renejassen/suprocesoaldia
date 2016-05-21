<div class="panel-body">
    @if(Session::has('message_destroy'))
    <div class="alert alert-success fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
        </button>
        <strong>Bien hecho!</strong> actor eliminado.
    </div>
    @endif
    @if(Session::has('message_store'))
    <div class="alert alert-success fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
        </button>
        <strong>Bien hecho!</strong> actor creado.
    </div>
    @endif

    @if(Entrust::can('crear_actores'))
    <a href="{{ URL::route('admin.procesos.actores.create', $proceso->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Crear</a>
    @endif

    @if(Entrust::can('ver_actores'))
    <div class="adv-table" style="margin-top:10px">
        <table  class="display table table-bordered table-striped">
            <thead>
            <tr>
                <th>Tipo actor</th>
                <th>Nombre</th>
                <th>Tipo documento</th>
                <th># documento</th>
                @if(Entrust::can('editar_actores') && Entrust::can('eliminar_actores'))
                <th>Acciones</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($actores as $actor)
            <tr class="">
                <td>{{ ActorTipo::where('id',$actor->actor_tipo_id)->pluck('tipo') }}</td>
                <td>{{ $actor->nombre }}</td>
                <td>{{ DocumentoTipo::where('id',$actor->documento_tipo_id)->pluck('tipo') }}</td>
                <td>{{ $actor->documento }}</td>
                @if(Entrust::can('editar_actores') && Entrust::can('eliminar_actores'))
                <td>
                    <div class="botones">

                        @if(Entrust::can('editar_actores'))
                        <a class="btn btn-primary btn-sm tooltips" href="{{ URL::route('admin.procesos.actores.edit', array($proceso->id, $actor->id)) }}" title="" data-placement="top" data-toggle="tooltip" data-original-title="Modificar"><i class="fa fa-pencil"></i></a>
                        @endif
                        
                        @if(Entrust::can('eliminar_actores'))
                        {{ Form::button('<i class="fa fa-trash-o"></i>', array(
                                'onclick' =>    'showConfirmDeleteActorModal(
                                                    "' . $actor->nombre . '",
                                                    "' . route('admin.procesos.actores.destroy', array($proceso->id, $actor->id)) . '"
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

<div class="modal fade" id="modal-confirmDeleteActor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Actores</h4>
            </div>
            <div class="modal-body">

                Esta seguro de eliminar el actor <strong><span id="deleteNameActor"></span></strong>?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                {{ Form::open(array('id' => 'deleteFormActor', 'method' => 'delete', 'style' => 'display:inline-block')) }}
                {{ Form::submit('Confirmar', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>