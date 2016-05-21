<!-- header start-->
<header class="header fixed-top clearfix">
    <div class="brand">

        <a href="#" class="logo">
            {{ HTML::image('admin/images/logo.png') }}
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <div class="top-nav clearfix">
	    <!--search & user info start-->
	    <ul class="nav pull-right top-menu">
	        <!-- user login dropdown start-->
	        <li class="dropdown">
	            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
	            	{{-- HTML::image('admin/images/avatar1_small.jpg') --}}
	            	{{-- <img alt="" src="images/avatar1_small.jpg"> --}}
	                <span class="username">{{ Auth::user()->first_name }}</span>
	                <b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu extended logout">
	                <li><a href="#"><i class=" fa fa-suitcase"></i>Perfil</a></li>
	                {{-- <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> --}}
	                <li><a href="{{ URL::route('admin.logout') }}"><i class="fa fa-key"></i> Salir</a></li>
	            </ul>
	        </li>
	        <!-- user login dropdown end -->
	    </ul>
	    <!--search & user info end-->
	</div>
</header>
<!--header end
