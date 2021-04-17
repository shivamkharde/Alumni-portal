<?php 
    class College{
        private $connection;
        private $tablename = "colleges";
        private $query;

        // constructor to initialize
        public function __construct($con){
            $this->connection = $con;
        }

        // to get all the college data
        public function getAllColleges(){
            $this->query = "SELECT * FROM `$this->tablename`";
            $result = mysqli_query($this->connection, $this->query);
            if(mysqli_num_rows($result) >0){
                return $result;
            }else{
                return null;
            }
        }
    }

?>