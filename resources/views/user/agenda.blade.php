@extends('layout.user')

@section('css')
    <link type="text/css" href="{{ asset('calendar\lib\main.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('calendar\lib\main.js') }}"></script>
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
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: '/id/get_agendas',
                eventClick: function(info) {
                    alert('Agenda: ' + info.event.title + ' akan membuka tab baru');
                    // change the border color just for fun
                    info.el.style.borderColor = 'red';
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
            </div><!-- end boxed -->
        </div><!-- end container -->
    </section>
@endsection

@section('js')

@endsection
