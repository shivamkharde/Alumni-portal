<?php
// db file already included in alumni > nav.php
// include event model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/event.php");
// include admin model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/admin.php");

// check if GET param is set
if(isset($_GET['id']) && $_GET['id'] != null){
    // sanitize get param
    $event_id = mysqli_escape_string($connection,$_GET['id']);
    // create event and admin class obj and pass connection
    $event  = new Events($connection);
    $admin = new Admin($connection);
    $single_event = $event->getSingleEventByEventId($event_id);
    $admin_details = $admin->getAdminByAdminId($single_event['admin_id']);
}else{
    header("Location: /views/alumni/events");
}
?>