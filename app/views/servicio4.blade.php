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
                	<span>AUDITORÍA DE PROCESOS JUDICIALES</span>
                </h3>

            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
        	<div class="span12">

                <p>Este servicio le permite al cliente hacer una <strong>auditoría de
                  sus procesos</strong>, consistente en el resumen minucioso de cada una
                  de las etapas procesales y las actuaciones que la conforma,
                  de cada uno de los procesos que el cliente requiera.
                  Este servicio es una herramienta profesional importante
                  ya que les permite conocer el estado actual y real de los
                  procesos para tomar decisiones, evaluar los abogados externos,
                  y/o evitar prescripciones, desistimientos tácitos, perención
                  de los procesos  o archivo de sus expedientes.</p>


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

                    <i class="ifc-variable"></i>

                    <div class="icon-box-content">

                        <h3>
                            VERIFICACIÓN ESTADO
                        </h3>

                        <p>Herramienta importante cuando se reciben nuevos casos para verificar el estado procesal real en que
                        se están recibiendo los mismos.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-workflow"></i>

                    <div class="icon-box-content">

                        <h3>
                            INFORMACIÓN CLARA
                        </h3>

                        <p>Información clara para toma decisiones procesales</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
        </div><!-- end .row -->

@include('partials.contactenos')

@stop

@section('customscript')
@stop
