<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="suprocesoaldia">
    <meta name="author" content="suprocesoaldia.com">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Inciar Sesión</title>

    <!--Core CSS -->
    {{ HTML::style('admin/bs3/css/bootstrap.min.css') }}
    {{ HTML::style('admin/css/bootstrap-reset.css') }}
    {{ HTML::style('admin/assets/font-awesome/css/font-awesome.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('admin/css/style.css') }}
    {{ HTML::style('admin/css/style-responsive.css') }}

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>{{ HTML::script('js/ie8/ie8-responsive-file-warning.js') }}<![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv..js') }}
    {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">
        {{ Form::open(array('route' => 'admin.login.post', 'class' => 'form-signin')) }}
        <h2 class="form-signin-heading">SU PROCESO AL DÍA</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                @if(Session::has('message_fail'))
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>¡Lo sentimos!</strong> Usuario y contraseña incorrectos.
                </div>
                @endif
                @if(Session::has('message_suspended'))
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Lo sentimos!</strong> Este usuario se encuentra suspendido. Comúniquese con nosotros para reactivar el servicio
                </div>
                @endif
                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                    {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
                    {{ $errors->first('email', '<p class="help-block">:message</p>') }}
                </div>
                <div class="form-group {{ $errors->first('password', 'has-error') }}">
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
                    {{ $errors->first('password', '<p class="help-block">:message</p>') }}
                </div>
            </div>
            <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me" value="1"> Recordarme
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> ¿Olvidaste tu contraseña?</a>

                </span>
            </label> -->
            <button class="btn btn-lg btn-login btn-block" type="submit">Ingresar</button>

            <div class="registration">
                © 2014 - Desarrollado por
                <a class="" href="http://www.frailecillo.co" target="_blank">
                    frailecillo.co
                </a>
            </div>

        </div>

      {{ Form::close() }}

    </div>
    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    {{ HTML::script('admin/js/lib/jquery.js') }}
    {{ HTML::script('admin/bs3/js/bootstrap.min.js') }}
    <!-- {{ HTML::script('js/ajaxlogin.js') }} -->

  </body>
</html>
