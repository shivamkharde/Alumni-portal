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

    // to get all the event requests by college id
    public function getAllEventRequestsById($college_id){
        $this->query = "SELECT a.*,b.fullname,b.email FROM `$this->tablename` a INNER JOIN `alumnis` b WHERE a.alumni_id=b.id AND a.college_id = $college_id AND b.is_verified=1 ORDER BY a.id DESC";

        $results = mysqli_query($this->connection,$this->query);

        if(mysqli_num_rows($results) > 0){
            return $results;
        }else{
            return null;
        }
    }
}
?>