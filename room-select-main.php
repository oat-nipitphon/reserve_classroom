<?php
    session_start();
    include('connect.php');
    include('layouts/headen.php');
    $id_user = $_SESSION['id'];
    $username = $_SESSION['username'];
    $status_user = $_SESSION['status_user'];

    // Check if the user is logged in
    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }
    $code_room = $_POST['code_room'];
?>

<div class="row">
    <div class="row animated fadeInDown">
        <!-- <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Draggable Events</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="external-events">
                        <p>Drag a event and drop into callendar.</p>
                        <div class="external-event navy-bg ui-draggable ui-draggable-handle" style="position: relative;">Go to shop and buy some products.</div>
                        <div class="external-event navy-bg ui-draggable ui-draggable-handle" style="position: relative;">Check the new CI from Corporation.</div>
                        <div class="external-event navy-bg ui-draggable ui-draggable-handle" style="position: relative;">Send documents to John.</div>
                        <div class="external-event navy-bg ui-draggable ui-draggable-handle" style="position: relative;">Phone to Sandra.</div>
                        <div class="external-event navy-bg ui-draggable ui-draggable-handle" style="position: relative;">Chat with Michael.</div>
                        <p class="m-t">
                            <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" id="drop-remove" class="i-checks" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="drop-remove">remove after drop</label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>FullCalendar</h2> is a jQuery plugin that provides a full-sized, drag &amp; drop calendar like the one below. It uses AJAX to fetch events on-the-fly for each month and is
                    easily configured to use your own feed format (an extension is provided for Google Calendar).
                    <p>
                        <a href="http://arshaw.com/fullcalendar/" target="_blank">FullCalendar documentation</a>
                    </p>
                </div>
            </div>
        </div> -->
        <div class="col-lg-10 col-md-offset-1" style="margin-top: 35px;">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Striped Table</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>December 2023</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header" style="border-right-width: 1px; margin-right: -1.25px;"><table><thead><tr><th class="fc-day-header fc-widget-header fc-sun">Sun</th><th class="fc-day-header fc-widget-header fc-mon">Mon</th><th class="fc-day-header fc-widget-header fc-tue">Tue</th><th class="fc-day-header fc-widget-header fc-wed">Wed</th><th class="fc-day-header fc-widget-header fc-thu">Thu</th><th class="fc-day-header fc-widget-header fc-fri">Fri</th><th class="fc-day-header fc-widget-header fc-sat">Sat</th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden scroll; height: 598.438px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content" style="height: 99px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2023-11-26"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2023-11-27"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2023-11-28"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2023-11-29"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2023-11-30"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2023-12-01"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2023-12-02"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-other-month fc-past" data-date="2023-11-26">26</td><td class="fc-day-number fc-mon fc-other-month fc-past" data-date="2023-11-27">27</td><td class="fc-day-number fc-tue fc-other-month fc-past" data-date="2023-11-28">28</td><td class="fc-day-number fc-wed fc-other-month fc-past" data-date="2023-11-29">29</td><td class="fc-day-number fc-thu fc-other-month fc-past" data-date="2023-11-30">30</td><td class="fc-day-number fc-fri fc-past" data-date="2023-12-01">1</td><td class="fc-day-number fc-sat fc-past" data-date="2023-12-02">2</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div></a></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 99px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2023-12-03"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2023-12-04"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2023-12-05"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2023-12-06"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2023-12-07"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2023-12-08"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2023-12-09"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-past" data-date="2023-12-03">3</td><td class="fc-day-number fc-mon fc-past" data-date="2023-12-04">4</td><td class="fc-day-number fc-tue fc-past" data-date="2023-12-05">5</td><td class="fc-day-number fc-wed fc-past" data-date="2023-12-06">6</td><td class="fc-day-number fc-thu fc-past" data-date="2023-12-07">7</td><td class="fc-day-number fc-fri fc-past" data-date="2023-12-08">8</td><td class="fc-day-number fc-sat fc-past" data-date="2023-12-09">9</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 99px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2023-12-10"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2023-12-11"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2023-12-12"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2023-12-13"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2023-12-14"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2023-12-15"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2023-12-16"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-past" data-date="2023-12-10">10</td><td class="fc-day-number fc-mon fc-past" data-date="2023-12-11">11</td><td class="fc-day-number fc-tue fc-past" data-date="2023-12-12">12</td><td class="fc-day-number fc-wed fc-past" data-date="2023-12-13">13</td><td class="fc-day-number fc-thu fc-past" data-date="2023-12-14">14</td><td class="fc-day-number fc-fri fc-past" data-date="2023-12-15">15</td><td class="fc-day-number fc-sat fc-past" data-date="2023-12-16">16</td></tr></thead><tbody><tr><td rowspan="2"></td><td rowspan="2"></td><td class="fc-event-container" colspan="3"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Long Event</span></div></a></td><td rowspan="2"></td><td rowspan="2"></td></tr><tr><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 99px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-today fc-state-highlight" data-date="2023-12-17"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2023-12-18"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2023-12-19"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2023-12-20"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2023-12-21"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2023-12-22"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2023-12-23"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-today fc-state-highlight" data-date="2023-12-17">17</td><td class="fc-day-number fc-mon fc-future" data-date="2023-12-18">18</td><td class="fc-day-number fc-tue fc-future" data-date="2023-12-19">19</td><td class="fc-day-number fc-wed fc-future" data-date="2023-12-20">20</td><td class="fc-day-number fc-thu fc-future" data-date="2023-12-21">21</td><td class="fc-day-number fc-fri fc-future" data-date="2023-12-22">22</td><td class="fc-day-number fc-sat fc-future" data-date="2023-12-23">23</td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday Party</span></div></a></td><td rowspan="2"></td><td rowspan="2"></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div></a></td><td rowspan="2"></td><td rowspan="2"></td></tr><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 99px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2023-12-24"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2023-12-25"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2023-12-26"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2023-12-27"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2023-12-28"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2023-12-29"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2023-12-30"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2023-12-24">24</td><td class="fc-day-number fc-mon fc-future" data-date="2023-12-25">25</td><td class="fc-day-number fc-tue fc-future" data-date="2023-12-26">26</td><td class="fc-day-number fc-wed fc-future" data-date="2023-12-27">27</td><td class="fc-day-number fc-thu fc-future" data-date="2023-12-28">28</td><td class="fc-day-number fc-fri fc-future" data-date="2023-12-29">29</td><td class="fc-day-number fc-sat fc-future" data-date="2023-12-30">30</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" href="http://google.com/"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 103px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2023-12-31"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2024-01-01"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2024-01-02"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2024-01-03"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2024-01-04"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2024-01-05"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-01-06"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2023-12-31">31</td><td class="fc-day-number fc-mon fc-other-month fc-future" data-date="2024-01-01">1</td><td class="fc-day-number fc-tue fc-other-month fc-future" data-date="2024-01-02">2</td><td class="fc-day-number fc-wed fc-other-month fc-future" data-date="2024-01-03">3</td><td class="fc-day-number fc-thu fc-other-month fc-future" data-date="2024-01-04">4</td><td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2024-01-05">5</td><td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2024-01-06">6</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });


    });

</script>
<?php
    include('layouts/footer.php');
?>