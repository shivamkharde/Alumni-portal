<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
// include database file
include("../config/database.php");
// include invitation model file
include("../models/invitation.php");
// include alumni model file
include("../models/alumni.php");

if(isset($_GET['event_id']) && $_GET['event_id']!=null){
    // initialize database
    $db = new Database();
    $connection = $db->connect();
    // get invitation model obj
    $invitation = new Invitation($connection);
    // get alumni model obj
    $alumni = new Alumni($connection);

    // sanitize the get data
    $event_id = mysqli_escape_string($connection,$_GET['event_id']);
    // get all the invitations for that event_id
    $invitations = $invitation->getAllInvitationsByEventId($event_id);
    
    if($invitations!=null){
        // get all the departments and put it in array
        $invited_list_data = array();
        $invited_list_data['count'] = mysqli_num_rows($invitations);
        $invited_list_data['data'] = array();
        while($row = mysqli_fetch_assoc($invitations)){
            // get alumni details for invited alumni id
            $alumnis = $alumni->getAlumniDetailsById($row['alumni_id']);
            // store invitation + alumni details in an array
            $invited_alumni = array(
                "invitation_id" => $row['id'],
                "event_id"=>$row['event_id'],
                "college_id" => $row['college_id'],
                "department_id" => $row['department_id'],
                "alumni_id" => $alumnis['id'],
                "roll_no" => $alumnis['roll_no'],
                "fullname" => $alumnis['fullname'],
                "email"=>$alumnis['email'],
                "phone"=>$alumnis['phone'],
                "dob" => $alumnis['dob'],
                "accepted"=>$row['accepted']
            );
            array_push($invited_list_data['data'],$invited_alumni);
        }
        http_response_code(200);
        echo json_encode($invited_list_data);
    }else{
        http_response_code(200);
        echo json_encode(array(
            "status"=> 404,
            "message" =>"No Invitations made"
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