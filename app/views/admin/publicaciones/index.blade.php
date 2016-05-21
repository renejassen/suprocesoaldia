@extends('admin.layouts.base')

@section('customstyle')
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_page.css');}}
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_table.css');}}
{{HTML::style('admin/assets/data-tables/DT_bootstrap.css');}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-gear"></i> Configuración</li>
            <li class="active"><i class="fa fa-angle-double-right"></i> Publicaciones</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Publicaciones</h4>
</header>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LISTA
                <span class="badge bg-default">{{ $publicaciones->count() }}</span>
               <!--  <div class="mini-stat clearfix">
		            <span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
		            <div class="mini-stat-info">
		                <span></span>
		                Total
		            </div>
		        </div> -->
                <!-- <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span> -->
            </header>
            <div class="panel-body">
            @if(Session::has('message_destroy'))
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Bien hecho!</strong> publicación eliminada.
            </div>
            @endif
            @if(Session::has('message_store'))
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Bien hecho!</strong> publicación creada.
            </div>
            @endif

            @if(Entrust::can('crear_publicaciones'))
            <a href="<?=URL::to('admin/publicaciones/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Crear</a>
            @endif

            <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="dynamic-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Creación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>

            @foreach($publicaciones as $publicacion)
            <tr class="">
                <td>{{ $publicacion->id }}</td>
                <td>{{ $publicacion->tipo }}</td>
                <td>{{ $publicacion->created_at }}</td>
                <td>
                    <div class="botones">

                        @if(Entrust::can('editar_publicaciones'))
                        <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.publicaciones.edit', $publicacion->id) }}"><i class="fa fa-pencil"></i></a>
                        @endif
                        
                        @if(Entrust::can('eliminar_publicaciones'))
                        {{ Form::button('<i class="fa fa-trash-o"></i>', array(
                                'onclick' =>    'showConfirmDeleteModal(
                                                    "' . $publicacion->tipo . '",
                                                    "' . route('admin.publicaciones.destroy', $publicacion->id) . '"
                                                )',
                                'class' => 'btn btn-danger btn-sm',
                            )) 
                        }}
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="modal-confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Publicaciones</h4>
            </div>
            <div class="modal-body">

                Esta seguro de eliminar la publicación <strong><span id="deleteName"></span></strong>?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                {{ Form::open(array('id' => 'deleteForm', 'method' => 'delete', 'style' => 'display:inline-block')) }}
                {{ Form::submit('Confirmar', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('customscript')
{{HTML::script('admin/assets/advanced-datatable/media/js/jquery.dataTables.js');}}
{{HTML::script('admin/assets/data-tables/DT_bootstrap.js');}}
{{HTML::script('admin/js/dynamic_table/dynamic_table_init.js');}}
<script type="text/javascript">
function showConfirmDeleteModal(name, url) {
    $('#deleteForm').prop('action', url);
    $('#deleteName').text(name);

    $('#modal-confirmDelete').modal({
        show: true
    });
}
</script>
@stop