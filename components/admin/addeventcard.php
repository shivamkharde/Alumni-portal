<!-- admin login controller -->
<?php 
include($_SERVER['DOCUMENT_ROOT']."/controllers/admin/add_event.controller.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align:center;">Add Event</h2>
            <hr>
        </div>
    </div>
</div>
<br>
<div class="add-event-card">
    <form action="/views/admin/manage-events/add_event.php" method="POST" enctype="multipart/form-data">
        <?php
        // this is to set min event time 
            $micro_time = time();
            $date = date("Y-m-d",$micro_time);
            $datetime = $date."T00:00";
        ?>
        <input type="text" name="event-name" id="event-name" placeholder="Event Name" required />
        <textarea name="event-description" id="event-description" cols="10" rows="5" placeholder="Decription" required></textarea>
        <input type="file" name="event-image" id="event-image" accept="image/*" required>
        <input type="text" onfocus="(this.type='datetime-local')" min="<?=$datetime?>" onblur="(this.type='text')" placeholder="Event Start Date"name="event-start-date" id="event-start-date" required>
        <input type="text" onfocus="(this.type='datetime-local')" min="<?=$datetime?>" onblur="(this.type='text')" placeholder="Event End Date" name="event-end-date" id="event-end-date" required>
        <button type="submit" name="add-event-btn">ADD EVENT</button>
    </form>
</div>
<br>