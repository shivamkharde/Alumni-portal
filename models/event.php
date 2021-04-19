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
        $this->query = "SELECT * FROM `$this->tablename` WHERE college_id=$college_id";
        $result = mysqli_query($this->connection, $this->query);
        if(mysqli_num_rows($result) >0){
            return $result;
        }else{
            return null;
        }
    }
}
?>