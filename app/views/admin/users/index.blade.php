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
            <li class="active"><i class="fa fa-user"></i> Usuarios</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Usuarios</h4>
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
                <strong>¡Bien hecho!</strong> user eliminado.
            </div>
            @endif
            @if(Session::has('message_store'))
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>¡Bien hecho!</strong> user creado.
            </div>
            @endif

            @if(Entrust::can('crear_usuarios'))
            <a href="<?=URL::to('admin/users/create'); ?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Crear</a>
            @endif

            <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="dynamic-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
            <tr class="">
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rol->name }}</td>
                <td>
                    <div class="botones">

                        @if(Entrust::can('editar_usuarios'))
                            @if($user->rol->id == 1 || $user->rol->id == 2 || $user->rol->id == 3 || $user->rol->id == 7 || $user->rol->id == 5)
                            <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.users.edit', $user->id) }}"><i class="fa fa-pencil"></i></a>
                            @endif

                            @if($user->rol->id == 1 || $user->rol->id == 2 || $user->rol->id == 3 || $user->rol->id == 7 || $user->rol->id == 5)
                            <a class="btn btn-success btn-sm" href="{{ URL::route('admin.clientes.show', $user->tipo_id) }}"><i class="fa fa-eye"></i></a>
                            @endif
                        @endif

                        @if(Entrust::can('eliminar_usuarios'))
                            @if($user->rol->id == 1 || $user->rol->id == 2 || $user->rol->id == 3 || $user->rol->id == 7 || $user->rol->id == 5)
                            {{ Form::button('<i class="fa fa-trash-o"></i>', array(
                                    'onclick' =>    'showConfirmDeleteModal(
                                                        "' . $user->nombre . " - ". $user->email . '",
                                                        "' . route('admin.users.destroy', $user->id) . '"
                                                    )',
                                    'class' => 'btn btn-danger btn-sm',
                                ))
                            }}
                            @endif
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
                            <h4 class="modal-title">users</h4>
                        </div>
                        <div class="modal-body">

                            Esta seguro de eliminar el user <strong><span id="deleteName"></span></strong>?

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
