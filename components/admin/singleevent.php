<!-- include single event controller -->
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/controllers/admin/single_manage_event.controller.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 manage-event-meta-header">
            <div class="goto-manage-events-btn">
                <a href="/views/admin/manage-events"><img src="/public/res/left_arrow.png" alt=""> Back</a>
            </div>
            <!-- if event admin id is currently logged in admin id then give option to edit event -->
            <?php if($single_event['admin_id'] == $_SESSION['user_data']['id']) {?>
                <div class="manage-event-action-area">
                    <div class="edit-single-event-btn">
                        <a href="/views/admin/manage-events/edit_event.php?id=<?=$single_event['id']?>">
                            <button class="btn-success">Edit</button>
                        </a>
                    </div>
                    <div class="delete-single-event-btn">
                        <a href="/helpers/delete_event.helper.php?id=<?=$single_event['id']?>">
                            <button class="btn-danger">delete</button>
                        </a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="event-title">
                <h2><?=$single_event['name']?></h2>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="event-meta-info">
                <span><b>Posted On: </b><?=$single_event['created_at']?></span>
                <br>
                <span><b>Posted By: </b><?=$admin_details['fullname']?></span>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="event-image">
                <img src="/public/res/event_images/<?=$single_event['image']?>" width="100%" alt="">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="event-description">
                <p><?=$single_event['description']?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="event-timings">
                <h4>Event Timings</h4>
                <div class="event-date-time">
                    <h5 class="text-muted"><?=$single_event['start_date']?></h5>
                    <h5><b>To</b></h5>
                    <h5 class="text-muted"><?=$single_event['end_date']?></h5>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>