@extends('admin.layouts.base')

@section('customstyle')
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_page.css');}}
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_table.css');}}
{{HTML::style('admin/assets/data-tables/DT_bootstrap.css');}}
{{HTML::style('admin/assets/select2-master/select2.css');}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="{{ URL::route('admin.procesos.search') }}"><i class="fa fa-angle-double-right"></i> Procesos</a></li>
            <li class="active"><i class="fa fa-folder-o"></i> Carpeta virtual</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Proceso / <strong>{{ $proceso->id }}</strong></h4>
</header>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                INFORMACIÓN DEL PROCESO
            </header>
            <div class="panel-body">
                <div class="position-center">
                    
                    @if(Entrust::can('crear_clientes'))
                    @endif

                    <div class="alert alert-info fade in" style="text-align:center">
                        <strong>{{ ProcesoTipo::where('id',$proceso->proceso_tipo_id)->pluck('tipo') }}</strong>
                    </div>

                </div>

            </div>
        </section>
    </div>
</div>

@if(Session::has('message_destroy'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> instancia eliminado.
</div>
@endif

@if(Session::has('message_store_instancia'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> instancia creada.
</div>
@endif

@if(Session::has('message_update_instancia'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> instancia modificada.
</div>
@endif

@if(Session::has('message_destroy_instancia'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> instancia eliminada.
</div>
@endif

@if(Session::has('message_store_actor'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> actor creado.
</div>
@endif

@if(Session::has('message_update_actor'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> actor modificado.
</div>
@endif

@if(Session::has('message_destroy_actor'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> actor eliminado.
</div>
@endif

@if(Session::has('message_update_cliente'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> cliente modificado.
</div>
@endif

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue ">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#instancias">Instancias <span class="badge bg-default">{{ $instancias->count() }}</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#actores">Actores <span class="badge bg-default">{{ $actores->count() }}</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#datos">Adicionales</a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="instancias" class="tab-pane active">
                        @include('admin.procesos.partials.instancias')
                    </div>
                    <div id="actores" class="tab-pane">
                        @include('admin.procesos.partials.actores')
                    </div>
                    <div id="datos" class="tab-pane">
                        <div class="panel-body">
                            <div class="position-center">
                                <aside class="profile-nav alt">
		                            <section class="panel">
		                                <ul class="nav nav-pills nav-stacked">
		                                    <li><a href="javascript:;"> <i class="fa fa-bullseye"></i> Cédula: {{ $proceso->cedula }}</a></li>
		                                    <li><a href="javascript:;"> <i class="fa fa-bullseye"></i> Obligación: {{ $proceso->obligacion }}</a></li>
		                                    <li><a href="javascript:;"> <i class="fa fa-bullseye"></i> Apoderado: {{ $proceso->apoderado }}</a></li>
		                                </ul>
		                            </section>
		                        </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@if(Session::has('message_store_actuacion'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> actuación creada.
</div>
@endif

@if(Session::has('message_update_actuacion'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> actuación modificada.
</div>
@endif

@if(Session::has('message_destroy_actuacion'))
<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Bien hecho!</strong> actuación eliminada.
</div>
@endif

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue ">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#actuaciones">Actuaciones <span class="badge bg-default">{{ $actuaciones->count() }}</span></a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="instancias" class="tab-pane active">
                        @include('admin.procesos.partials.actuaciones')
                    </div>
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
                <h4 class="modal-title">Municipios</h4>
            </div>
            <div class="modal-body">

                Esta seguro de eliminar el municipio <strong><span id="deleteName"></span></strong>?

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
{{HTML::script('admin/assets/select2-master/select2.js');}}
{{HTML::script('admin/js/select2/select-init.js');}}
{{HTML::script('admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js');}}

{{HTML::script('admin/assets/advanced-datatable/media/js/jquery.dataTables.js');}}
{{HTML::script('admin/assets/data-tables/DT_bootstrap.js');}}
{{HTML::script('admin/js/dynamic_table/dynamic_table_init.js');}}
{{HTML::script('admin/assets/flot-chart/jquery.flot.tooltip.min.js');}}
<script type="text/javascript">
function showConfirmDeleteModal(name, url) {
    $('#deleteForm').prop('action', url);
    $('#deleteName').text(name);

    $('#modal-confirmDelete').modal({
        show: true
    });

    $('.tooltips').tooltip();
}

function showConfirmDeleteActorModal(name, url) {
    $('#deleteFormActor').prop('action', url);
    $('#deleteNameActor').text(name);

    $('#modal-confirmDeleteActor').modal({
        show: true
    });

    $('.tooltips').tooltip();
}

function showConfirmDeleteInstanciaModal(name, url) {
    $('#deleteFormInstancia').prop('action', url);
    $('#deleteNameInstancia').text(name);

    $('#modal-confirmDeleteInstancia').modal({
        show: true
    });

    $('.tooltips').tooltip();
}

function showCrearInstanciaModal(name, url) {
    $('#deleteForm').prop('action', url);
    $('#deleteName').text(name);

    $('#modal-confirmDelete').modal({
        show: true
    });

    $('.tooltips').tooltip();
}

function showConfirmDeleteActuacionModal(name, url) {
    $('#deleteFormActuacion').prop('action', url);
    $('#deleteNameActuacion').text(name);

    $('#modal-confirmDeleteActuacion').modal({
        show: true
    });

    $('.tooltips').tooltip();
}
</script>
@stop