<div class="modal fade" id="addprofimage-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ url('users/updateProfImage/'. $user->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <h6 class="heading-small text-muted mb-4">{{ __('Information') }}</h6>

                <div class="form-group">
                    <label for="profile">Profile</label>
                    <input type="file" name="profile_image" id="prof_image" class="form-control  @error('profile_image') is-invalid @enderror">
                    @error('profile_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit">Edit User</button>
            </form>
        </div>

      </div>
    </div>
  </div>
