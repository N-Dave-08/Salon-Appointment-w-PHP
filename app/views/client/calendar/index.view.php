<?php include PATH . "client/partials/header.php"; ?>



<style>

    #calendar {
        height: calc(100vh - 20px);
        overflow: hidden;
        width: 1200px;
    }

    .container {
        height: 100%;
    }

    .fc-sunday {
        background-color: #ffcfcf;
    }
</style>

<body>
    <div id="calendar" class="container bg-white shadow mt-4 p-4"></div>

    <script>
        $(document).ready(function() {
            var events = <?php echo json_encode($events); ?>;

            // console.log(events);

            function adjustCalendarHeight() {
                var windowHeight = $(window).height();
                var calendarHeight = windowHeight - $('#calendar').offset().top - 20;
                $('#calendar').fullCalendar('option', 'height', calendarHeight);
            }

            $('#calendar').fullCalendar({
                
                defaultView: 'month',
                editable: false,
                eventLimit: true,
                events: events,
                eventRender: function(event, element) {
                    if (event.title) {
                        element.find('.fc-title').html(event.title);
                    }
                },
                dayRender: function(date, cell) {
                    if (date.day() === 0) { // 0 is Sunday
                        cell.addClass('fc-sunday');
                    }
                },
                height: function() {
                    return $(window).height() - $('#calendar').offset().top - 20;
                }
            });

            $(window).resize(function() {
                adjustCalendarHeight();
            });

            adjustCalendarHeight();
        });
    </script>
    <script>
        const pathname = window.location.pathname;
        const pagename = pathname.split("/").pop();

        console.log(pagename);
        if (pagename === 'calendar') {
            document.querySelector(".calendar").classList.add('active');
        }
    </script>
</body>