@extends('layouts.base')

@section('customstyle')
<style>

</style>
@stop
{{--AIzaSyB8SVgVnCw10r8BJdgtxgG2rs-_gqdLZxo --}}
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
                    Nuestra <strong>Cobertura</strong>
                </h1>

                <div class="caption text sfb"
                    data-x="0"
                    data-y="320"
                    data-speed="700"
                    data-start="1500"
                    data-easing="easeOutBack">
                    Ofrecemos una amplia cobertura nacional en las siguientes ciudades:
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

        <div class="row">
        	<div class="span12">

                <h3 class="headline">
                	<span>Cobertura</span>
                </h3>

            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
        	<div class="span8">

                <p>Ofrecemos una amplia cobertura nacional en las siguientes ciudades:</p>

                {{-- <ul class="circle"> <li>ABEJORRAL</li> <li>APARTADO</li> <li>BARBOSA</li> <li>BELLO</li> <li>CALDAS</li> <li>CAUCASIA</li> <li>COPACABANA</li> <li>EL CARMEN DE VIBORAL</li> <li>ENVIGADO</li> <li>FRONTINO</li> <li>GIRARDOTA</li> <li>ITAGUI</li> <li>LA CEJA</li> <li>LA ESTRELLA</li> <li>LA UNION</li> <li>MEDELLIN</li> <li>RETIRO</li> <li>RIONEGRO</li> <li>SABANETA</li> <li>SANTA ROSA DE OSOS</li> <li>SEGOVIA</li> <li>TAMESIS</li> <li>TURBO</li> <li>BARRANQUILLA</li> <li>BOGOTA</li> <li>CARTAGENA</li> <li>TUNJA</li> <li>MANIZALES</li> <li>SOACHA</li> <li>ZIPAQUIRA</li> <li>SANTA MARTA</li> <li>VILLAVICENCIO</li> <li>ARMENIA</li> <li>DOSQUEBRADAS</li> <li>LA VIRGINIA</li> <li>PEREIRA</li> <li>SANTUARIO</li> <li>BARRANCABERMEJA</li> <li>BUCARAMANGA</li> <li>CALI</li> <li>PALMIRA</li> <li>TULUA</li> </ul>
                --}}

            </div><!-- end span8 -->
        </div><!-- end .row -->

        <div class="row">
            <div class="span4">
                <ul class="circle">
                    <li>Aguachica - Cesar</li>
                    <li>Armenia – Quindío</li>
                    <li>Barrancabermeja – Santander</li>
                    <li>Bucaramanga – Santander</li>
                    <li>Buga – Valle del Cauca</li>
                    <li>Cali – Valle del Cauca</li>
                    <li>Carepa – Antioquia</li>
                    <li>Cartagena – Bolívar</li>
                    <li>Cúcuta – Norte de Santander</li>

                </ul>
            </div>
            <div class="span4">
                <ul class="circle">
                    <li>Ibagué - Tolima</li>
                    <li>Facatativá – Cundinamarca</li>
                    <li>Funza – Cundinamarca</li>
                    <li>Cota – Cundinamarca</li>
                    <li>Florencia – Caquetá</li>
                    <li>Girardot – Cundinamarca</li>
                    <li>Manizales – Caldas</li>
                    <li>Medellín – Antioquia</li>
                    <li>Montería – Córdoba</li>
                </ul>
            </div>
            <div class="span4">
                <ul class="circle">
                    <li>Neiva – Huila</li>
                    <li>Pasto – Nariño</li>
                    <li>Popayán – Cauca</li>
                    <li>Puerto Asís – Putumayo</li>
                    <li>Soacha – Cundinamarca</li>
                    <li>San Agustín – Huila</li>
                    <li>Tunja - Boyacá</li>
                    <li>Villavicencio – Meta</li>
                    <li>Yopal - Casanare</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <div id="map"></div>
                <script>

                    var map;
                    function initMap() {
                      map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: -34.397, lng: 150.644},
                        zoom: 8
                      });
                    }

                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8SVgVnCw10r8BJdgtxgG2rs-_gqdLZxo"
                    async defer></script>
            </div>
        </div>

@include('partials.contactenos')

@stop

@section('customscript')
@stop
