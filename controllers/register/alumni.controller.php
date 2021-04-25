<?php 
// include database file
include("../../config/database.php");
// include a model files
include("../../models/college.php");
include("../../models/department.php");
include("../../models/alumni.php");

//initialize error
$error = null;

// initialize db
$db = new Database();
$connection  = $db->connect();

// initialize models
$college = new College($connection);

// get all the list of colleges
$colleges = $college->getAllColleges();

if($colleges ==null){
    // show alert that currently no colleges are available 
    echo "<script>
        alert('Currently no colleges are available!!');
    </script>";
    exit();
}else{
    if(isset($_GET['full-name']) && isset($_GET['email']) && isset($_GET['phone-no']) && isset($_GET['dob']) && isset($_GET['home-address']) && isset($_GET['roll-no']) && isset($_GET['college-name']) && isset($_GET['college-department']) && isset($_GET['joining-year']) && isset($_GET['passout-year']) && isset($_GET['cgpa']) && isset($_GET['register'])){

        // initialize alumni model
        $alumni = new Alumni($connection);

        // get all the values and sanitize it
        $full_name = mysqli_escape_string($connection,$_GET['full-name']);
        $email = mysqli_escape_string($connection,$_GET['email']);
        $phone_no = mysqli_escape_string($connection,$_GET['phone-no']);
        $dob = mysqli_escape_string($connection,$_GET['dob']);
        $home_address = mysqli_escape_string($connection,$_GET['home-address']);
        $roll_no = mysqli_escape_string($connection,$_GET['roll-no']);
        $college_name = mysqli_escape_string($connection,$_GET['college-name']);
        $college_department = mysqli_escape_string($connection,$_GET['college-department']);
        $joining_year = mysqli_escape_string($connection,$_GET['joining-year']);
        $passout_year = mysqli_escape_string($connection,$_GET['passout-year']);
        $cgpa = mysqli_escape_string($connection,$_GET['cgpa']);
  
        // check all possible error cases
        $len  = strlen($phone_no);

        if($len < 10 || $len >10){
            $error = "Invalid phone no.";
        }else if($joining_year == $passout_year){
            $error = "Joining year and passout year must be different";
        }else if($cgpa > 10){
            $error = "CGPA should be out of 10 or lower";
        }else{
            $error = null;
        }

        if($error != null){
            echo "<script>
                alert('$error');
            </script>";
        }else{

            // check if user is already register or not and whats the status of user 
            $isAvailable = $alumni->checkIfAlumniAlreadyExists($email,$phone_no);

            if($isAvailable == "available_and_verified"){
                $error = "You are already registered with us !! Please Login";
            }else if($isAvailable == "available_and_not_verified"){
                $error = "We already got your registration request !! request is under verification stage !! check your mail after some days for username and password! ";
            }else{
                $error = null;
            }

            if($error != null){
                // show alert to the user with error message
                echo "<script>
                    alert('$error');
                </script>";
            }else {
                // add alumni to the db
                $isAdded = $alumni->createAlumni($full_name,$email,$phone_no,$dob,$home_address,$roll_no,$college_name,$college_department,$joining_year,$passout_year,$cgpa);

                if($isAdded){
                    echo "<script>
                        alert('Registration completed successfully !! check your mail after 2-3 days');
                        // redirect user to home page after 5 seconds
                            window.location.href = '../../';
                    </script>"; 
                    
                }else{
                    echo "<script>
                        alert('Something went wrong');
                    </script>"; 
                }

            }

        }

    }
}

?>