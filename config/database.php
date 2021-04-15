<?php 
class Database{


    private $connection;
    private $username="root";
    private $password="";
    private $hostname="localhost";
    private $database="alumni_portal";
    
    public function connect(){
        $this->connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);

        if($this->connection){
            return $this->connection;
        }else{
            return false;
        }
    }

}


?>