<!-- admin login controller -->
<?php 
include($_SERVER['DOCUMENT_ROOT']."/controllers/alumni/request_to_host_event.controller.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align:center;">Request To Host An Event</h2>
            <hr>
        </div>
    </div>
</div>
<br>
<div class="host-event-request-card">
    <form action="/views/alumni/request-to-host-events" method="POST">
        <input type="text" name="event-subject" id="event-subject" placeholder="Subject" required />
        <textarea name="event-message" id="event-message" cols="10" rows="5" placeholder="Message" required></textarea>
        <button type="submit">SUBMIT REQUEST</button>
    </form>
</div>
<br>