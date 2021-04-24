<!-- get all the new alumni registrations here -->
<?php
// db file already included in admin > nav.php
// include alumni model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/alumni.php");

$error="";
// create event class obj and pass connection
$alumni  = new Alumni($connection);
$alumnis = $alumni->getAllUnverifiedAlumnis($_SESSION['college_data']['id'],$_SESSION['user_data']['department_id']);
// check if we got alumnis otherwise input an error
if($alumnis==null){
    $error= "No New Registrations..";
}
?>