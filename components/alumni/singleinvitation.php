<!-- include single event controller -->
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/controllers/alumni/single_invitation.controller.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="goto-invitations-btn">
                <a href="/views/alumni/invitations"><img src="/public/res/left_arrow.png" alt=""> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="invitation-title">
                <h2><?=$single_invitation['title']?></h2>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="invitation-meta-info">
                <span><b>Posted On: </b><?=$single_invitation['created_at']?></span>
                <br>
                <span><b>Posted By: </b><?=$admin_details['fullname']?></span>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="invitation-description">
                <p><?=$single_invitation['message']?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="see-event-details-btn">
                <a href="/views/alumni/events/event.php?id=<?=$single_invitation['event_id']?>">
                    <button>SEE EVENT DETAILS</button>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="accept-invitation-btn">
                <a href="#">
                    <button onclick="acceptInvitation(<?=$single_invitation['college_id']?>,<?=$single_invitation['id']?>)" class="<?=$single_invitation['accepted']?'btn btn-disabled':''?>" <?=$single_invitation['accepted']?'disabled':''?>>ACCEPT INVITATION</button>
                </a>
            </div>
        </div>
    </div>
    <br>
</div>