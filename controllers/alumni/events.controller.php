<?php
// db file already included in alumni > nav.php
// include event model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/event.php");

// create event class obj and pass connection
$event  = new Events($connection);
$events = $event->getAllEventsByCollegeId($_SESSION['college_data']['id']);
?>