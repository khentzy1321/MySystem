@extends('layouts.admin')
@section('content')
@foreach ($users as $user)

@endforeach
<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="image">Profile Image</label>
        <input type="file" class="form-control-file" name="profile_image" id="image">
    </div>

    <button type="submit" class="btn btn-primary">Update Image</button>
</form>
@endsection

