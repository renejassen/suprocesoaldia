@extends('admin.layouts.base')

@section('customstyle')
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?=URL::to('admin/servicios'); ?>"><i class="fa fa-briefcase"></i> Servicios</a></li>
            <li class="active">Crear</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Servicios</h4>
</header>
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CREAR
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <!-- <div class="alert alert-success fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Bien hecho!</strong> Archivo modificado.
                        </div>
                        <div class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Lo sentimos!</strong> Debe ingresar los campos obligatorios.
                        </div> -->
                        {{ Form::open(array('route' => 'admin.servicios.store')) }}
                        	@include('admin.servicios.partials.formcreate')
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="{{ URL::route('admin.servicios.index') }}" class="btn btn-default">Cancelar</a>
                        {{ Form::close() }}
                    </div>

                </div>
            </section>

    </div>
</div>
@stop

@section('customscript')

@stop