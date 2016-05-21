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
    <!-- <div id="page-header">

        <div class="row">
            <div class="span12">

                <h2>Servicios</h2>

            </div>
        </div>

    </div> -->

        <div class="row">
            <div class="span12">

                <h3 class="headline-2">
                    <span>Conoce nuestros servicios</span>
                </h3>

            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('servicio1') }}">SERVICIO DE REVISIÓN DE PROCESOS JUDICIALES</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->

            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('servicio2') }}">VIGILANCIA Y CONTROL DE PROCESOS JURÍDICOS</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->
        </div>
        <div class="row">
            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('servicio3') }}">UBICACIÓN, LEVANTAMIENTO DE INFORMACIÓN Y DESARCHIVE</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->

            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('servicio4') }}">FISCALIZACIÓN DE PROCESOS JUDICIALES</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->
        </div>
        <div class="row">
            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('servicio5') }}">ACOMPAÑAMIENTO A AUDIENCIAS JUDICIALES Y EXTRAJUDICIALES</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->

            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('servicio6') }}">RADICACIÓN DE DOCUMENTOS EN DESPACHOS</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->
        </div>
        <div class="row">
            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('servicio7') }}">SERVICIOS ADICIONALES</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->

            <div class="span6">

                <div class="icon-box-1">

                    <i class="ifc-scales_of_Balance"></i>

                    <div class="icon-box-content">

                        <h3>
                            <a href="{{ URL::route('cobertura') }}">COBERTURA</a>
                        </h3>

                        {{-- <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p> --}}

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span6 -->
        </div><!-- end .row -->

        <div class="row" style="height:100px;"></div>

@include('partials.contactenos')

@stop

@section('customscript')
@stop
