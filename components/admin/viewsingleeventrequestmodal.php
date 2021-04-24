<!-- modal for viewing the single event request in detail -->
<!-- Modal -->
<div class="modal modal-centered fade" id="view-single-event-request-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="view-single-event-request-<?=$row['id']?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Event Request By- <mark><?=$row['fullname']?></mark></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="container" style="padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="event-request-title">
                                <?=$row['subject']?>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="event-request-message">
                                <?=$row['message']?>
                                <?=$row['email']?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a  href="mailto:<?=$row['email']?>"
                    style="
                    width: 100%;
                    height: 50px;
                    margin-bottom: 10px;
                    border: none;
                    outline: none;
                    color: white;
                    background-color: #0e2433;
                    text-align:center;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    cursor:pointer;
                    text-decoration: none;
                ">SEND MAIL</a>
            </div>
        </div>
    </div>
</div>