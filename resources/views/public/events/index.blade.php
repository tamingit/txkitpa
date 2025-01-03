@extends('layouts.app')

@section('header_scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/theme.min.css" />
@stop

@section('content')

    @component('sections.breadcrumbs')
        @slot('title')
            Events Calendar
        @endslot
    @endcomponent

    @component('layouts.public-layout')
        @slot('content')
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id='events-calendar'></div>
                </div>
            </div>
        @endslot
    @endcomponent

@stop

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#events-calendar').fullCalendar({
                theme: true,
                prev: 'circle-triangle-w',
                next: 'circle-triangle-e',
                prevYear: 'seek-prev',
                nextYear: 'seek-next',
                height: 600,
                header: {
                    left: 'title',
                    right: 'prev, next today'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                        @foreach ($events as $event)
                    {
                        title: "{{ $event->event_type->event_type }}",
                        url: '/events/{{ $event->slug }}',
                        start: "{{ $event->starts_at->format('Y-m-d h:i') }}",
                        end: "{{ $event->stops_at->format('Y-m-d h:i') }}",
                        color: '#4264AA',
                        textColor: 'white',
                    },
                    @endforeach
                ]
            });
        });
    </script>
@stop