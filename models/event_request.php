<?php 
class EventRequest{
    private $connection;
    private $tablename = "event_requests";
    private $query;

    // constructor to initialize
    public function __construct($con){
        $this->connection = $con;
    }

    //  to create new event request
     public function createEventRequest($college_id,$department_id,$alumni_id,$event_subject,$event_message){
        $this->query = "INSERT INTO `event_requests`(`id`, `college_id`, `department_id`, `alumni_id`, `subject`, `message`, `created_at`) VALUES (null,$college_id,$department_id,$alumni_id,'$event_subject','$event_message',CURDATE())";

        $result = mysqli_query($this->connection, $this->query);

        if(mysqli_affected_rows($this->connection) == 1){
            return true;
        }else{
            return false;
        }
    }
}
?>