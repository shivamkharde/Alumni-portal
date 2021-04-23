<?php 
// db file is already included in admin > nav.php
include($_SERVER['DOCUMENT_ROOT']."/config/database.php");
// /include event model file 
include($_SERVER['DOCUMENT_ROOT']."/models/invitation.php");

// get the variables from post array
if(isset($_POST['college-id']) && isset($_POST['department-id']) &&  isset($_POST['admin-id']) && isset($_POST['alumni-id']) && isset($_POST['event-id']) && isset($_POST['invitation-title-input']) && isset($_POST['invitation-message-input']) && $_POST['college-id']!=null && $_POST['department-id']!= null && $_POST['admin-id']!= null && $_POST['alumni-id']!= null && $_POST['event-id']!= null && $_POST['invitation-title-input']!=null && $_POST['invitation-message-input']!=null && isset($_POST['send-invite-btn'])){

    // create database instance
    $db = new Database();
    $connection = $db->connect();
    $invitation = new Invitation($connection);
    // sanitize user data
    $college_id = mysqli_real_escape_string($connection,$_POST['college-id']);
    $department_id = mysqli_real_escape_string($connection,$_POST['department-id']);
    $admin_id = mysqli_real_escape_string($connection,$_POST['admin-id']);
    $alumni_id = mysqli_real_escape_string($connection,$_POST['alumni-id']);
    $event_id = mysqli_real_escape_string($connection,$_POST['event-id']);
    $title = mysqli_real_escape_string($connection,$_POST['invitation-title-input']);
    $message = mysqli_real_escape_string($connection,$_POST['invitation-message-input']);

    // insert invitation details in db
    $isInserted = $invitation->sendInvitationToAlumni($college_id,$department_id,$admin_id,$alumni_id,$event_id,$title,$message);

    // if data is inserted then
    if($isInserted){
        echo "
            <script>
                alert('Invitation sent successfully!!!');
                // redirect to manage events page
                window.location.href = '/views/admin/manage-events/invite_alumni.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Something went wrong while inserting invitation data!!');
                // redirect to manage events page
                window.location.href = '/views/admin/manage-events/invite_alumni.php';
            </script>
        ";
    }
}else{
    header("Location: /");
}
?>