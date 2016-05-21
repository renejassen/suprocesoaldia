<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="<?=URL::to('admin/inicio'); ?>">
                        <i class="fa fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                @if(Entrust::can('ver_clientes'))
                <li>
                    <a href="{{ URL::route('admin.clientes.index') }}" class="{{ Request::is('admin/clientes') || Request::is('admin/clientes/*') ? 'active' : ''; }}">
                        <i class="fa fa-gavel"></i>
                        <span>Clientes</span>
                    </a>
                </li>
                @endif
                <li class="sub-menu">
                    <a href="javascript:;" 
                        class="
                            {{ Request::is('admin/procesos') || Request::is('admin/procesos/*') || Request::is('admin/procesos.buscar') || Request::is('admin/procesos-generar-listado') ? 'active' : ''; }}
                        ">
                        <i class="fa fa-book"></i>
                        <span>Procesos</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('admin/procesos') || Request::is('admin/procesos.buscar') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.procesos.search') }}">Buscar proceso</a>
                        </li>
                        
                        @if(Entrust::can('crear_procesos'))
                        <li class="{{ Request::is('admin/procesos/create') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.procesos.create') }}">Crear proceso</a>
                        </li>
                        @endif

                        @if(Entrust::can('generar_listado_procesos'))
                        <li class="{{ Request::is('admin/procesos-generar-listado') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.procesos.list') }}">Generar Listado</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @if(Entrust::can('ver_cartelera'))
                @if(Auth::user()->tipo_id > 0)
                {{--*/ $cliente = Cliente::find(Auth::user()->tipo_id); /*--}}
                {{--*/ $servicios_cliente = $cliente->servicios()->get(); /*--}}
                @foreach ($servicios_cliente as $servicio)
                @if($servicio->id == 2)
                <li>
                    <a href="javascript:;" class="{{ Request::is('admin/carteleras') || Request::is('admin/carteleras/*') ? 'active' : ''; }}">
                        <i class="fa fa-columns"></i>
                        <span>Cartelera virtual</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('admin/carteleras-buscar') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.carteleras.search') }}">Buscar publicación</a>
                        </li>
                    </ul>
                </li>
                @endif
                @endforeach

                @else
                <li>
                    <a href="javascript:;" class="{{ Request::is('admin/carteleras') || Request::is('admin/carteleras/*') || Request::is('admin/carteleras-buscar') || Request::is('admin/carteleras-reporte') ? 'active' : ''; }}">
                        <i class="fa fa-columns"></i>
                        <span>Cartelera virtual</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('admin/carteleras-buscar') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.carteleras.search') }}">Buscar publicación</a>
                        </li>
                        <li class="{{ Request::is('admin/carteleras/create') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.carteleras.create') }}">Crear publicación</a>
                        </li>
                        <li class="{{ Request::is('admin/carteleras-reporte') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.carteleras.report') }}">Reporte</a>
                        </li>
                    </ul>
                </li>
                @endif
                @endif

                @if(Entrust::can('editar_servicios'))
                <li class="sub-menu">
                    <a href="javascript:;" 
                    class="
                        {{ Request::is('admin/servicios') || Request::is('admin/servicios/*') ? 'active' : ''; }}
                        {{ Request::is('admin/procesotipos') || Request::is('admin/procesotipos/*') ? 'active' : ''; }}
                        {{ Request::is('admin/departamentos') || Request::is('admin/departamentos/*') ? 'active' : ''; }}
                        {{ Request::is('admin/actuaciontipos') || Request::is('admin/actuaciontipos/*') ? 'active' : ''; }}
                        {{ Request::is('admin/publicaciones') || Request::is('admin/publicaciones/*') ? 'active' : ''; }}
                        {{ Request::is('admin/etapas') || Request::is('admin/etapas/*') ? 'active' : ''; }}
                    ">
                        <i class="fa fa-gear"></i>
                        <span>Configuración</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('admin/servicios') || Request::is('admin/servicios/*') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.servicios.index') }}">Servicios</a>
                        </li>
                        <li class="{{ Request::is('admin/departamentos') || Request::is('admin/departamentos/*') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.departamentos.index') }}">Departamentos</a>
                        </li>
                        <li class="{{ Request::is('admin/procesotipos') || Request::is('admin/procesotipos/*') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.procesotipos.index') }}">Tipos de proceso</a>
                        </li>
                        <li class="{{ Request::is('admin/publicaciones') || Request::is('admin/publicaciones/*') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.publicaciones.index') }}">Publicaciones</a>
                        </li>
                        <li class="{{ Request::is('admin/etapas') || Request::is('admin/etapas/*') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.etapas.index') }}">Etapas</a>
                        </li>
                        <li class="{{ Request::is('admin/actuaciontipos') || Request::is('admin/actuaciontipos/*') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.actuaciontipos.index') }}">Tipos de actuación</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Entrust::can('ver_usuarios'))
                <li>
                    <a href="javascript:;" class="
                    {{ Request::is('admin/users') || Request::is('admin/users/*') ||
                        Request::is('admin/roles') || Request::is('admin/roles/*') ? 'active' : ''; }}">
                        <i class="fa fa-user"></i>
                        <span>Accesos</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('admin/users') || Request::is('admin/users') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.users.index') }}">Usuarios</a>
                        </li>
                        
                        @if(Entrust::can('ver_roles'))
                        <li class="{{ Request::is('admin/roles') ? 'active' : ''; }}">
                            <a href="{{ URL::route('admin.roles.index') }}">Roles</a>
                        </li>
                        @endif
                        
                    </ul>
                </li>
                @endif
                <li>
                    <a href="<?=URL::to('admin/logout'); ?>">
                        <i class="fa fa-power-off"></i>
                        <span>Salir</span>
                    </a>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->