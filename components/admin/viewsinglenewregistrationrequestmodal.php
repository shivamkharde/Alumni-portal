<!-- modal for viewing the single event request in detail -->
<!-- Modal -->
<div class="modal modal-centered fade" id="view-single-new-registrations-request-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="view-single-new-registrations-request-<?=$row['id']?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registration Request By- <mark><?=$row['fullname']?></mark></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alumni-info-right-part">
                            <p class="alumni-name"><b>Full Name:  </b><?=$row['fullname']?></p>
                            <p class="alumni-email"><b>Email:  </b><?=$row['email']?></p>
                            <p class="alumni-phone"><b>Phone:  </b><?=$row['phone']?></p>
                            <p class="alumni-dob"><b>DOB:  </b><?=$row['dob']?></p>
                            <p class="alumni-address"><b>Address:  </b><?=$row['home_address']?></p>
                            <p class="alumni-department"><b>Department:  </b><?=$row['department_name']?></p>
                            <p class="alumni-rollno"><b>Roll No:  </b><?=$row['roll_no']?></p>
                            <p class="alumni-joining-year"><b>Joining Year:  </b><?=$row['joining_year']?></p>
                            <p class="alumni-passout-year"><b>Passout Year:  </b><?=$row['passout_year']?></p>
                            <p class="alumni-cgpa"><b>CGPA: </b><?=$row['cgpa']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content:center;">
                <div class="row"  style="width:100%;">
                    <div class="col-md-6">
                        <button onclick="verifyAndAcceptRegistration(<?=$row['college_id']?>,<?=$row['department_id']?>,<?=$row['id']?>,'<?=$row['fullname']?>',<?=$row['phone']?>,'<?=$row['email']?>','<?=$row['dob']?>','<?=$row['roll_no']?>')"
                            style="
                            width: 100%;
                            height: 50px;
                            margin-bottom: 10px;
                            border: none;
                            outline: none;
                            color: white;
                            background-color: #0e2433;
                        ">VERIFY REGISTRATION</button>
                    </div>
                    <div class="col-md-6">
                        <button onclick="denyNewRegistration(<?=$row['college_id']?>,<?=$row['department_id']?>,<?=$row['id']?>,'<?=$row['fullname']?>',<?=$row['phone']?>,'<?=$row['email']?>','<?=$row['dob']?>','<?=$row['roll_no']?>')"
                            style="
                            width: 100%;
                            height: 50px;
                            margin-bottom: 10px;
                            border: none;
                            outline: none;
                            color: white;
                            background-color: #0e2433;
                        ">DENY REGISTRATION</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>