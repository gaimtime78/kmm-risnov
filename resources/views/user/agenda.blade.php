@extends('layout.user')

@section('css')
    <link type="text/css" href="{{ asset('calendar\lib\main.css') }}" rel="stylesheet" />
    <style>
        #top {
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            font-size: 12px;
        }

        #calendar {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 10px;
        }

        .tooltip-inner {
            max-width: 768px !important;
        }

    </style>

@endsection

@section('content')
    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Agenda</h3>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section gb nopadtop">
        <div class="container">
            <div class="boxed boxedp4">
                <div id='top'>

                    Locales:
                    <select id='locale-selector'></select>

                </div>

                <div id='calendar'></div>
                <div id="thumbnailcard">
                    
                </div>
            </div><!-- end boxed -->
        </div><!-- end container -->
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('calendar\lib\main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tooltip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar\lib\locales-all.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var initialLocaleCode = 'en';
            var localeSelectorEl = document.getElementById('locale-selector');
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                locale: initialLocaleCode,
                buttonIcons: false, // show the prev/next text
                weekNumbers: false,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: '/id/get_agendas',
                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                    if (info.event.url) {
                        window.open(info.event.url);
                    }
                },
                displayEventTime: false,
                eventDidMount: function(info) {
                    $(info.el).tooltip({
                        title: '<div class="card"> <img class="card-img-top" width="auto" height="120px" id="gambarthumbnail" src="{{ URL::asset("/upload/agenda") }}' + '/' + info.event.extendedProps.img + '" alt="thumbnail"> <div class="card-body"> <p class="card-text">' + info.event.extendedProps.description + '</p> </div> </div>',
                        placement: 'bottom',
                        trigger: 'hover',
                        html: true
                    })
                }
            });

            calendar.render();

            // build the locale selector's options
            calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                var optionEl = document.createElement('option');
                optionEl.value = localeCode;
                optionEl.selected = localeCode == initialLocaleCode;
                optionEl.innerText = localeCode;
                localeSelectorEl.appendChild(optionEl);
            });

            // when the selected option changes, dynamically change the calendar option
            localeSelectorEl.addEventListener('change', function() {
                if (this.value) {
                    calendar.setOption('locale', this.value);
                }
            });

        });
    </script>
@endsection
