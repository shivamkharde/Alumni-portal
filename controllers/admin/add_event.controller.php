<?php 
// db file is already included in admin > nav.php
// /include event model file 
include($_SERVER['DOCUMENT_ROOT']."/models/event.php");

// get the variables from post array
if(isset($_POST['event-name']) && isset($_POST['event-description']) &&  isset($_FILES['event-image']) && isset($_POST['event-start-date']) && isset($_POST['event-end-date']) && $_POST['event-name']!=null && $_POST['event-description']!= null && $_FILES['event-image']!= null && $_POST['event-start-date']!= null && $_POST['event-end-date']!= null && isset($_POST['add-event-btn'])){

    // file upload directory
    $upload_dir = $_SERVER['DOCUMENT_ROOT']."/public/res/event_images/";
    $image_name = time().basename($_FILES['event-image']['name']);
    $db = new Database();
    $connection = $db->connect();
    $event = new Events($connection);
    // sanitize user data
    $event_name = mysqli_real_escape_string($connection,$_POST['event-name']);
    $event_description = mysqli_real_escape_string($connection,$_POST['event-description']);
    $event_image = $upload_dir.$image_name;
    $event_start_date = mysqli_real_escape_string($connection,$_POST['event-start-date']);
    $event_end_date = mysqli_real_escape_string($connection,$_POST['event-end-date']);
    $college_id = $_SESSION['college_data']['id'];
    $admin_id = $_SESSION['user_data']['id'];
    $department_id = $_SESSION['user_data']['department_id'];

    // first check if image is actually an image
    // getting image file type
    $file_type = strtolower(pathinfo($event_image,PATHINFO_EXTENSION));
    // echo $file_type=="png"?"true":"false";
    // die();
    if($file_type != "png" && $file_type != "jpg" && $file_type != "jpeg"){
        echo "
            <script>
                alert('Please select valid image file eg.( .png, .jpg, .jpeg )');
            </script>
        ";
    }else if(!getimagesize($_FILES['event-image']['tmp_name'])){
        echo "
            <script>
                alert('This is not an image file');
            </script>
        ";
    }else if($_FILES['event-image']['size'] > 2000000){ 
        echo "
            <script>
                alert('Image file must be of size <=2MB');
            </script>
        ";
    }else if($event_start_date == $event_end_date) {
        echo "
        <script>
            alert('Event start and end date should be different');
        </script>
    ";
    }else {

        // upload file to the server
        $isUploaded = move_uploaded_file($_FILES['event-image']['tmp_name'],$event_image);
        // if file upload is true then add data in db
        if($isUploaded){

            // call a function to create new event
            $isInserted = $event->createNewEvent($college_id,$department_id,$admin_id,$event_name,$event_description,$image_name,$event_start_date,$event_end_date);

            if($isInserted){
                echo "
                    <script>
                        alert('New event added successfully!!!');
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Something went wrong while inserting event data!!');
                    </script>
                ";
            }
            
        }else{
            echo "
                <script>
                    alert('Image file is not uploaded ..try again!');
                </script>
            ";
        }
    }
}
?>