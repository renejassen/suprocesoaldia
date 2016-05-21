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
            <li><a href="<?=URL::to('admin/clientes'); ?>"><i class="fa fa-gavel"></i> Clientes</a></li>
            <li class="active">Crear</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Clientes</h4>
</header>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CREAR
            </header>
            <div class="panel-body">
                <div class="position-center">
                    
                    @if(Session::has('message_error'))
                    <div class="alert alert-error fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>Lo sentimos!</strong> El campo email ya se encuentra asignado a un cliente.
                    </div>
                    @endif

                    {{ Form::open(array('route' => 'admin.clientes.store')) }}
                        @include('admin.clientes.partials.formcreate')
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <a href="{{ URL::route('admin.clientes.index') }}" class="btn btn-default">Cancelar</a>
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