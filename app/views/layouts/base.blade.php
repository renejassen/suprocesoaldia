<!DOCTYPE html>
<html class="no-js">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,requiresActiveX=true">


<title> suprocesoaldia.com </title>
<meta name="description" content="Procesos jurídicos">
<meta name="author" content="suprocesoaldia.com">

<!-- /// Favicons ////////  -->
<link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon-16x16.png') }}">
<link rel="manifest" href="{{ URL::asset('manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="_layout/css/base.css">
<link rel="stylesheet" href="_layout/css/grid.css">
<link rel="stylesheet" href="_layout/css/elements.css">
<link rel="stylesheet" href="_layout/css/layout.css">

<!-- <link rel="stylesheet" href="_layout/css/boxed.css" name="layout"> -->

<link rel="stylesheet" href="_layout/js/revolutionslider/css/settings.css">
<link rel="stylesheet" href="_layout/js/revolutionslider/css/custom.css">
<link rel="stylesheet" href="_layout/js/bxslider/jquery.bxslider.css">
<link rel="stylesheet" href="_layout/js/magnificpopup/magnific-popup.css">

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
<link rel="stylesheet" href="_layout/css/iconfontcustom/iconfontcustom.css">
<link rel="stylesheet" href="_layout/css/fontawesome/font-awesome.min.css">
<link rel="stylesheet" href="_layout/css/animate/animate.min.css">
<script src="_layout/js/modernizr-2.6.2.min.js"></script>
<meta name="google-site-verification" content="yKlkOyx98TRVfM5Ad_rkpwJSX9fjCRMNXCFENaIARwE" />
</head>
<body>

<!--[if lte IE 8]>
<p class="browser-update">
You are using an <strong>outdated</strong> browser. Please
<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">upgrade your browser</a>
to improve your experience.
</p>
<![endif]-->

<div id="wrap">

    @include('layouts.header')

    <div id="content">

        @yield('content')

    </div><!-- end #content -->

    @include('layouts.footer')

</div><!-- end #wrap -->

<script src="_layout/js/jquery-2.1.0.min.js"></script>
<script src="_layout/js/viewport/jquery.viewport.js"></script>
<script src="_layout/js/easing/jquery.easing.1.3.js"></script>
<script src="_layout/js/simpleplaceholder/jquery.simpleplaceholder.js"></script>
<script src="_layout/js/fitvids/jquery.fitvids.js"></script>
<script src="_layout/js/superfish/hoverIntent.js"></script>
<script src="_layout/js/superfish/superfish.js"></script>
<script src="_layout/js/revolutionslider/pluginsources/jquery.themepunch.plugins.min.js"></script>
<script src="_layout/js/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>
<script src="_layout/js/bxslider/jquery.bxslider.min.js"></script>
<script src="_layout/js/magnificpopup/jquery.magnific-popup.min.js"></script>
<script src="_layout/js/parallax/jquery.parallax.min.js"></script>
<!--<script src="_layout/js/easypiechart/jquery.easypiechart.min.js"></script>-->
<script src="_layout/js/easytabs/jquery.easytabs.min.js"></script>
<script src="_layout/js/jqueryvalidate/jquery.validate.min.js"></script>
<script src="_layout/js/jqueryform/jquery.form.min.js"></script>
<!--<script src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
<!--<script src="_layout/js/gmap/jquery.gmap.min.js"></script>-->
<script src="_layout/js/plugins.js"></script>
<script src="_layout/js/scripts.js"></script>

</body>
</html>
