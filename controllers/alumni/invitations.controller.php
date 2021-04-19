<?php
// db file already included in alumni > nav.php
// include invitation model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/invitation.php");

// create event class obj and pass connection
$invitation  = new Invitation($connection);
$invitations = $invitation->getAllInvitationsByAlumniId($_SESSION['user_data']['id']);
?>