<!-- get all the alumnis here -->
<?php
// db file already included in admin > nav.php
// include event model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/event_request.php");

$error="";
// create event class obj and pass connection
$event_request  = new EventRequest($connection);
$event_requests = $event_request->getAllEventRequestsById($_SESSION['college_data']['id']);
// check if we got event_requests otherwise input an error
if($event_requests==null){
    $error= "No Event Requests Found";
}
?>