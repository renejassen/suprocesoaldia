@extends('admin.layouts.base')

@section('customstyle')
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-gear"></i> Configuración</li>
            <li><a href="<?=URL::to('admin/procesotipos'); ?>"><i class="fa fa-angle-double-right"></i> procesotipos</a></li>
            <li class="active"><i class="fa fa-pencil"></i> Modificar</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Tipo de proceso / {{ $procesotipo->tipo }}</h4>
</header>
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    MODIFICAR
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @if(Session::has('message'))
                        <div class="alert alert-success fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Bien hecho!</strong> tipo de proceso modificado.
                        </div>
                        @endif
                        @if(Session::has('message_fail'))
                        <div class="alert alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Lo sentimos!</strong> debe seleccionar un archivo PDF.
                        </div>
                        @endif
						{{ Form::model($procesotipo, array('route' => array('admin.procesotipos.update', $procesotipo->id), 'method' => 'put')) }}
                            @include('admin.procesotipos.partials.formedit')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="<?=URL::to('admin/procesotipos');?>" class="btn btn-default">Cancelar</a>
                        {{ Form::close() }}
                    </div>

                </div>
            </section>

    </div>
</div>
@stop

@section('customscript')

@stop