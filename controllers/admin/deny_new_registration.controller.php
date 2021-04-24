<!-- deny the alumnis registration -->
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

        $college_id = mysqli_real_escape_string($connection,$_GET['college_id']);
        $department_id = mysqli_real_escape_string($connection,$_GET['department_id']);
        $alumni_id = mysqli_real_escape_string($connection,$_GET['id']);

        // deny and delete alumni details from the table 
        $isDeletedSuccessfully = $alumni->denyNewRegistration($college_id,$department_id,$alumni_id);

        // check if deleted and send email to candidate with appropriate message why registration is denied
        if($isDeletedSuccessfully){
            // TODO: send mail functionality (why registration is denied)

            // redirect admin back to new registrations page
            echo "
                <script>
                    alert('Registration request denied successfully!!');
                    window.location.href = '/views/admin/new-registrations';
                </script>
            "; 
        }else{

            // tell admin that something went wrong while denying
            echo "
                <script>
                    alert('Something went wrong while denying registration request please try again!!');
                    window.location.href = '/views/admin/new-registrations';
                </script>
            "; 
        }
    }else{
        header("Location: /views/admin");
    }


?>