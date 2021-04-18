<?php 
class Admin{
    private $connection;
    private $tablename = "admins";
    private $query;

    // constructor to initialize db
    public function __construct($con) {
        $this->connection = $con;
    }

    public function loginAdmin($username,$password){
        // query to get the admin based on username and password
        $this->query  = "SELECT * FROM `$this->tablename` WHERE username='$username' AND password='$password';";
    
        // if admin is available then return true otherwise false
        $result = mysqli_query($this->connection, $this->query);
        if(mysqli_num_rows($result) == 1){
            return mysqli_fetch_assoc($result);;
        }else{
            return false;
        }
    }

}

?>