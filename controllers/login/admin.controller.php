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

    if($isAvailable){
        // store values in session for future use
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        $error = null;
        header("Location: ../../views/admin");
    }else{
        // store error value and display it
        $error = "Invalid username or password";
    }
    
}


?>