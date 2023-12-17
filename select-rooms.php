<?php
session_start();
include 'connect.php';
include 'layouts/headen.php';
$id_user = $_SESSION['id'];
$username = $_SESSION['username'];
$status_user = $_SESSION['status_user'];

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id'];?>">
    </div>
    <div id='calendar'></div>
</div>


<script src="node_modules/@fullcalendar/core"></script>
<script src="node_modules/@fullcalendar/daygrid"></script>
<script src="node_modules/fullcalendar/index.global.min.js"></script>

<script src='node_modules/@fullcalendar/core/index.global.min.js'></script>
<script src='node_modules/@fullcalendar/daygrid/index.global.min.js'></script>
<script src='node_modules/@fullcalendar/adaptive'></script>

<script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var id_user = $('#id_user').val();
        console.log(id_user);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',

            events: [{
                    title: 'Event 1',
                    start: '2023-12-01',
                    url: 'https://example.com/event1'


                },
                {
                    title: 'Event 2',
                    start: '2023-12-05',
                    url: 'https://example.com/event2'
                }
            ],

            // eventClick: function(event) {
            // // Open the URL in the same window/tab
            // window.location.href = event.url;
            // }
        });
        calendar.render();
    });
</script>
<?php
include 'layouts/footer.php';
?>
