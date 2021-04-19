<?php 
// add db file
include($_SERVER['DOCUMENT_ROOT'].'/config/database.php');
// include event file
include($_SERVER['DOCUMENT_ROOT'].'/models/event.php');

// check if event id is set or not
if(isset($_GET['id']) && $_GET['id']!=null){

    // obj of database and event
    $db = new Database();
    $connection = $db->connect();
    $event = new Events($connection);

    // get param
    $event_id = mysqli_escape_string($connection,$_GET['id']);

    // call function to delete event by id and delete associated image file from server
    $event_detail = $event->deleteEventByEventId($event_id);

    if($event_detail!=null){
        // delete associate file here
        if(unlink($_SERVER['DOCUMENT_ROOT']."/public/res/event_images/".$event_detail['image'])){
            echo "
                <script>
                    alert('Event deleted successfully!!');
                    // redirect to main events page
                    window.location.href = '/views/admin/manage-events';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Something went wrong while deleting!!');
                    // window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                </script>
            ";
        }
    }else{
        echo "
            <script>
                alert('No event found with this id');
                window.location.href = '/views/admin/manage-events';
            </script>
        ";
    }
}else{
    header("Location: /views/admin");
}
?>