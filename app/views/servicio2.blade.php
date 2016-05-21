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
                    <span>VIGILANCIA Y CONTROL DE PROCESOS JURÍDICOS</span>
                </h3>

            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
            <div class="span12">

                <p>suprocesoaldia.com visitará diariamente los despachos judiciales
                  donde se encuentren los procesos sugeridos para seguimiento, garantizando
                  así que la información en la plataforma web y móvil se encuentre cargada.
                  Los ESTADOS, TRASLADOS, EDICTOS DE SENTENCIA, EDICTOS EMPLAZATORIOS,
                  AVISOS DE REMATE, FIJACIONES EN LISTA o cualquier otra información
                  que sea requerida por parte del cliente tendrá a su vez, actualización
                  de 24 horas, con su respectiva copia en PDF y soporte visual.</p>

                  <p>
                    En los municipios donde la revisión no sea diaria, la información
                    será enviada el día de visita, informando todos los movimientos
                    que existieron desde el último día que se realizó la vigilancia.
                    El horario de Visitas se puede visualizar en la cobertura adjunta.
                    CONSULTE SU AGENDA VIRTUAL CON LA PROGRAMACIÓN DE SUS AUDIENCIAS.
                  </p>

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
            <div class="span4">

                <div class="icon-box-1">

                    <i class="ifc-email"></i>

                    <div class="icon-box-content">

                        <h3>
                            AVISO VIA E-MAIL
                        </h3>

                        <p>Sin moverse de la comodidad de su oficina  vía E-mail conozca el mismo día los procesos de
                        su interés que tuvieron movimiento con la información completa del mismo.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
            <div class="span4">

                <div class="icon-box-1">

                    <i class="ifc-folder"></i>

                    <div class="icon-box-content">

                        <h3>
                            HOJA DE VIDA VIRTUAL
                        </h3>

                        <p>Mantenga un historial de cada uno de sus procesos documentado virtualmente, sin necesidad de
                        tener un software especial, sino con acceso desde cualquier equipo o móvil.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
            <div class="span4">

                <div class="icon-box-1">

                    <i class="ifc-calendar"></i>

                    <div class="icon-box-content">

                        <h3>
                            AGENDA VIRTUAL
                        </h3>

                        <p>Consulte su Agenda Virtual con la programación de sus Audiencias.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-1 -->

            </div><!-- end .span4 -->
        </div><!-- end .row -->

@include('partials.contactenos')

@stop

@section('customscript')
@stop
