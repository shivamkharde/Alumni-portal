<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
// include database file
include("../config/database.php");
// include invitation model file
include("../models/invitation.php");

if(isset($_POST['college_id']) && isset($_POST['invitation_id']) && $_POST['college_id']!=null && $_POST['invitation_id'] != null){
    // initialize database
    $db = new Database();
    $connection = $db->connect();
    // get invitation model obj
    $invitation = new Invitation($connection);
    // sanitize the post data
    $college_id = mysqli_escape_string($connection,$_POST['college_id']);
    $invitation_id = mysqli_escape_string($connection,$_POST['invitation_id']);

    // update accepted field in invitations
    $isUpdated = $invitation->acceptInvitation($college_id,$invitation_id);
    
    if($isUpdated){
        http_response_code(200);
        echo json_encode(array(
            "status"=>200,
            "message"=>"Invitation accepted successfully"
        ));
    }else{
        http_response_code(404);
        echo json_encode(array(
            "status"=> 404,
            "message" =>"No Invitation found or wrong college id or invitation id"
        ));
    }

}else{
    http_response_code(400);
    echo json_encode(array(
        "status"=> 400,
        "message"=>"seems like unauthentic request attempt!!"
    ));
}

?>