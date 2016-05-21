@extends('admin.layouts.base')

@section('customstyle')
{{HTML::style('admin/assets/select2-master/select2.css');}}
{{HTML::style('admin/assets/jquery-tags-input/jquery.tagsinput.css');}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?=URL::to('admin/clientes'); ?>"><i class="fa fa-gavel"></i> Clientes</a></li>
            <li class="active"><i class="fa fa-eye"></i> Ver</li>
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
            <div class="panel-body profile-information">
               <div class="col-md-9">
                   <div class="profile-desk">
                   		
                   		@if(Session::has('message'))
	                    <div class="alert alert-success fade in">
	                        <button data-dismiss="alert" class="close close-sm" type="button">
	                            <i class="fa fa-times"></i>
	                        </button>
	                        <strong>Bien hecho!</strong> cliente modificado.
	                    </div>
	                    @endif

                   		@if(Session::has('message_suspended'))
	                    <div class="alert alert-success fade in">
	                        <button data-dismiss="alert" class="close close-sm" type="button">
	                            <i class="fa fa-times"></i>
	                        </button>
	                        <strong>Bien hecho!</strong> cliente modificado.
	                    </div>
	                    @endif

                       <h1>{{ $cliente->empresa }}</h1>
                       <span class="text-muted">Nit. {{ $cliente->nit }}</span>
                       <div class="col-md-12">
	                        <!--widget start-->
	                        <aside class="profile-nav alt">
	                            <section class="panel">
	                                <ul class="nav nav-pills nav-stacked">
	                                    <li><a href="javascript:;"> {{ $user_estado }}</a></li>
	                                    <li><a href="javascript:;"> <i class="fa fa-puzzle-piece"></i> {{ $cliente->cargo }}</a></li>
	                                    <li><a href="javascript:;"> <i class="fa fa-user"></i> {{ $cliente->nombres }}</a></li>
	                                    <li><a href="javascript:;"> <i class="fa fa-user"></i> {{ $cliente->apellidos }}</a></li>
	                                    <li><a href="javascript:;"> <i class="fa fa-envelope-o"></i> {{ $user->email }}</a></li>
	                                    <li><a href="javascript:;"> <i class="fa fa-phone"></i> {{ $cliente->telefono }}</a></li>
	                                    <li><a href="javascript:;"> <i class="fa fa-mobile-phone"></i> {{ $cliente->celular }}</a></li>
	                                    <li><a href="javascript:;"> <i class="fa fa-map-marker"></i> {{ $cliente->direccion }}</a></li>
	                                    <li><a href="javascript:;" title="Creación"> <i class="fa fa-calendar-o"></i> {{ date("d F Y",strtotime($cliente->created_at)) }} - {{ date("g:ha",strtotime($cliente->created_at)) }}</a></li>
	                                    <li><a href="javascript:;" title="Facturación"> <i class="fa fa-calendar"></i> @if($cliente->facturacion != "0000-00-00"){{ date("d F Y",strtotime($cliente->facturacion)) }} @else Sin activar @endif</a></li>
	                                    <li>
		                                    <a href="javascript:;"> 
		                                    	<i class="fa fa-briefcase"></i>
		                                    	@foreach ($servicios as $servicio)
		                                    	<span class="label label-success">{{ $servicio->servicio }}</span>
			                                    @endforeach
		                                    </a>
	                                    </li>
	                                </ul>
	                            </section>
	                        </aside>
	                        <!--widget end-->
	                    </div>
                       <!-- <p>
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porttitor vestibulum imperdiet. Ut auctor accumsan erat, a vulputate metus tristique non. Aliquam aliquam vel orci quis sagittis.
                       </p> -->
                       
			           	
						@if($user->estado_id === 1)
	                    {{ Form::model($user, array('route' => array('admin.clientes.activar', $cliente->id, $user->id, '2'), 'method' => 'put' )) }}
	                    	
	                    	@if(Entrust::can('editar_clientes'))
	                        <a href="{{ URL::route('admin.clientes.edit', $cliente->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Modificar</a>
	                        @endif
	                        
	                        @if(Entrust::can('editar_clientes'))
	                        <button type="submit" class="btn btn-success"><i class="fa fa-key"></i> Enviar Accesos y generar facturación</button>
	                        @endif

	                    {{ Form::close() }}
	                    
	                    @elseif($user->estado_id === 2)
	                    {{ Form::model($user, array('route' => array('admin.users.updateEstado', $user->id, '3'), 'method' => 'put' )) }}

	                    	@if(Entrust::can('editar_clientes'))
	                        <a href="{{ URL::route('admin.clientes.edit', $cliente->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Modificar</a>
							@endif
							
							@if(Entrust::can('editar_clientes'))
	                        <button type="submit" class="btn btn-default"><i class="fa fa-thumbs-o-down"></i> Suspender</button>
							@endif

	                    {{ Form::close() }}

	                    <h2 class=""></h2>

	                    {{ Form::model($user, array('route' => array('admin.procesos.clientList', $user->tipo_id), 'method' => 'put' )) }}
							
							@if(Entrust::can('editar_clientes'))
	                        <button type="submit" class="btn btn-success"><i class="fa fa-list"></i> Listado de procesos</button>
							@endif

	                    {{ Form::close() }}
	                    
	                    @elseif($user->estado_id === 3)
	                    {{ Form::model($user, array('route' => array('admin.users.updateEstado', $user->id, '2'), 'method' => 'put' )) }}

	                    	@if(Entrust::can('editar_clientes'))
	                        <a href="{{ URL::route('admin.clientes.edit', $cliente->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Modificar</a>
	                        @endif

	                        @if(Entrust::can('editar_clientes'))
	                        <button type="submit" class="btn btn-info"><i class="fa fa-thumbs-o-up"></i> Activar</button>
	                        @endif

	                    {{ Form::close() }}
	                    @endif
			                

                   </div>
               </div>
               <div class="col-md-3">
                   <div class="profile-statistics">
                       <h1>{{ DB::table('cliente_proceso')->where('cliente_id',$cliente->id)->count() }}</h1>
                       <p>Procesos Asignados</p>
                       <h1>{{ $cliente->id }}</h1>
                       <p>Código de cliente</p>
                   </div>
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
{{HTML::script('admin/assets/jquery-tags-input/jquery.tagsinput.js');}}
@stop