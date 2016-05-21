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
            <li><a href="<?=URL::route('admin.departamentos.index'); ?>"><i class="fa fa-angle-double-right"></i> Departamentos</a></li>
            <li><a href="{{ URL::route('admin.departamentos.municipios.index', array($departamento->id,$municipio->id)) }}"><i class="fa fa-angle-double-right"></i> Municipios</a></li>
            <li><a href="{{ URL::route('admin.departamentos.municipios.despachos.index', array($departamento->id, $municipio->id)) }}"><i class="fa fa-angle-double-right"></i> Despachos</a></li>
            <li class="active"><i class="fa fa-pencil"></i> Modificar</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">despacho / {{ $departamento->nombre }} / {{ $municipio->nombre }} / <strong>{{ $despacho->nombre }}</strong></h4>
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
                            <strong>Bien hecho!</strong> despacho modificado.
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
						<form action="{{ route('admin.departamentos.municipios.despachos.update', array($departamento->id, $municipio->id, $despacho->id)) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @include('admin.despachos.partials.formedit')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ URL::route('admin.departamentos.municipios.despachos.index', array($departamento->id, $municipio->id)) }}" class="btn btn-default">Cancelar</a>
                        {{ Form::close() }}
                    </div>

                </div>
            </section>

    </div>
</div>
@stop

@section('customscript')

@stop