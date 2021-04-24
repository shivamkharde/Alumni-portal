<?php 
    class Alumni{
        private $connection;
        private $tablename = "alumnis";
        private $query;

        // constructor to initialize db connection
        public function __construct($con){
            $this->connection = $con;
        }

        // to login the alumni
        public function loginAlumni($username,$password){
            $this->query = "SELECT * FROM `$this->tablename` WHERE username = '$username' AND password='$password' AND is_verified = 1";

            $result = mysqli_query($this->connection,$this->query);
            if(mysqli_num_rows($result) == 1){
                return mysqli_fetch_assoc($result);
            }else{
                return false;
            }
        }
        
        // to get all the college data
        public function createAlumni($full_name,$email,$phone_no,$dob,$home_address,$roll_no,$college_name,$college_department,$joining_year,$passout_year,$cgpa){

            $this->query = "INSERT INTO `$this->tablename`(`id`, `college_id`, `department_id`, `roll_no`, `fullname`, `email`, `dob`, `phone`, `home_address`, `joining_year`, `passout_year`, `cgpa`,`created_at`) VALUES (null,$college_name,$college_department,'$roll_no','$full_name','$email','$dob',$phone_no,'$home_address','$joining_year','$passout_year',$cgpa,CURDATE())";

            $result   = mysqli_query($this->connection,$this->query);

            if(mysqli_affected_rows($this->connection) == 1){
                return true;
            }else{
                return false;
            }
        }

        // to get all the verified alumnis for the college id
        public function getAllVerifiedAlumnis($college_id){
            $this->query = "SELECT a.*,b.name as department_name FROM `alumnis` a INNER JOIN `departments` b WHERE a.department_id = b.id  AND a.is_verified=1;";

            $result = mysqli_query($this->connection,$this->query);
            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return null;
            }
        }

        // get alumni by id with department details
        public function getAlumniDetailsByIdWithDepartment($alumni_id){
            $this->query = "SELECT a.*,b.name as department_name FROM `alumnis` a INNER JOIN `departments` b WHERE a.department_id = b.id AND a.id=$alumni_id AND a.is_verified=1;";

            $result = mysqli_query($this->connection,$this->query);

            if(mysqli_num_rows($result) == 1){
                return mysqli_fetch_assoc($result);
            }else{
                return null;
            }
        }

        // to get alumni by its id
        public function getAlumniDetailsById($alumni_id){
            $this->query = "SELECT * FROM `$this->tablename` WHERE id = $alumni_id AND is_verified = 1";

            $result = mysqli_query($this->connection,$this->query);

            if(mysqli_num_rows($result) == 1){
                return mysqli_fetch_assoc($result);
            }else{
                return false;
            }
        }

        // to get alumni details by college id
        public function getNotInvitedAlumnis($college_id,$event_id){
            $this->query = "SELECT * FROM `$this->tablename` WHERE id NOT IN (SELECT alumni_id FROM `invitations` WHERE event_id=$event_id)";

            $result = mysqli_query($this->connection,$this->query);

            if(mysqli_num_rows($result) > 0){
                return $result;
            }else{
                return null;
            }
        }

        // /to check if user is already exists or not
        public function checkIfAlumniAlreadyExists($email,$phone_no){

            $available = false;
            $isVerified = false;

            // first check if user is available in db or not
            $this->query = "SELECT * FROM `$this->tablename` WHERE email = '$email' AND phone='$phone_no'";
            $result = mysqli_query($this->connection,$this->query);
            if(mysqli_num_rows($result) == 1){
                $available = true;    
            }

            // check if user is verified or not
            $isVerified = $this->checkIfAlumniIsVerified($email,$phone_no);

            if($available == true && $isVerified == true){
                return "available_and_verified";
            }else if($available == true && $isVerified == false){
                return "available_and_not_verified";
            }else if($available == false && $isVerified == false){
                return "not_available_and_not_verified";
            }else{
                return "not_available";
            }

        }

        // function to check if alumni is verified or not
        public function checkIfAlumniIsVerified($email, $phone_no){
            $this->query = "SELECT * FROM `$this->tablename` WHERE email = '$email' AND phone='$phone_no' AND is_verified = 0";

            $result = mysqli_query($this->connection,$this->query);

            if(mysqli_num_rows($result) == 1){
                return false;
            }else{
                return true;
            }
        }

    }

?>