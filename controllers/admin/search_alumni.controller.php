<!-- get all the alumnis here -->
<?php
// db file already included in admin > nav.php
// include event model file
include($_SERVER['DOCUMENT_ROOT'] ."/models/alumni.php");

$error="";
// create event class obj and pass connection
$alumni  = new Alumni($connection);
$alumnis = $alumni->getAllVerifiedAlumnis($_SESSION['college_data']['id']);
// check if we got alumnis otherwise input an error
if($alumnis==null){
    $error= "No Alumnis Found";
    // set localstorage alumni data to null
    echo "
        <script>
            window.localStorage.setItem('alumni_data',null);
        </script>
    ";
}
    // make an array of available alumnis
    $alumni_data = array();
    $alumni_data['count'] = mysqli_num_rows($alumnis);
    $alumni_data['data'] = array();

    // loop over data and push it in alumni_data array
    while($res = mysqli_fetch_assoc($alumnis)){
        $single_alumni = array(
            "id"=>$res['id'],
            "fullname"=>$res['fullname'],
            "email"=>$res['email'],
            "phone"=>$res['phone'],
            "department_name"=>$res['department_name'],
        );
        // push data in alumni_data['data'] array
        array_push($alumni_data['data'],$single_alumni);
    }
    // json encode the alumni_data
    $alumni_data_encoded = json_encode($alumni_data);
    // store alumni_data in localstorage
    echo "
        <script>
            window.localStorage.setItem('alumni_data',JSON.stringify(".$alumni_data_encoded."));
        </script>
    ";
?>