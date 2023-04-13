<!-- The modal -->
<div class="modal fade" id="bgModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateProfileBackgroundModalLabel">Update Profile Background</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="bg_image" >
            <input id="bgId" type="hidden">
              <div class="form-group">
                  <label for="background_image">Background Image</label>
                  <input type="file" class="form-control" name="background_image" id="bgImage">
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
          </form>
        </div>
      </div>
    </div>


  </div>



