<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
// include database file
include("../config/database.php");
// include alumni model file
include("../models/alumni.php");

if(isset($_GET['event_id']) && isset($_GET['college_id']) && $_GET['event_id']!=null && $_GET['college_id']!=null){
    // initialize database
    $db = new Database();
    $connection = $db->connect();
    // get alumni model obj
    $alumni = new Alumni($connection);

    // sanitize the get data
    $event_id = mysqli_escape_string($connection,$_GET['event_id']);
    $college_id = mysqli_escape_string($connection,$_GET['college_id']);

    // get all the invitations for that event_id
    $alumnis = $alumni->getNotInvitedAlumnis($college_id,$event_id);
    
    if($alumnis!=null){
        // get all the departments and put it in array
        $alumni_list = array();
        $alumni_list['count'] = mysqli_num_rows($alumnis);
        $alumni_list['data'] = array();
        while($row = mysqli_fetch_assoc($alumnis)){
            // store invitation + alumni details in an array
            $alumni_ = array(
                "id"=>$row['id'],
                "college_id" => $row['college_id'],
                "department_id" => $row['department_id'],
                "roll_no" => $row['roll_no'],
                "fullname" => $row['fullname'],
                "email"=>$row['email'],
                "phone"=>$row['phone'],
            );
            array_push($alumni_list['data'],$alumni_);
        }
        http_response_code(200);
        echo json_encode($alumni_list);
    }else{
        http_response_code(200);
        echo json_encode(array(
            "status"=> 404,
            "message" =>"No Alumni's Available Or All Invited"
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