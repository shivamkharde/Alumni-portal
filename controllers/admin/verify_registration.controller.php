<!-- verify the alumnis registration -->
<?php 
    // include db file
    include($_SERVER['DOCUMENT_ROOT'].'/config/database.php');
    // include alumni file
    include($_SERVER['DOCUMENT_ROOT'].'/models/alumni.php');

    // check if required get params are set
    if(isset($_GET['college_id']) && isset($_GET['department_id']) && isset($_GET['fullname']) && isset($_GET['phone']) && isset($_GET['id']) && isset($_GET['email']) && isset($_GET['dob']) && isset($_GET['roll_no'])){

        // database and model objs
        $connection = (new Database())->connect();
        $alumni = new Alumni($connection);

        // generate username and password
        // username => first_name+phone_last_four_digits
        // password => college_id+roll_no+dob(without dashes)
        $username = explode(' ',mysqli_real_escape_string($connection,$_GET['fullname']))[0].substr($_GET['phone'],-4);

        $password = md5(mysqli_real_escape_string($connection,$_GET['college_id']).mysqli_real_escape_string($connection,$_GET['roll_no']).explode('-',mysqli_real_escape_string($connection,$_GET['dob']))[0].explode('-',mysqli_real_escape_string($connection,$_GET['dob']))[1].explode('-',mysqli_real_escape_string($connection,$_GET['dob']))[2]);

        $college_id = mysqli_real_escape_string($connection,$_GET['college_id']);
        $department_id = mysqli_real_escape_string($connection,$_GET['department_id']);
        $alumni_id = mysqli_real_escape_string($connection,$_GET['id']);

        // verify and update username and password field with this 
        $isUpdatedSuccessfully = $alumni->verifyAndAcceptRegistration($college_id,$department_id,$alumni_id,$username,$password);

        // check if updated and send email to register candidate with username and password
        if($isUpdatedSuccessfully){
            // TODO: send mail functionality

            // redirect admin back to new registrations page
            echo "
                <script>
                    alert('New registration verified and accepted successfully!!');
                    window.location.href = '/views/admin/new-registrations';
                </script>
            "; 
        }else{

            // tell admin that something went wrong while verifying
            echo "
                <script>
                    alert('Something went wrong while verifying the alumni please try again!!');
                    window.location.href = '/views/admin/new-registrations';
                </script>
            "; 
        }
    }else{
        header("Location: /views/admin");
    }


?>