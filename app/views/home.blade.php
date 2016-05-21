@extends('layouts.base')

@section('customstyle')
@stop

@section('content')
<div class="fullwidthbanner-container">
        <div class="fullwidthbanner">

                <ul>
                    <li data-transition="fade">

                        <img src="_content/index/slider/1920x547-1.jpg" alt="">

                        <div class="caption title sft"
                            data-x="0"
                            data-y="100"
                            data-speed="700"
                            data-start="2000"
                            data-easing="easeOutBack">
                            Vigilamos <strong>diaramente</strong><br>
                            sus procesos judiciales!
                        </div>

                        <div class="caption text sfl"
                            data-x="0"
                            data-y="250"
                            data-speed="700"
                            data-start="2500"
                            data-easing="easeOutBack">
                            Servicio de calidad en Asistencia en Audiencias, Auditoría, Vigilancia, control y seguimiento<br>
                            de procesos en Despachos Judiciales y en Superintendencias y Procuradurías.
                        </div>

                        <div class="caption icons-1 sfb"
                            data-x="0"
                            data-y="350"
                            data-speed="700"
                            data-start="2800"
                            data-easing="easeOutBack">
                            Notificaciones<br>vía E-mail
                            <span>
                                <i class="ifc-email"></i>
                            </span>
                        </div>

                        <div class="caption icons-2 sfb"
                            data-x="150"
                            data-y="350"
                            data-speed="700"
                            data-start="3000"
                            data-easing="easeOutBack">
                            Historial de <br>movimientos
                            <span>
                                <i class="ifc-opened_folder"></i>
                            </span>
                        </div>

                        <div class="caption icons-3 sfb"
                            data-x="300"
                            data-y="350"
                            data-speed="700"
                            data-start="3200"
                            data-easing="easeOutBack">
                            Fotos de <br>actuaciones
                            <span>
                                <i class="ifc-xlarge_icons"></i>
                            </span>
                        </div>

                        <div class="caption fade"
                            data-x="600"
                            data-y="0"
                            data-speed="700"
                            data-start="1600"
                            data-easing="easeOutBack">
                            <img src="_content/index/slider/slide-person-1.png" alt="">
                        </div>

                    </li>

                    <li data-transition="fade">

                        <img src="_content/index/slider/1920x547-1.jpg" alt="">

                        <div class="caption title sft"
                            data-x="150"
                            data-y="25"
                            data-speed="700"
                            data-start="1600"
                            data-easing="easeOutBack"
                            style="font-size:36px; text-align: center;">
                            Consulte la información de sus <br>procesos<span> desde cualquier disposittivo</span>
                        </div>

                        <div class="caption sfb"
                            data-x="250"
                            data-y="190"
                            data-speed="700"
                            data-start="2200"
                            data-easing="easeOutBack">
                            <img src="_content/index/slider/slide-3.png" alt="">
                        </div>

                        <div class="caption icons-1 alt sfl"
                            data-x="100"
                            data-y="300"
                            data-speed="700"
                            data-start="2800"
                            data-easing="easeOutBack">
                            Smartphones
                            <span>
                                <i class="ifc-two_smartphones"></i>
                            </span>
                        </div>

                        <div class="caption icons-2 alt sft"
                            data-x="700"
                            data-y="150"
                            data-speed="700"
                            data-start="3200"
                            data-easing="easeOutBack">
                            Tablets
                            <span>
                                <i class="ifc-ipad"></i>
                            </span>
                        </div>

                        <div class="caption icons-3 alt sfb"
                            data-x="800"
                            data-y="350"
                            data-speed="700"
                            data-start="3600"
                            data-easing="easeOutBack">
                            PCs
                            <span>
                                <i class="ifc-computer"></i>
                            </span>
                        </div>

                    </li>

                </ul>

        </div><!-- end .fullwidthbanner -->
        </div><!-- end .fullwidthbanner-container -->

@include('partials.contactenos')

        <div class="row">
            <div class="span4">

                <div class="icon-box-2">

                    <i class="ifc-email"></i>

                    <div class="icon-box-content">

                        <h3 class="text-uppercase text-center">
                            Aviso vía E-mail
                        </h3>

                        <p class="text-center">Reciba un correo electrónico
                          con el detalle de la actuación y el día en que el
                          movimiento procesal sucede.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-2 -->

            </div><!-- end .span4 -->
            <div class="span4">

                <div class="icon-box-2">

                    <i class="ifc-opened_folder"></i>

                    <div class="icon-box-content">

                        <h3 class="text-uppercase text-center">
                            Hoja de vida virtual
                        </h3>

                        <p class="text-center">Consulte desde su smartphone,
                          tablet o pc y en cualquier momento sus procesos y
                          el historial de movimientos de cada uno.</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-2 -->

            </div><!-- end .span4 -->
            <div class="span4">

                <div class="icon-box-2">

                    <i class="ifc-xlarge_icons"></i>

                    <div class="icon-box-content">

                        <h3 class="text-uppercase text-center">
                            Fotos de actuaciones
                        </h3>

                        <p class="text-center">Acceda en cualquier momento a
                          todas las fotos de la actuación procesal sin necesidad
                          de desplazarse al despacho judicial</p>

                    </div><!-- end .icon-box-content -->

                </div><!-- end .icon-box-2 -->

            </div><!-- end .span4 -->
        </div><!-- end .row -->
@stop

@section('customscript')
@stop
