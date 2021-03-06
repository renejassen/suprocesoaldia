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
            <li><a href="{{ URL::route('admin.procesos.edit', $proceso->id) }}"><i class="fa fa-angle-double-right"></i> Proceso</a></li>
            <li><i class="fa fa-angle-double-right"></i> Instancias</li>
            <li class="active"><i class="fa fa-pencil"></i> Modificar</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Instancia / Proceso: <strong>{{ $proceso->id }}</strong></h4>
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
                            <strong>Bien hecho!</strong> instancia modificado.
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
						<form action="{{ route('admin.procesos.instancias.update', array($proceso->id, $instancia->id)) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @include('admin.instancias.partials.formedit')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ URL::route('admin.procesos.edit', $proceso->id) }}" class="btn btn-default">Cancelar</a>
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

<script type="text/javascript">
    jQuery(document).ready(function() {
        $.ajax({
            url: '../../../../departamentos_lista',
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
                url: '../../../../municipios_lista',
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
                url: '../../../../despachos_lista',
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