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
            <li><a href="{{ URL::route('admin.departamentos.municipios.index', $departamento->id) }}"><i class="fa fa-angle-double-right"></i> Municipios</a></li>
            <li class="active">Crear</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Municipios / {{ $departamento->nombre }}</h4>
</header>
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CREAR
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        {{ Form::open(array('route' => array('admin.departamentos.municipios.store', $departamento->id))) }}
                        	@include('admin.municipios.partials.formcreate')
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="{{ URL::route('admin.departamentos.municipios.index', $departamento->id) }}" class="btn btn-default">Cancelar</a>
                        {{ Form::close() }}
                    </div>

                </div>
            </section>

    </div>
</div>
@stop

@section('customscript')

@stop