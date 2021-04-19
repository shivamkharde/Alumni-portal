<?php
// db file already included in alumni > nav.php
// include invitation model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/invitation.php");
// include admin model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/admin.php");

// check if GET param is set
if(isset($_GET['id']) && $_GET['id'] != null){
    // sanitize get param
    $invitation_id = mysqli_escape_string($connection,$_GET['id']);
    // create invitation and admin class obj and pass connection
    $invitation  = new Invitation($connection);
    $admin = new Admin($connection);
    $single_invitation = $invitation->getSingleInvitationByInvitationId($invitation_id);
    $admin_details = $admin->getAdminByAdminId($single_invitation['admin_id']);
}else{
    header("Location: /views/alumni/invitations");
}
?>