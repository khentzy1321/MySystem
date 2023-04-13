<div class="modal fade" id="addbio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Bio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('bio.store') }}">
            @csrf
            <div class="form-group">
                <label for="pro">Your Profession</label>
                <input type="text" class="form-control" name="prof">
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea type="text" class="form-control" name="addbio"></textarea>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
           </div>
        </form>
      </div>
      
    </div>
  </div>
</div>