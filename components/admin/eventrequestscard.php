<!-- include event requests controller to get all the event requests -->
<?php include($_SERVER['DOCUMENT_ROOT']."/controllers/admin/event_requests.controller.php")?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 align="center">All Event Requests</h4>
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
                    while($row = mysqli_fetch_assoc($event_requests)){
            ?>
            <!-- search card starts here -->
            <div class="event-requests-list-item">
                <div class="row">
                    <div class="col-md-12 event-requests-card">
                        <div class="card mb-3" style="width:100%">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="event-request-created-date">
                                            <p class="text-muted"><?=date("F jS, Y",strtotime($row['created_at']))?></p>
                                        </div>
                                        <h4 class="card-title event-request-title"><?=$row['subject']?></h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button data-toggle="modal" data-target="#view-single-event-request-<?=$row['id']?>">VIEW REQUEST</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button onclick="window.location.href='/views/admin/search-alumni/alumni.php?id=<?=$row['alumni_id']?>'">ALUMNI PROFILE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- include view single event request modal-->
            <?php include($_SERVER['DOCUMENT_ROOT'].'/components/admin/viewsingleeventrequestmodal.php')?>
            <?php
                    }
                }
            ?>
            <!-- search card ends here -->
        </div>
    </div>
</div>
<br>