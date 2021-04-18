<!-- include single event controller -->
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/controllers/alumni/single_event.controller.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="goto-events-btn">
                <a href="/views/alumni/events"><img src="/public/res/left_arrow.png" alt=""> Back</a>
            </div>
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
                <img src="<?=$single_event['image']?>" alt="">
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