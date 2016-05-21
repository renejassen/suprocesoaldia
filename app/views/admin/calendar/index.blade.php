@extends('admin.layouts.base')

@section('customstyle')
  {{ HTML::style('admin/assets/fullcalendar/fullcalendar.css'); }}
  {{ HTML::style('admin/assets/fullcalendar/fullcalendar.print.css', array('media' => 'print')); }}
  <style>

  	body {
  		margin: 40px 10px;
  		padding: 0;
  		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  		font-size: 14px;
  	}

  	#calendar {
  		max-width: 900px;
  		margin: 0 auto;
  	}

  </style>
@stop

@section('customscript')
  {{ HTML::script('admin/assets/fullcalendar/lib/moment.min.js'); }}
  {{ HTML::script('admin/assets/fullcalendar/lib/jquery.min.js'); }}
  {{ HTML::script('admin/assets/fullcalendar/fullcalendar.min.js'); }}
  <script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
      header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2016-05-12',
      defaultView: 'agendaWeek',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events:[ {{ trim(json_encode($audiencias), '[]') }} ]
		});

	});

</script>
@stop

@section('content')
  <div id='calendar'></div>
@stop
