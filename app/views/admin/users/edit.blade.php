@extends('admin.layouts.base')

@section('customstyle')
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-user"></i> Accesos</li>
            <li><a href="<?=URL::to('admin/usuarios'); ?>"><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
            <li class="active">Actualizar</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Usuarios</h4>
</header>
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Actualizar
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        {{ Form::open(array('method' => 'PATCH','route' => array('admin.users.update', $user->id))) }}
                        	  @include('admin.users.partials.formedit')
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ URL::route('admin.users.index') }}" class="btn btn-default">Cancelar</a>
                        {{ Form::close() }}
                    </div>

                </div>
            </section>
    </div>
</div>


@stop

@section('customscript')

@stop
