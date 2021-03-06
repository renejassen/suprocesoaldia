@extends('layouts.base')

@section('customstyle')
@stop

@section('content')
<div class="fullwidthbanner-container internas">
    <div class="fullwidthbanner internas">

        <ul>
            <li data-transition="fade">

                <img src="_content/index/slider/1920x547-1.jpg" alt="">

                <h1 class="caption title sft"
                    data-x="0"
                    data-y="100"
                    data-speed="700"
                    data-start="1000"
                    data-easing="easeOutBack">
                    Nuestros <strong>Servicios</strong>
                </h1>

                <div class="caption text sfb"
                    data-x="0"
                    data-y="320"
                    data-speed="700"
                    data-start="1500"
                    data-easing="easeOutBack">
                    Suministramos servicios en el Campo Jurídico bajo los estándares <br>de calidad y confidencialidad requeridos.
                </div>

                <div class="caption icons-1 sfb"
                    data-x="600"
                    data-y="250"
                    data-speed="700"
                    data-start="1800"
                    data-easing="easeOutBack">
                    <span>
                        <i class="ifc-smartphone_tablet"></i>
                    </span>
                </div>

                <div class="caption icons-2 sfb"
                    data-x="700"
                    data-y="200"
                    data-speed="700"
                    data-start="2000"
                    data-easing="easeOutBack">
                    <span>
                        <i class="ifc-date_to"></i>
                    </span>
                </div>

                <div class="caption icons-3 sfb"
                    data-x="800"
                    data-y="150"
                    data-speed="700"
                    data-start="2200"
                    data-easing="easeOutBack">
                    <span>
                        <i class="ifc-history"></i>
                    </span>
                </div>

            </li>



        </ul>

        </div><!-- end .fullwidthbanner -->
</div><!-- end .fullwidthbanner-container -->

<div style="height: 60px;"></div>

        <div class="row">
        	<div class="span12">

                <h3 class="headline">
                	<span>UBICACIÓN, LEVANTAMIENTO DE INFORMACIÓN Y DESARCHIVE DE PROCESOS JUDICIALES</span>
                </h3>

            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
        	<div class="span12">

                <p>Este servicio se ha desarrollado para clientes que necesitan
                  <b>UBICACIÓN DE PROCESOS</b> en los diferentes despachos judiciales.
                  A través de él se podrá identificar si su proceso se encuentra
                  <b>ACTIVO</b>, <b>INACTIVO</b>, <b>ARCHIVADO</b> o <b>TERMINADO</b> y se informará del
                  último movimiento notificado.</p>

                <p>Este servicio le permite además, corroborar los datos del
                  proceso, que generan una ventaja en la exactitud y en caso de
                  ser necesaria, corrección de los mismos evitando cualquier
                  tipo de vencimiento  en los términos. Además en esta modalidad
                  de servicio se ofrece el Levantamiento de Información,
                  consistente en verificar si existen procesos donde la Persona
                  Natural o Jurídica de interés; sea Actor Procesal.</p>

                <p><b>El CLIENTE</b> puede determinar como libre decisión, si
                  realizamos la gestión de desarchive de los procesos que se
                  reporten como archivados.</p>


            </div><!-- end span8 -->
            <!-- <div class="span4">

                <ul class="circle">
                	<li>Lorem ipsum dolor sit, consectetur </li>
                    <li>Proin eu sapien semper, consequat sapien</li>
                    <li>Nunc sit amet lectus vel dui ornare moli</li>
                </ul>

            </div> --><!-- end span4 -->
        </div><!-- end .row -->

        <div class="row">
        	<div class="span12">

                <h3 class="headline-2">
                	<span>Características principales</span>
                </h3>

            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
        	<div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-document"></i>

                    <div class="icon-box-content">

                        <h3>
                            ESTADO
                        </h3>

                        <p>Conocimiento del <b>estado actual</b> del proceso.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-search"></i>

                    <div class="icon-box-content">

                        <h3>
                            UBICACIÓN
                        </h3>

                        <p>Ubicación de procesos para evitar prescripción, perención o archivo de sus expedientes.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
        </div><!-- end .row -->

@include('partials.contactenos')

@stop

@section('customscript')
@stop
