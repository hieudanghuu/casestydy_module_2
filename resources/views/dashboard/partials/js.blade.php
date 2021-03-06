
<script src="{{asset('minishop/cooladmin/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('minishop/cooladmin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{asset('minishop/cooladmin/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/counter-up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/select2/select2.min.js')}}"></script>
{{--<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>--}}
@yield('jsHeader')
<!-- full calendar requires moment along jquery which is included above -->
<script src="{{asset('minishop/cooladmin/vendor/fullcalendar-3.10.0/lib/moment.min.js')}}"></script>
<script src="{{asset('minishop/cooladmin/vendor/fullcalendar-3.10.0/fullcalendar.js')}}"></script>
<!-- Main JS-->
<script src="{{asset('minishop/cooladmin/js/main.js')}}"></script>

<script type="text/javascript">
    $(function() {
        // for now, there is something adding a click handler to 'a'
        var tues = moment().day(2).hour(19);

        // build trival night events for example data
        var events = [
            {
                title: "Special Conference",
                start: moment().format('YYYY-MM-DD'),
                url: '#'
            },
            {
                title: "Doctor Appt",
                start: moment().hour(9).add(2, 'days').toISOString(),
                url: '#'
            }

        ];

        var trivia_nights = []

        for(var i = 1; i <= 4; i++) {
            var n = tues.clone().add(i, 'weeks');
            console.log("isoString: " + n.toISOString());
            trivia_nights.push({
                title: 'Trival Night @ Pub XYZ',
                start: n.toISOString(),
                allDay: false,
                url: '#'
            });
        }

        // setup a few events
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            events: events.concat(trivia_nights)
        });
    });
</script>

<!-- end document-->
