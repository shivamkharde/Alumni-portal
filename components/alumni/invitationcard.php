<!-- add event controller file -->
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/controllers/alumni/invitations.controller.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center;font-weight: 700;">All Invitations</h3>
        </div>
    </div>
    <hr>
    <br>
    <!-- first check if event obj is null -->
    <?php
        if($invitations==null){
    ?>
        <div class="row">
            <div class="col-md-12 invitation-card">
                <h3>No Invites Available</h3>
            </div>
        </div>
    <?php
        }else{
            while($row = mysqli_fetch_assoc($invitations)){
                // create a short message from big to show on all invitation page
                $invite_message = substr($row['message'],0,150);
                $invitation_accepted = $row['accepted'];
    ?>
        <!-- card starts here -->
        <div class="row">
            <div class="col-md-12 invitation-card">
                <div class="card mb-3"  style="width:70%;">
                    <div class="row g-0">
                        <div class="col-md-10">
                            <div class="card-body">
                                <?php if($invitation_accepted){ ?>
                                    <div class="accepted-invitation">
                                        <p class="btn badge badge-primary">Invitation Accepted</p>
                                    </div>
                                <?php }?>
                                <div class="invitation-created-date">
                                    <p class="text-muted"><?=$row['created_at']?></p>
                                </div>
                                <a href="/views/alumni/invitations/invitation.php?id=<?=$row['id']?>">
                                    <h4 class="card-title event-title"><?=$row['title']?></h4>
                                </a>
                                <hr>
                                <p class="card-text">
                                    <p class="m-0 text-muted"><?=$invite_message?>...</p> 
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="/views/alumni/invitations/invitation.php?id=<?=$row['id']?>">
                                <p class="card-text">
                                    <img src="/public/res/right_arrow.png" alt="">
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- card ends here -->
    <?php 
            }
        } 
    ?>
</div>