<!-- include alumni details controller to get alumni details -->
<?php include($_SERVER['DOCUMENT_ROOT']."/controllers/admin/alumni_details.controller.php");?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 align="center">Alumni Details</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="alumni-info-left-part">
                <div class="alumni-image">
                    <img src="http://www.gravatar.com/avatar/?d=identicon&s=200" width="200px" height="200px" alt="alumni image">
                </div>
                <div class="alumni-account-info">
                        <p class="text-muted"><i><b>Account created: </b></i></p>
                        <p class="text-muted"><?=date("F jS, Y",strtotime($single_alumni['created_at']))?></p>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="alumni-info-right-part">
                <p class="alumni-name"><b>Full Name:  </b><?=$single_alumni['fullname']?></p>
                <p class="alumni-username"><b>Username:  </b><mark><?=$single_alumni['username']?></mark></p>
                <p class="alumni-email"><b>Email:  </b><?=$single_alumni['email']?></p>
                <p class="alumni-phone"><b>Phone:  </b><?=$single_alumni['phone']?></p>
                <p class="alumni-dob"><b>DOB:  </b><?=$single_alumni['dob']?></p>
                <p class="alumni-address"><b>Address:  </b><?=$single_alumni['home_address']?></p>
                <p class="alumni-department"><b>Department:  </b><?=$single_alumni['department_name']?></p>
                <p class="alumni-rollno"><b>Roll No:  </b><?=$single_alumni['roll_no']?></p>
                <p class="alumni-joining-year"><b>Joining Year:  </b><?=$single_alumni['joining_year']?></p>
                <p class="alumni-passout-year"><b>Passout Year:  </b><?=$single_alumni['passout_year']?></p>
                <p class="alumni-cgpa"><b>CGPA: </b><?=$single_alumni['cgpa']?></p>
            </div>
        </div>
    </div>
</div>
<br>