<?php 
    class Department{
        private $connection;
        private $tablename = "departments";
        private $query;

        // constructor to initialize
        public function __construct($con){
            $this->connection = $con;
        }

        // to get all the college data
        public function getAllDepartmentsByCollegeId($college_id){
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