<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
// include database file
include("../config/database.php");
// include department model file
include("../models/department.php");

if(isset($_POST['college_id'])){
    // initialize database
    $db = new Database();
    $connection = $db->connect();
    // get department model obj
    $department = new Department($connection);
    // sanitize the post data
    $id = mysqli_escape_string($connection,$_POST['college_id']);
    // get all the departments for that college id
    $departments = $department->getAllDepartmentsByCollegeId($id);
    
    if($departments!=null){
        // get all the departments and put it in array
        $departmentData = array();
        $departmentData['count'] = mysqli_num_rows($departments);
        $departmentData['data'] = array();
        while($row = mysqli_fetch_assoc($departments)){
            $dep = array(
                "id" => $row['id'],
                "college_id" => $row['college_id'],
                "department_name" => $row['name']
            );
            array_push($departmentData['data'],$dep);
        }
        http_response_code(200);
        echo json_encode($departmentData);
    }else{
        http_response_code(404);
        echo json_encode(array(
            "status"=> 404,
            "message" =>"No departments data found"
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