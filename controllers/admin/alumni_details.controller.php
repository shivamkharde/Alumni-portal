<?php
// db file already included in admin > nav.php
// include alumni model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/alumni.php");

// check if GET param is set
if(isset($_GET['id']) && $_GET['id'] != null){
    // sanitize get param
    $alumni_id = mysqli_escape_string($connection,$_GET['id']);
    // create alumni  obj and pass connection
    $alumni  = new Alumni($connection);
    $single_alumni = $alumni->getAlumniDetailsByIdWithDepartment($alumni_id);
    if($single_alumni==null){
        header("Location: /views/admin");
    }
}else{
    header("Location: /views/admin");
}
?>