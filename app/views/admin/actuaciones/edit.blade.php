@extends('admin.layouts.base')

@section('customstyle')
{{HTML::style('admin/assets/select2-master/select2.css');}}
{{HTML::style('admin/assets/bootstrap-datepicker/css/datepicker.css');}}
{{HTML::style('admin/assets/bootstrap-datetimepicker/css/datetimepicker.css');}}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="<?=URL::to('admin/inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="{{ URL::route('admin.procesos.edit', $proceso->id) }}"><i class="fa fa-angle-double-right"></i> Proceso</a></li>
            <li><i class="fa fa-angle-double-right"></i> Actuaciones</li>
            <li class="active"><i class="fa fa-pencil"></i> Modificar</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<header class="panel-heading wht-bg">
   <h4 class="gen-case">Actuaciones / Proceso: <strong>{{ $proceso->id }}</strong></h4>
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
                            <strong>Bien hecho!</strong> actuación modificado.
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
						<form action="{{ route('admin.procesos.actuaciones.update', array($proceso->id, $actuacion->id)) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @include('admin.actuaciones.partials.formedit')
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
{{HTML::script('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js');}}
{{HTML::script('admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js');}}

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

//datetime picker start

$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

$(".form_datetime-component").datetimepicker({
    format: "dd MM yyyy - hh:ii"
});

$(".form_datetime-adv").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    autoclose: true,
    todayBtn: true,
    startDate: "2013-02-14 10:00",
    minuteStep: 10
});

$(".form_datetime-meridian").datetimepicker({
    format: "dd MM yyyy - HH:ii P",
    showMeridian: true,
    autoclose: true,
    todayBtn: true
});

//datetime picker end

</script>
@stop