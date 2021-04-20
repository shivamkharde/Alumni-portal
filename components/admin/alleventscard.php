<!-- add event controller file -->
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/controllers/admin/allevents.controller.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center;font-weight: 700;">All Events</h3>
        </div>
    </div>
    <hr>
    <br>
    <!-- first check if event obj is null -->
    <?php
        if($events==null){
    ?>
        <div class="row">
            <div class="col-md-12 manage-all-event-card">
                <h3>No Events Available</h3>
            </div>
        </div>
    <?php
        }else{
            while($row = mysqli_fetch_assoc($events)){
    ?>
        <!-- card starts here -->
        <div class="row">
            <div class="col-md-12  manage-all-event-card">
                <div class="card mb-3"  style="width:90%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/public/res/event_images/<?=$row['image']?>" style="width:200px;height:200px;"alt="...">
                        </div>
                        <div class="col-md-6">
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
                        <div class="col-md-2">
                            <a href="/views/admin/manage-events/event.php?id=<?=$row['id']?>">
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