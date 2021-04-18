<!-- get college logo from db based on college id of alumni -->
<?php
// include db model
include($_SERVER['DOCUMENT_ROOT']."/config/database.php");
// include college model
include($_SERVER['DOCUMENT_ROOT']. "/models/college.php");

$db = new Database();
$connection = $db->connect();
$college = new College($connection);

// get college id from session variable
$college_id = isset($_SESSION['user_data'])?$_SESSION['user_data']['college_id']:null;

// if college id is null that means user is not logged in push user back to login page
if($college_id == null) {
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/views/login");
    exit(0);
}

// call a function to get college details by college_id 
$college_details = $college->getCollegeDetailsById($college_id);
// get college data and store it in session for future use
$collegeObj = array(
    "id"=>$college_details['id'],
    "institute_code"=>$college_details['institute_code'],
    "name"=>$college_details['name'],
    "address"=>$college_details['address'],
    "phone"=>$college_details['phone'],
    "email" =>$college_details['email'],
    "logo_url"=>$college_details['logo_url'],
    "website" => $college_details['website'],
    "created_at"=>$college_details['created_at']
);

// create college_data session variable and store this info
$_SESSION['college_data'] = $collegeObj;
?>
<!-- include style sheet of alumni css  -->
<html>
    <link rel="stylesheet" href="/public/css/alumni.css">
</html>
<!-- logic to change the active nav color -->
<?php 
    $navItem = "";
    if($url_path == "/views/alumni"){
        $navItem = "home";
    }else if($url_path == "/views/alumni/events"){
        $navItem = "events";
    }else if($url_path == "/views/alumni/invitations"){
        $navItem = "invitations";
    }else if($url_path == "/views/alumni/request-to-host-events"){
        $navItem = "request-to-host-events";
    }
?>
<nav class="nav justify-content-center alumni-navbar">
    <a class="nav-link" href="/views/alumni" style="color: <?= $navItem == 'home'?'white':'#929292'?>">Home</a>
    <a class="nav-link" href="/views/alumni/events" style="color: <?= $navItem == 'events'?'white':'#929292'?>">Events</a>
    <a class="nav-link" href="/views/alumni/invitations" style="color: <?= $navItem == 'invitations'?'white':'#929292'?>">Invitations</a>
    <a class="nav-link" href="/views/alumni/request-to-host-events" style="color: <?= $navItem == 'request-to-host-events'?'white':'#929292'?>">Request To Host Events</a>
</nav>

<nav class="nav justify-content-center college-logo-nav">
    <img src="<?=isset($_SESSION['college_data'])?$_SESSION['college_data']['logo_url']:null?>" alt="College Logo" >
</nav>