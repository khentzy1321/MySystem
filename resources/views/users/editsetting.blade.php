@extends('layouts.admin')

@section('content')
    <div>
        <div class="allsettings">
            <div class="container-fluid">
                <div class="header">Profile Settings</div>
                <div class="content">
                    <form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data" id="my-form">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-group">
                            <label for="profile">Name</label>
                            <input type="text" name="name" id="prof_image" class="form-control  @error('name') is-invalid @enderror" value="{{  old('name', $user->name)}}">
                            @error('profile_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="profile">Email</label>
                            <input type="email" name="email" id="prof_image" class="form-control  @error('email') is-invalid @enderror" value="{{  old('name', $user->email)}}">
                            @error('profile_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="profile">Change Password?</label>
                            <input type="password" name="password" id="prof_image" class="form-control  @error('password') is-invalid @enderror">
                            @error('profile_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="btn-submit">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
