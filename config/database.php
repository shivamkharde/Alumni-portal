<?php 
class Database{


    private $connection;
    private $username="";
    private $password="";
    private $hostname="";
    private $database="";
    
    public function __construct(){
        $this->username = getenv("DB_USERNAME")==""?"root":getenv("DB_USERNAME");
        $this->password = getenv("DB_PASSWORD")==""?"":getenv("DB_PASSWORD");
        $this->hostname = getenv("DB_HOST")==""?"localhost":getenv("DB_HOST");
        $this->database = getenv("DB_DATABASE_NAME")==""?"alumni_portal":getenv("DB_HOST");

    }

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