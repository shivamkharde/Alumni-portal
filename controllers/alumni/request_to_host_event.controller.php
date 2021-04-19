<?php 
// db file is already included in alumni > nav.php
// /include event_request model file 
include($_SERVER['DOCUMENT_ROOT']."/models/event_request.php");

// get the variables from post array
if(isset($_POST['event-subject']) && isset($_POST['event-message']) && $_POST['event-subject']!=null && $_POST['event-message']!= null){
    // initialize the admin model
    $db = new Database();
    $connection = $db->connect();
    $event_request = new EventRequest($connection);
    // sanitize user data
    $event_subject = mysqli_real_escape_string($connection,$_POST['event-subject']);
    $event_message = mysqli_real_escape_string($connection,$_POST['event-message']);
    $college_id = $_SESSION['college_data']['id'];
    $alumni_id = $_SESSION['user_data']['id'];
    $department_id = $_SESSION['user_data']['department_id'];

    // create event request 
    $isCreated = $event_request->createEventRequest($college_id,$department_id,$alumni_id,$event_subject,$event_message);

    if($isCreated){
        // echo alert saying event request submitted
        echo "<script>
            alert('Event request successfully submitted');
        </script>";
    }else{
        echo "<script>
            alert('Something went wrong');
        </script>";
    }
}
?>