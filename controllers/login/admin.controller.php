<?php 
// include database file
include("../../config/database.php");
// /include admin model file 
include("../../models/admin.php");

$error = null;
// get the variables from post array
if(isset($_POST['username']) && isset($_POST['password'])){
    // initialize the admin model
    $db = new Database();
    $connection = $db->connect();
    $admin = new Admin($connection);
    // sanitize user data
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = md5(mysqli_real_escape_string($connection,$_POST['password']));

    // pass user data to check if admin is 
    $isAvailable = $admin->loginAdmin($username,$password);

    if($isAvailable!=false){
        // make array of user info 
        $userObj  = array(
            "id"=> $isAvailable['id'],
            "college_id"=>$isAvailable['college_id'],
            "department_id"=>$isAvailable['department_id'],
            "designation_id"=>$isAvailable['designation_id'],
            "college_email" => $isAvailable['college_email'],
            "personal_email" => $isAvailable['personal_email'],
            "username"=>$isAvailable['username'],
            "role"=>"admin",
        );

        // store values in session for future use
        $_SESSION['user_data'] = $userObj;
       
        $error = null;
        header("Location: ../../views/admin");
    }else{
        // store error value and display it
        $error = "Invalid username or password";
    }
    
}


?>