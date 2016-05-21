<div class="panel-body">

    @if(Entrust::can('crear_actuaciones'))
    <a href="{{ URL::route('admin.procesos.actuaciones.create', $proceso->id) }}" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus"></i> Crear</a>
    @endif

    <div class="adv-table" style="margin-top:20px">

    @if(Entrust::can('ver_actuaciones'))
    <div class="col-md-12" id="actuaciones">
        @if($actuaciones->count())
        @foreach($actuaciones as $key => $actuacion)
            <div class="col-md-12">
                <!--widget start-->
                <aside class="profile-nav alt">
                    <section class="panel" style="border:1px solid #ebeae6">
                    @if($key == 0)
                        <div class="user-heading alt terques-bg">
                    @else
                        <div class="user-heading alt gray-bg">
                    @endif
                            <h1>{{ date("d F Y",strtotime($actuacion->fecha_publicacion)) }} - {{ ActuacionTipo::where('id',$actuacion->actuacion_tipo_id)->pluck('tipo') }}</h1>
                            {{-- <p style="color:#fff;">{{ ActuacionTipo::where('id',$actuacion->actuacion_tipo_id)->pluck('tipo') }}</p> --}}
                        </div>
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-tag"></i>
                                    {{ Despacho::where('id', Instancia::where('id',$actuacion->instancia_id)->pluck('despacho_id'))->pluck('nombre') }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-columns"></i>
                                    <strong>Publicación: </strong>
                                    {{ Publicacion::where('id',$actuacion->publicacion_id)->pluck('tipo') }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-calendar"></i>
                                    <strong>F. Publicación: </strong>
                                    {{ date("d F Y",strtotime($actuacion->fecha_publicacion)) }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-calendar"></i>
                                    <strong>F. Auto:</strong>
                                    {{ date("d F Y",strtotime($actuacion->fecha_auto)) }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-folder-open"></i>
                                    <strong>Etapa: </strong>
                                    {{ Etapa::where('id',$actuacion->etapa_id)->pluck('tipo') }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-file-text"></i>
                                    <strong>Resumen: </strong>
                                    {{ $actuacion->resumen }}
                                </a>
                            </li>
                            @if($actuacion->fecha_audiencia != '0000-00-00 00:00:00')
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-calendar"></i>
                                    <strong>F. Audiencia: </strong>
                                    {{ $actuacion->fecha_audiencia }}
                                </a>
                            </li>
                            @endif
                        </ul>

                        <div style="border-top:1px solid #ebeae6; padding: 10px 15px">

                            @if(Entrust::can('editar_actuaciones'))
                            <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.procesos.actuaciones.edit', array($proceso->id, $actuacion->id)) }}" title=""><i class="fa fa-pencil"></i></a>
                            @endif

                            @if(Entrust::can('eliminar_actuaciones'))
                            {{ Form::button('<i class="fa fa-trash-o"></i>', array(
                                    'onclick' =>    'showConfirmDeleteActuacionModal(
                                                        "' . ActuacionTipo::where('id',$actuacion->actuacion_tipo_id)->pluck('tipo') . '",
                                                        "' . route('admin.procesos.actuaciones.destroy', array($proceso->id, $actuacion->id)) . '"
                                                    )',
                                    'class' => 'btn btn-danger btn-sm tooltips', 'title' => '', 'data-placement' => 'top', 'data-toggle' => 'tooltip', 'data-original-title' => 'Eliminar'
                                ))
                            }}
                            @endif

                            @if($actuacion->pdf != "")
                            <a class="btn btn-success btn-sm" href="{{ URL::route('admin.procesos.actuaciones.show', array($proceso->id, $actuacion->id)) }}" title="" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            @endif

                            {{--*/ $despacho = Instancia::where('id',$actuacion->instancia_id)->pluck('despacho_id'); /*--}}

                            {{--*/ $fecha = $actuacion->fecha_publicacion; /*--}}

                            {{--*/ $cartelera = Cartelera::where('despacho_id', '=',$despacho)->first(); /*--}}

                            @if(Auth::user()->tipo_id > 0)
                                {{--*/ $cliente = Cliente::find(Auth::user()->tipo_id); /*--}}
                                {{--*/ $servicios_cliente = $cliente->servicios()->get(); /*--}}
                                @foreach ($servicios_cliente as $servicio)
                                    @if($servicio->id == 2)
                                      <a class="btn btn-info btn-sm" href="{{ URL::route('admin.carteleras.showPublicacion', array(Instancia::where('id',$actuacion->instancia_id)->pluck('despacho_id'),$actuacion->fecha_publicacion)) }}" title="" target="_blank"><i class="fa fa-columns"></i></a>
                                    @endif
                                @endforeach
                            @else
                                <a class="btn btn-info btn-sm" href="{{ URL::route('admin.carteleras.showPublicacion', array(Instancia::where('id',$actuacion->instancia_id)->pluck('despacho_id'),$actuacion->fecha_publicacion)) }}" title="" target="_blank"><i class="fa fa-columns"></i></a>
                            @endif
                        </div>


                    </section>
                </aside>
                <!--widget end-->
            </div>
        @endforeach
    @else
        <div class="alert alert-warning fade in">
            <strong>¡Actualmente!</strong> No existen actuaciones
        </div>
    @endif
    </div>
    @endif
    </div>
</div>

<div class="modal fade" id="modal-confirmDeleteActuacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Actuaciones</h4>
            </div>
            <div class="modal-body">

                ¿Está seguro de eliminar la actuación <strong><span id="deleteNameActuacion"></span></strong>?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                {{ Form::open(array('id' => 'deleteFormActuacion', 'method' => 'delete', 'style' => 'display:inline-block')) }}
                {{ Form::submit('Confirmar', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
