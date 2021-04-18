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

        // to get college data by id
        public function getCollegeDetailsById($college_id){
            $this->query = "SELECT * FROM `$this->tablename` WHERE id=$college_id";
            $result = mysqli_query($this->connection, $this->query);
            if(mysqli_num_rows($result) == 1){
                return mysqli_fetch_assoc($result);
            }else{
                return null;
            }
        }
    }

?>