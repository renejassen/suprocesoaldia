@extends('admin.layouts.base')

@section('customstyle')
{{HTML::style('admin/assets/select2-master/select2.css');}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?=URL::to('admin/clientes'); ?>"><i class="fa fa-briefcase"></i> Clientes</a></li>
            <li class="active"><i class="fa fa-gavel"></i> Modificar</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Cliente / {{ $cliente->empresa }}</h4>
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
                        <strong>Bien hecho!</strong> cliente modificado.
                    </div>
                    @endif
					
					{{ Form::model($cliente, array('route' => array('admin.clientes.update', $cliente->id), 'method' => 'put', 'files' => 'true')) }}
                        @include('admin.clientes.partials.formedit')
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="<?=URL::to('admin/clientes');?>" class="btn btn-default">Cancelar</a>
                    {{ Form::close() }}
                
                </div>

            </div>
        </section>
    </div>
</div>
@stop

@section('customscript')
{{HTML::script('admin/assets/select2-master/select2.js');}}
{{HTML::script('admin/js/select2/select-init.js');}}
{{HTML::script('admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js');}}
@stop