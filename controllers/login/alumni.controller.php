<?php 
// database file is already included because this is ultimately single login page
// /include admin model file 
include("../../models/alumni.php");

$error = null;
// get the variables from post array
if(isset($_POST['alumni-username']) && isset($_POST['alumni-password']) && isset($_POST['alumni-login-btn'])){
    // initialize the admin model
    $db = new Database();
    $connection = $db->connect();
    $alumni = new Alumni($connection);
    // sanitize user data
    $username = mysqli_real_escape_string($connection,$_POST['alumni-username']);
    $password = md5(mysqli_real_escape_string($connection,$_POST['alumni-password']));

    // pass user data to check if admin is 
    $isAvailable = $alumni->loginAlumni($username,$password);

    if($isAvailable){
        // store values in session for future use
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "alumni";
        $error = null;
        header("Location: ../../views/alumni");
    }else{
        // store error value and display it
        $error = "Invalid username or password";
    }
    
}


?>