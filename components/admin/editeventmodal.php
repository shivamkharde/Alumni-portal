<!-- edit event modal to edit single event-->
<!-- Modal -->
<div class="modal modal-centered fade" id="edit-single-event-model" tabindex="-1" role="dialog" aria-labelledby="edit-single-event-model" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit This Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 edit-single-event-form-main-container">
                            <form class="edit-single-event-form" action="/controllers/admin/edit_event.controller.php" method="POST" enctype="multipart/form-data">
                                <!-- hidden field for event id -->
                                <input type="hidden" name="edit-event-id" value="<?=$single_event['id']?>" required/>

                                <input type="text" name="edit-event-name" id="edit-event-name" placeholder="Edit Event Name" value="<?=$single_event['name']?>" required />
                                <textarea name="edit-event-description" id="edit-event-description" cols="10" rows="5" placeholder="Edit Decription" required><?=$single_event['description']?></textarea>
                                <input type="file" name="edit-event-image" id="edit-event-image" accept="image/*">
                                <input type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" placeholder="Edit Event Start Date"name="edit-event-start-date" id="edit-event-start-date" value="<?=$single_event['start_date']?>" required>
                                <input type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" placeholder="Edit Event End Date" value="<?=$single_event['end_date']?>" name="edit-event-end-date" id="edit-event-end-date" required>
                                <button type="submit" name="edit-event-btn">EDIT EVENT</button>

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