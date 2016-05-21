@extends('admin.layouts.base')

@section('customstyle')
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_page.css');}}
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_table.css');}}
{{HTML::style('admin/assets/data-tables/DT_bootstrap.css');}}
{{HTML::style('admin/assets/jquery-multi-select/css/multi-select.css');}}
{{HTML::style('admin/assets/select2-master/select2.css');}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-role"></i> Roles</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Roles</h4>
</header>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LISTA
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
                <strong>Bien hecho!</strong> role eliminado.
            </div>
            @endif
            @if(Session::has('message_store'))
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Bien hecho!</strong> role creado.
            </div>
            @endif

            @if(Entrust::can('crear_roles'))
            <a href="<?=URL::to('admin/roles/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Crear</a>
            @endif
            <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="dynamic-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>

            @foreach($roles as $role)
            <tr class="">
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <div class="botones">
                        <a data-toggle="modal" rol_id="{{ $role->id }}" data-target="#permisos" class="btn btn-success btn-sm get-permisos"><i class="fa fa-lock"></i></a>
                        {{-- <a class="btn btn-success btn-sm" href="{{ URL::route('admin.roles.edit', $role->id) }}"><i class="fa fa-lock"></i></a> --}}
                        <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.roles.edit', $role->id) }}"><i class="fa fa-pencil"></i></a>
                        {{ Form::button('<i class="fa fa-trash-o"></i>', array(
                                'onclick' =>    'showConfirmDeleteModal(
                                                    "' . $role->name . " - ". $role->email . '",
                                                    "' . route('admin.roles.destroy', $role->id) . '"
                                                )',
                                'class' => 'btn btn-danger btn-sm',
                            )) 
                        }}
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
                <h4 class="modal-title">roles</h4>
            </div>
            <div class="modal-body">

                Esta seguro de eliminar el role <strong><span id="deleteName"></span></strong>?

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

<div class="modal fade" id="permisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Permisos</h4>
            </div>
            <div class="modal-body">

                <select id="select-permisos" multiple="multiple" class="multi-select">
                    @if(isset($permisos))
                        @foreach($permisos as $permiso)
                            <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
                        @endforeach
                    @endif
                </select>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('customscript')
{{HTML::script('admin/assets/advanced-datatable/media/js/jquery.dataTables.js');}}
{{HTML::script('admin/assets/data-tables/DT_bootstrap.js');}}
{{HTML::script('admin/js/dynamic_table/dynamic_table_init.js');}}

{{HTML::script('admin/assets/jquery-multi-select/js/jquery.multi-select.js');}}

<script type="text/javascript">
function showConfirmDeleteModal(name, url) {
    $('#deleteForm').prop('action', url);
    $('#deleteName').text(name);

    $('#modal-confirmDelete').modal({
        show: true
    });
}
</script>
<script>
    $(document).on('ready', function(){
        
        rol_id = null;

        $('#select-permisos').multiSelect({
            selectableHeader: "<div class='custom-header'>Permisos no asignados</div>",
            selectionHeader: "<div class='custom-header'>Permisos asignados</div>",
           afterSelect:function(value){//enviamos al servidor el id del permiso seleccionado
                $.ajax({
                url : '{{ URL::route("admin.permisos.asignar") }}',
                type : 'GET',
                dataType: 'json',
                data : {permission_id: value[0], role_id: rol_id}
            }).done(function(data){
                console.log(data);
            });
           },
           afterDeselect:function(value){//enviamos al servidor el id del permiso seleccionado
                $.ajax({
                url : '{{ URL::route("admin.permisos.desasignar") }}',
                type : 'GET',
                dataType: 'json',
                data : {permission_id: value[0], role_id: rol_id}
            }).done(function(data){
                console.log(data);
            });
           }
        });
        
        
        $('.get-permisos').on('click', function(){
            rol_id = $(this).attr('rol_id');
            console.log(rol_id);
            $.ajax({
                url : '{{ URL::route("admin.permisos") }}',
                type : 'GET',
                dataType: 'json',
                data : {id: rol_id}
            }).done(function(data){

                $('option').each(function(element) {
                    $(this).removeAttr('selected').prop('selected', false);
                });
                
                $.each(data.permisosAsignados ,function(index, value){
                    $('#select-permisos option[value="'+value.id+'"]').attr('selected', true);
                });

                $('#select-permisos').multiSelect('refresh');
            });
        });

    });
</script>
@stop