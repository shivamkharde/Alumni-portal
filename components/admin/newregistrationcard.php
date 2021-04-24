<!-- include new_registrations  controller to get all the new alumni registrations to verify and deny registration -->
<?php include($_SERVER['DOCUMENT_ROOT']."/controllers/admin/new_registrations.controller.php")?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 align="center">New Alumni Registrations</h4>
            <hr>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <!-- populate initial  alumnis from database -->
            <?php 
                // check if alumni available
                if($error!=""){
                    echo "<h5 align='center'>$error</h5>";
                }else{
                    while($row = mysqli_fetch_assoc($alumnis)){
            ?>
            <!-- search card starts here -->
            <div class="new-registrations-list-item">
                <div class="row">
                    <div class="col-md-12 new-registrations-card">
                        <div class="card mb-3" style="width:100%">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="new-registrations-created-date">
                                            <p class="text-muted"><?=date("F jS, Y",strtotime($row['created_at']))?></p>
                                        </div>
                                        <hr>
                                        <h4 class="card-title new-registrations-title"><?=$row['fullname']?></h4>
                                        <p class="text-muted"><?=$row['email']?></p>
                                        <p class="text-muted"><?=$row['phone']?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button data-toggle="modal" data-target="#view-single-new-registrations-request-<?=$row['id']?>">VIEW DETAILS</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- include view single event request modal-->
            <?php include($_SERVER['DOCUMENT_ROOT'].'/components/admin/viewsinglenewregistrationrequestmodal.php')?>
            <?php
                    }
                }
            ?>
            <!-- search card ends here -->
        </div>
    </div>
</div>
<br>