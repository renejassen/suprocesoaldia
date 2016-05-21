<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="javier varon">
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
    <title>Suprocesoaldia.com</title>
    <!--Core CSS -->
    {{HTML::style('admin/bs3/css/bootstrap.min.css');}}
    {{HTML::style('admin/assets/jquery-ui/jquery-ui-1.10.1.custom.min.css');}}
    {{HTML::style('admin/css/bootstrap-reset.css');}}
    {{HTML::style('admin/assets/font-awesome/css/font-awesome.css');}}
    {{HTML::style('admin/assets/jvector-map/jquery-jvectormap-1.2.2.css');}}
    {{HTML::style('admin/css/clndr.css');}}
    {{HTML::style('admin/assets/css3clock/css/style.css');}}
    {{HTML::style('admin/assets/morris-chart/morris.css');}}
    {{HTML::style('admin/css/style.css');}}
    {{HTML::style('admin/css/style-responsive.css');}}
    @section('customstyle')
      <!--This is the master header.-->
    @show
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container">
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
            @yield('content')
    </section>
</section>
<!--main content end-->
@include('admin.layouts.rightsidebar')
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
{{HTML::script('admin/js/lib/jquery.js');}}
{{HTML::script('admin/bs3/js/bootstrap.min.js');}}
{{HTML::script('admin/js/accordion-menu/jquery.dcjqaccordion.2.7.js');}}
{{HTML::script('admin/js/scrollTo/jquery.scrollTo.min.js');}}
{{HTML::script('admin/assets/jQuery-slimScroll-1.3.0/jquery.slimscroll.js');}}
{{HTML::script('admin/js/nicescroll/jquery.nicescroll.js');}}
<!--Easy Pie Chart-->
{{HTML::script('admin/assets/easypiechart/jquery.easypiechart.js');}}
<!--Sparkline Chart-->
{{HTML::script('admin/assets/sparkline/jquery.sparkline.js');}}
<!--jQuery Flot Chart-->
{{HTML::script('admin/assets/flot-chart/jquery.flot.js');}}
{{HTML::script('admin/assets/flot-chart/jquery.flot.tooltip.min.js');}}
{{HTML::script('admin/assets/flot-chart/jquery.flot.resize.js');}}
{{HTML::script('admin/assets/flot-chart/jquery.flot.pie.resize.js');}}
<!--common script init for all pages-->
{{HTML::script('admin/js/scripts.js');}}

@section('customscript')
@show
</body>
</html>