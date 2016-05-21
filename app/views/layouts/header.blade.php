    <div id="header">

        <div class="row">
            <div class="span3">
                <a href="{{ URL::route('home') }}" id="logo">
                    <img src="_layout/images/logo.png" alt="" class="responsive-img">
                </a>
            </div>

            <div class="span9">
                <!-- // Mobile menu trigger // -->
                <a href="#" id="mobile-menu-trigger">
                    <i class="fa fa-bars"></i>
                </a>

                <!-- // Menu // -->
                <ul class="sf-menu" id="menu">
                    <li class="{{ Request::is('/') ? 'current' : ''; }}">
                        <a href="{{ URL::route('home') }}">Inicio</a>
                    </li>
                    <li class="{{ Request::is('quienes-somos') ? 'current' : ''; }}">
                        <a href="{{ URL::route('quienes') }}">Quiénes somos</a>
                    </li>
                    <li class="{{ Request::is('servicios') || Request::is('servicios/*') ? 'current' : ''; }}">
                        <a href="{{ URL::route('servicios') }}">Servicios</a>
                        <ul>
                        <li><a href="{{ URL::route('servicio1') }}">Servicio de revisión de procesos judiciales</a></li>
                        <li><a href="{{ URL::route('servicio2') }}">Vigilancia y control de procesos jurídicos</a></li>
                        <li><a href="{{ URL::route('servicio3') }}">Ubicación, levantamiento de información y desarchive de procesos judiciales</a></li>
                        <li><a href="{{ URL::route('servicio4') }}">Auditoría de procesos judiciales</a></li>
                        <li><a href="{{ URL::route('servicio5') }}">Acompañamiento a audiencias judiciales y extrajudiciales</a></li>
                        <li><a href="{{ URL::route('servicio6') }}">Radicación de documentos en despachos judiciales</a></li>
                        <li><a href="{{ URL::route('servicio7') }}">Servicios adicionales</a></li>
                        <li><a href="{{ URL::route('cobertura') }}">Cobertura</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('cobertura') ? 'current' : ''; }}">
                        <a href="{{ URL::route('cobertura') }}">Cobertura</a>
                    </li>
                    <li class="{{ Request::is('contactenos') ? 'current' : ''; }}"><a href="{{ URL::route('contactenos') }}">Contáctenos</a></li>
                    <li><a href="{{ URL::route('admin.login') }}" target="_self"><i class="ifc-user_male2"></i> Ingresar</a></li>
                </ul>
            </div>
        </div>

    </div>
