<!-- add event controller file -->
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/controllers/admin/allevents.controller.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center;font-weight: 700;">Invite Alumni</h3>
        </div>
    </div>
    <hr>
    <br>
    <!-- first check if event obj is null -->
    <?php
        if($events==null){
    ?>
        <div class="row">
            <div class="col-md-12 manage-event-invite-card">
                <h3>No Events Available</h3>
            </div>
        </div>
    <?php
        }else{
            while($row = mysqli_fetch_assoc($events)){
    ?>
        <!-- card starts here -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8  manage-event-invite-card">
                <div class="card mb-3"  style="width:100%;">
                    <div class="row g-0">
                        <div class="col-md-7">
                            <div class="card-body">
                                <a href="/views/admin/manage-events/event.php?id=<?=$row['id']?>">
                                    <h4 class="card-title event-title"><?=$row['name']?></h4>
                                </a>
                                <hr>
                                <p class="card-text">
                                    <p class="m-0">start:</p> 
                                    <b class="text-muted"><?=$row['start_date']?></b>
                                </p>
                                <p class="card-text">
                                    <p class="m-0">end:</p> 
                                    <b class="text-muted"><?=$row['end_date']?></b>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="event-invite-alumni-buttons">
                                <button class="see-event-details-btn" onclick="window.location.href='/views/admin/manage-events/event.php?id=<?=$row['id']?>';">SEE EVENT DETAILS</button>

                                <button data-toggle="modal" onclick="getNonInvitedAlumniForParticularEvent(<?=$_SESSION['college_data']['id']?>,<?=$row['id']?>)" data-target="#invite-alumni-to-event-modal" class="event-invite-alumni-btn">INVITE ALUMNI</button>

                                <button data-toggle="modal" onclick="getInvitedAlumniListByEventId(<?=$row['id']?>)" data-target="#see-invited-alumni-list-modal" class="event-invite-alumni-list-btn">SEE INVITED LIST</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <br>        
        <!-- card ends here -->
        <?php 
            }
        } 
    ?>
</div>


<!-- invite alumni modal file -->
<?php include($_SERVER['DOCUMENT_ROOT']."/components/admin/invitealumnimodal.php")?>
<!-- see invited list of alumni modal file -->
<?php include($_SERVER['DOCUMENT_ROOT']."/components/admin/seeinvitedlistmodal.php")?>
