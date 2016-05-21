@extends('admin.layouts.base')

@section('customstyle')
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_page.css');}}
{{HTML::style('admin/assets/advanced-datatable/media/css/demo_table.css');}}
{{HTML::style('admin/assets/data-tables/DT_bootstrap.css');}}
{{HTML::style('admin/assets/select2-master/select2.css');}}
{{HTML::style('admin/assets/bootstrap-datepicker/css/datepicker.css');}}
{{HTML::style('admin/assets/bootstrap-switch-master/build/css/bootstrap3/bootstrap-switch.css');}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><i class="fa fa-angle-double-right"></i> Cartelera virtual</li>
            <li class="active"><i class="fa fa-angle-double-right"></i> Reporte</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Cartelera virtual</h4>
</header>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                REPORTE DE PUBLICACIONES SIN FOTO
               <!--  <div class="mini-stat clearfix">
		            <span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
		            <div class="mini-stat-info">
		                <span></span>
		                Total
		            </div>
		        </div> -->
                <!-- <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span> -->
            </header>
            <div class="panel-body">
			
				<div class="position-center">
                    
                    @if(Session::has('message_error'))
                    <div class="alert alert-error fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>Lo sentimos!</strong> El campo email ya se encuentra asignado a un proceso.
                    </div>
                    @endif
                    
            
                @if(Auth::user()->tipo_id > 0)
                    {{--*/ $cliente = Cliente::find(Auth::user()->tipo_id); /*--}}
                    {{--*/ $servicios_cliente = $cliente->servicios()->get(); /*--}}
                    @foreach ($servicios_cliente as $servicio)
                        @if($servicio->id == 2)
                            {{ Form::open(array('route' => array('admin.carteleras.report'))) }}
                                @include('admin.carteleras.partials.formreport')
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            {{ Form::close() }}
                        @endif
                    @endforeach
                @else
                {{ Form::open(array('route' => array('admin.carteleras.report'))) }}
                                @include('admin.carteleras.partials.formreport')
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            {{ Form::close() }}
                @endif
                

                </div>

            @if(Session::has('message_destroy'))
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Bien hecho!</strong> cartelera eliminada.
            </div>
            @endif
            @if(Session::has('message_store'))
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Bien hecho!</strong> cartelera creada.
            </div>
            @endif
            {{-- <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="dynamic-table2">
            <thead>
            <tr>
                <th>ID</th>
                <th>Despacho</th>
                <th>Fecha de publicación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
			
            @foreach($carteleras as $cartelera)
            <tr class="">
                <td>{{ $cartelera->id }}</td>
                <td>
                	{{ Municipio::where('id',$cartelera->municipio_id)->pluck('nombre') }}
                	<br>
                	{{ Despacho::where('id',$cartelera->despacho_id)->pluck('nombre') }}
                </td>
                <td>{{ date("d F Y",strtotime($cartelera->fecha_publicacion)) }}</td>
                <td>
                    <div class="botones">
                    	@if($cartelera->estado == 1)
                        <a class="btn btn-success btn-sm" href="{{ URL::route('admin.carteleras.show', $cartelera->id) }}" target="_blank"><i class="fa fa-eye"></i></a>
                        @endif
				
                        <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.carteleras.edit', $cartelera->id) }}"><i class="fa fa-pencil"></i></a>
                        
                        {{ Form::button('<i class="fa fa-trash-o"></i>', array(
                                'onclick' =>    'showConfirmDeleteModal(
                                                    "' . Despacho::where('id',$cartelera->despacho_id)->pluck('nombre') . " - Fecha: " . date("d F Y",strtotime($cartelera->fecha_publicacion)) . '",
                                                    "' . route('admin.carteleras.destroy', $cartelera->id) . '"
                                                )',
                                'class' => 'btn btn-danger btn-sm',
                            )) 
                        }}
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div> --}}
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="modal-confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">carteleras</h4>
            </div>
            <div class="modal-body">

                Esta seguro de eliminar la cartelera <br><strong><span id="deleteName"></span></strong>?

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                {{ Form::open(array('id' => 'deleteForm', 'method' => 'delete', 'style' => 'display:inline-block')) }}
                {{ Form::submit('Confirmar', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('customscript')
{{HTML::script('admin/assets/advanced-datatable/media/js/jquery.dataTables.js');}}
{{HTML::script('admin/assets/data-tables/DT_bootstrap.js');}}
{{HTML::script('admin/js/dynamic_table/dynamic_table_init.js');}}

{{HTML::script('admin/assets/select2-master/select2.js');}}
{{HTML::script('admin/js/select2/select-init.js');}}
{{HTML::script('admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js');}}
{{HTML::script('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js');}}

<script type="text/javascript">
function showConfirmDeleteModal(name, url) {
    $('#deleteForm').prop('action', url);
    $('#deleteName').text(name);

    $('#modal-confirmDelete').modal({
        show: true
    });
}

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
    });
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

//date picker start

if (top.location != location) {
    top.location.href = document.location.href ;
}
$(function(){
    window.prettyPrint && prettyPrint();
    $('.default-date-picker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.dpYears').datepicker();
    $('.dpMonths').datepicker();


    var startDate = new Date(2012,1,20);
    var endDate = new Date(2012,1,25);
    $('.dp4').datepicker()
        .on('changeDate', function(ev){
            if (ev.date.valueOf() > endDate.valueOf()){
                $('.alert').show().find('strong').text('The start date can not be greater then the end date');
            } else {
                $('.alert').hide();
                startDate = new Date(ev.date);
                $('#startDate').text($('.dp4').data('date'));
            }
            $('.dp4').datepicker('hide');
        });
    $('.dp5').datepicker()
        .on('changeDate', function(ev){
            if (ev.date.valueOf() < startDate.valueOf()){
                $('.alert').show().find('strong').text('The end date can not be less then the start date');
            } else {
                $('.alert').hide();
                endDate = new Date(ev.date);
                $('.endDate').text($('.dp5').data('date'));
            }
            $('.dp5').datepicker('hide');
        });

    // disabling dates
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('.dpd1').datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('.dpd2')[0].focus();
        }).data('datepicker');
    var checkout = $('.dpd2').datepicker({
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
});

//date picker end

</script>

@stop