<!-- invite alumni to event modal-->
<!-- Modal -->
<div class="modal modal-centered fade" id="invitation-title-message-modal" tabindex="-1" role="dialog" aria-labelledby="invite-alumni-to-event-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send An Invite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="container" style="padding:0;">
                    <!-- form to enter title and message to send invite -->
                    <div class="row">
                        <div class="col-md-12">
                            <form class="invitation-title-message-form" action="/controllers/admin/send_invite.controller.php" method="POST">
                                <!-- hidden fields for data -->
                                <input type="hidden" name="college-id" id="send-invitation-college-id" value="<?=$_SESSION['user_data']['college_id']?>">
                                <input type="hidden" name="department-id" id="send-invitation-department-id" value="<?=$_SESSION['user_data']['department_id']?>">
                                <input type="hidden" name="admin-id" id="send-invitation-admin-id" value="<?=$_SESSION['user_data']['id']?>">
                                <input type="hidden" name="alumni-id" id="send-invitation-alumni-id" value="">
                                <input type="hidden" name="event-id" id="send-invitation-event-id" value="">
                                <input type="text" name="invitation-title-input" id="invitation-title-input" placeholder="Invitation Title" required />
                                <textarea name="invitation-message-input" id="invitation-message-input" cols="10" rows="5" placeholder="Invitation Message" required></textarea>

                                <button type="submit" name="send-invite-btn" class="send-invite-btn" id="send-invite-btn">SEND INVITE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>