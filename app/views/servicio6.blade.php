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
                	<span>RADICACIÓN DE DOCUMENTOS EN DESPACHOS</span>
                </h3>

            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
        	<div class="span12">

                <p>Oportunamente, con agilidad y eficacia prestamos el servicio
                  importante de radicación de documentos en los diferentes
                  despachos judiciales, Superintendencias y Procuradurías
                  (memoriales, demandas, tutelas) en las ciudades y municipios
                  de nuestra cobertura, conforme a los procesos establecidos para ello.</p>


            </div><!-- end span8 -->
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

                    <i class="ifc-motorcycle"></i>

                    <div class="icon-box-content">

                        <h3>
                            MENSAJERÍA
                        </h3>

                        <p>Servicio de mensajería judicial personalizada para mayores resultados de su Gestión.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-clock"></i>

                    <div class="icon-box-content">

                        <h3>
                            OPTIMICE SU TIEMPO
                        </h3>

                        <p>Evite turnos de espera optimizando su tiempo profesional.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
        </div><!-- end .row -->

@include('partials.contactenos')

@stop

@section('customscript')
@stop
