<?php 
class Events{
    private $connection;
    private $tablename = "events";
    private $query;

    // constructor to initialize
    public function __construct($con){
        $this->connection = $con;
    }

    // to create new event
    public function createNewEvent($college_id,$department_id,$admin_id,$event_name,$event_description,$image_name,$event_start_date,$event_end_date){

        $this->query = "INSERT INTO `events`(`id`, `college_id`, `department_id`, `admin_id`, `name`, `description`, `image`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES (null,$college_id,$department_id,$admin_id,'$event_name','$event_description','$image_name','$event_start_date','$event_end_date',CURDATE(),CURDATE())";

        $result = mysqli_query($this->connection, $this->query);
        
        if(mysqli_affected_rows($this->connection) ==1){
            return true;
        }else{
            return false;
        }
    }

    // edit event with image file
    public function editEventWithImageFile($event_id,$college_id,$department_id,$admin_id,$event_name,$event_description,$image_name,$event_start_date,$event_end_date){

        // first get the event by event id
        $event_details = $this->getSingleEventByEventId($event_id);
        if($event_details!=null){

            // delete the previous image file from server
            if(unlink($_SERVER['DOCUMENT_ROOT']."/public/res/event_images/".$event_details['image'])){
                // if deleted 
                // update the event details with new image name
                $this->query = "UPDATE `events` SET `name`='$event_name',`description`='$event_description',`image`='$image_name',`start_date`='$event_start_date',`end_date`='$event_end_date',`updated_at`= CURDATE() WHERE id=$event_id"; 

                $result = mysqli_query($this->connection,$this->query);
                if(mysqli_affected_rows($this->connection) == 1){
                    return true;
                }else{
                    return null;
                }
            }else{
                // something went wrong while deleting image
                return null;
            }

        }else {
            return null;
        }
    }

    // to edit the event without image file
    public function editEventWithoutImageFile($event_id,$college_id,$department_id,$admin_id,$event_name,$event_description,$event_start_date,$event_end_date){
        // update the info
        $this->query = "UPDATE `events` SET `name`='$event_name',`description`='$event_description',`start_date`='$event_start_date',`end_date`='$event_end_date',`updated_at`= CURDATE() WHERE id=$event_id AND college_id=$college_id"; 

        $result = mysqli_query($this->connection,$this->query);
        if(mysqli_affected_rows($this->connection) == 1){
            return true;
        }else{
            return null;
        }
    }

    // to delete the event by id
    public function deleteEventByEventId($event_id){
        $event_details = $this->getSingleEventByEventId($event_id);
        if($event_details!=null){
            $this->query = "DELETE FROM `$this->tablename` WHERE id=$event_id";
            $result = mysqli_query($this->connection, $this->query);
            if(mysqli_affected_rows($this->connection) ==1){
                return $event_details;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

     // to get single event data by event id
     public function getSingleEventByEventId($event_id){
        $this->query = "SELECT * FROM `$this->tablename` WHERE id=$event_id";
        $result = mysqli_query($this->connection, $this->query);
        if(mysqli_num_rows($result) ==1){
            return mysqli_fetch_assoc($result);
        }else{
            return null;
        }
    }

    // to get all the events data by college id
    public function getAllEventsByCollegeId($college_id){
        $this->query = "SELECT * FROM `$this->tablename` WHERE college_id=$college_id ORDER BY created_at DESC ";
        $result = mysqli_query($this->connection, $this->query);
        if(mysqli_num_rows($result) >0){
            return $result;
        }else{
            return null;
        }
    }
}
?>