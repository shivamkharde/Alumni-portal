<?php 
// start the session
session_start();
// check if user is logged in or not otherwise redirect him to login page
if(isset($_SESSION['college_data']['id']) && $_SESSION['user_data']['role'] == "admin"){
// include db file
include($_SERVER['DOCUMENT_ROOT']."/config/database.php");
// /include event model file 
include($_SERVER['DOCUMENT_ROOT']."/models/event.php");

// get the variables from post array
if(isset($_POST['edit-event-id']) && isset($_POST['edit-event-name']) && isset($_POST['edit-event-description']) &&  isset($_FILES['edit-event-image']) && isset($_POST['edit-event-start-date']) && isset($_POST['edit-event-end-date']) && $_POST['edit-event-id'] != null && $_POST['edit-event-name']!=null && $_POST['edit-event-description']!= null && $_FILES['edit-event-image']!= null && $_POST['edit-event-start-date']!= null && $_POST['edit-event-end-date']!= null && isset($_POST['edit-event-btn'])){

    // file upload directory
    $upload_dir = $_SERVER['DOCUMENT_ROOT']."/public/res/event_images/";
    $image_name = time().basename($_FILES['edit-event-image']['name']);
    $db = new Database();
    $connection = $db->connect();
    $event = new Events($connection);

    // sanitize user data
    $event_id = mysqli_escape_string($connection,$_POST['edit-event-id']);
    $event_name = mysqli_real_escape_string($connection,$_POST['edit-event-name']);
    $event_description = mysqli_real_escape_string($connection,$_POST['edit-event-description']);
    $event_image = $upload_dir.$image_name;
    $event_start_date = mysqli_real_escape_string($connection,$_POST['edit-event-start-date']);
    $event_end_date = mysqli_real_escape_string($connection,$_POST['edit-event-end-date']);
    $college_id = $_SESSION['college_data']['id'];
    $admin_id = $_SESSION['user_data']['id'];
    $department_id = $_SESSION['user_data']['department_id'];

    // first check if image file is selected or not if not then proceed without it
    if($_FILES['edit-event-image']['name']==null){
        // edit info without image file
        // check if event start date and end date are same
        if($event_start_date == $event_end_date) {
            echo "
            <script>
                alert('Event start and end date should be different');
                window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
            </script>
        ";
        }else {

            // update the info
            $isUpdated = $event->editEventWithoutImageFile($event_id,$college_id,$department_id,$admin_id,$event_name,$event_description,$event_start_date,$event_end_date);
            
            // check if updated
            if($isUpdated){
                echo "
                    <script>
                        alert('Event edited successfully!!!');
                        window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Something went wrong while updating event data!!');
                        window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                    </script>
                ";
            }

        }

    }else{
        // edit event with image with file       
        // first check if image is actually an image
        // getting image file type
        $file_type = strtolower(pathinfo($event_image,PATHINFO_EXTENSION));
        if($file_type != "png" && $file_type != "jpg" && $file_type != "jpeg"){
            echo "
                <script>
                    alert('Please select valid image file eg.( .png, .jpg, .jpeg )');
                    window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                </script>
            ";
        }else if(!getimagesize($_FILES['edit-event-image']['tmp_name'])){
            echo "
                <script>
                    alert('This is not an image file');
                    window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                </script>
            ";
        }else if($_FILES['edit-event-image']['size'] > 2000000){ 
            echo "
                <script>
                    alert('Image file must be of size <=2MB');
                    window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                </script>
            ";
        }else if($event_start_date == $event_end_date) {
            echo "
            <script>
                alert('Event start and end date should be different');
                window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
            </script>
        ";
        }else {
    
            // upload file to the server
            $isUploaded = move_uploaded_file($_FILES['edit-event-image']['tmp_name'],$event_image);
            // if file upload is true then add data in db
            if($isUploaded){
    
                // call a function to create new event
                $isUpdated = $event->editEventWithImageFile($event_id,$college_id,$department_id,$admin_id,$event_name,$event_description,$image_name,$event_start_date,$event_end_date);
    
                if($isUpdated){
                    echo "
                        <script>
                            alert('Event edited successfully!!!');
                            window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                        </script>
                    ";
                }else{
                    echo "
                        <script>
                            alert('Something went wrong while updating event data!!');
                            window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                        </script>
                    ";
                }
                
            }else{
                echo "
                    <script>
                        alert('Image file not uploaded ..try again!');
                        window.location.href = '/views/admin/manage-events/event.php?id=$event_id';
                    </script>
                ";
            }
        }
    }

}
}else{
    header("Location: /views/login");
}
?>