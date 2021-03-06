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
            <li><a href="{{ URL::route('admin.procesos.search') }}"><i class="fa fa-book"></i> Procesos</a></li>
            <li class="active">Buscar</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Procesos</h4>
</header>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                BUSCAR
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="position-center">
                    
                    

                    {{ Form::open(array('route' => 'admin.procesos.search.post', 'class' => 'form')) }}
                        @include('admin.procesos.partials.formsearch')
                        <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Buscar proceso</button>
                        </div>
                        {{-- <a href="{{ URL::route('admin.procesos.index') }}" class="btn btn-default">Cancelar</a> --}}
                    {{ Form::close() }}

                </div>

            </div>
        </section>
    </div>
    
    
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                RESULTADOS
                <span class="badge bg-default">{{ $count }}</span>

            </header>
            <div class="panel-body">
            
            <div class="adv-table">
            @if($count)
                <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Radicado</th>
                    <th>Despacho</th>
                    <th>Demandante</th>
                    <th>Demandado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($resultados as $resultado)
                <tr class="">
                    <td>
                        {{ $resultado->id }}
                    </td>
                    <td>
                        {{ Instancia::where('proceso_id',$resultado->id)->pluck('radicado') }}
                    </td>
                    <td>
                        {{ Municipio::where('id', Instancia::where('proceso_id',$resultado->id)->pluck('municipio_id'))->pluck('nombre') }}
                        <br>
                        {{ Despacho::where('id',Instancia::where('proceso_id',$resultado->id)->pluck('despacho_id'))->pluck('nombre') }}
                    </td>
                    <td>
                        {{--*/ $demandados = Actor::where('proceso_id', $resultado->id)->where('actor_tipo_id','1')->get() /*--}}
                        <ul>
                            @foreach($demandados as $demandado)
                            <li>{{ $demandado->nombre }}</li>
                            @endforeach
                        </ul>
                        
                    </td>
                    <td>
                        {{--*/ $demandados = Actor::where('proceso_id', $resultado->id)->where('actor_tipo_id','2')->get() /*--}}
                        <ul>
                            @foreach($demandados as $demandado)
                            <li>{{ $demandado->nombre }}</li>
                            @endforeach
                        </ul>
                        
                    </td>
                    <td>
                        <div class="botones">
                            
                            @if(Entrust::can('ver_procesos'))
                            <a class="btn btn-success btn-sm" href="{{ URL::route('admin.procesos.show', $resultado->id) }}"><i class="fa fa-eye"></i></a>
                            @endif

                            @if(Entrust::can('editar_procesos'))
                            <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.procesos.edit', $resultado->id) }}"><i class="fa fa-pencil"></i></a>
                            @endif
                            
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            @else
                <p class="lead" style="text-align:center">No se encontró ninguna coincidencia</p>
            @endif
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
<script type="text/javascript">
    jQuery(document).ready(function() {
        $.ajax({
            url: "{{ URL::to('admin/departamentos_lista') }}",
            type: 'GET',
            dataType: 'json',
            success: function(departamento){
                $('select#departamento_id').html('');
                $('select#departamento_id').append($('<option></option>').text('Seleccione un departamento').val(''));
                //recorremos con el metodo each el objeto
                $.each(departamento, function(i) {
                    //Con los parametros que recibimos en nuestro objeto departamento creamos las opciones
                    $('select#departamento_id').append("<option value=\""+departamento[i].id+"\">"+departamento[i].nombre+"<\/option>");
                });
            }
        })
        //El metodo Change nos permite realizar una acción al momento que estamos interactuando con el elemento
        $("#departamento_id").change(function(event) {
            var departamento_id = $("#departamento_id option:selected").val();  //obtenemos el id del departamento que se mantiene seleccionado
            
            //Por medio de AJAX consultamos la ruta creada en laravel llamada municipios la cual recibe el id del país
            $.ajax({
                url: "{{ URL::to('admin/municipios_lista') }}",
                type: 'POST',
                data: 'departamento_id='+departamento_id, //enviamos el id
                dataType: 'json',
                success: function(municipio){
                    $('select#municipio_id').html('');
                    $('select#municipio_id').append($('<option></option>').text('Seleccione un municipio').val('')); 
                    //recorremos con el metodo each el objeto
                    $.each(municipio, function(i) {
                        //Con los parametros que recibimos en nuestro objeto municipio creamos las opciones
                        $('select#municipio_id').append("<option value=\""+municipio[i].id+"\">"+municipio[i].nombre+"<\/option>");
                        // municipio[i].id = Contiene el id del municipio
                        // municipio[i].municipios = Contiene el nombre del municipio
                    });
                }
            })
        });

        $("#municipio_id").change(function(event) {
            var municipio_id = $("#municipio_id option:selected").val();  //obtenemos el id del municipio que se mantiene seleccionado
            
            //Por medio de AJAX consultamos la ruta creada en laravel llamada municipios la cual recibe el id del país
            $.ajax({
                url: "{{ URL::to('admin/despachos_lista') }}",
                type: 'POST',
                data: 'municipio_id='+municipio_id, //enviamos el id
                dataType: 'json',
                success: function(despacho){
                    $('select#despacho_id').html('');
                    $('select#despacho_id').append($('<option></option>').text('Seleccione un despacho').val('')); 
                    //recorremos con el metodo each el objeto
                    $.each(despacho, function(i) {
                        //Con los parametros que recibimos en nuestro objeto despacho creamos las opciones
                        $('select#despacho_id').append("<option value=\""+despacho[i].id+"\">"+despacho[i].nombre+"<\/option>");
                        // despacho[i].id = Contiene el id del despacho
                        // despacho[i].despachos = Contiene el nombre del despacho
                    });
                }
            })
        });
    });
</script>
@stop