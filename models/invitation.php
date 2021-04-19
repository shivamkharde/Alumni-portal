<?php 
class Invitation{
    private $connection;
    private $tablename = "invitations";
    private $query;

    // constructor to initialize
    public function __construct($con){
        $this->connection = $con;
    }

    // accept invitation by invitation id
    public function acceptInvitation($college_id,$invitation_id){
        $this->query = "UPDATE `$this->tablename` SET `accepted`=1 WHERE college_id=$college_id AND id = $invitation_id";
        $result = mysqli_query($this->connection, $this->query);
        if(mysqli_affected_rows ($this->connection) ==1){
            return true;
        }else{
            return false;
        }
    }

     // to get single event data by event id
     public function getSingleInvitationByInvitationId($invitation_id){
        $this->query = "SELECT * FROM `$this->tablename` WHERE id=$invitation_id";
        $result = mysqli_query($this->connection, $this->query);
        if(mysqli_num_rows($result) ==1){
            return mysqli_fetch_assoc($result);
        }else{
            return null;
        }
    }

    // to get all the events data by college id
    public function getAllInvitationsByAlumniId($alumni_id){
        $this->query = "SELECT * FROM `$this->tablename` WHERE alumni_id=$alumni_id";
        $result = mysqli_query($this->connection, $this->query);
        if(mysqli_num_rows($result) >0){
            return $result;
        }else{
            return null;
        }
    }
}
?>