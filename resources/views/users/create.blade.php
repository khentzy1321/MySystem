@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-12 order-xl-1 mt-2">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Users') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{ __('Back to Profile') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                    @foreach ($users as $user)
                        @endforeach
                        <form method="post" action="{{ route('users.store') }}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" required autofocus>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" required>

                                </div>
                                {{-- <div>
                                    <label for="profile_image">Profile Image:</label>
                                    <input type="file" name="profile_image" id="profile_image" accept="image/*" required>
                                    @error('profile_image')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="background_image">Background Image:</label>
                                    <input type="file" name="background_image" id="background_image" accept="image/*" required>
                                    @error('background_image')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div> --}}

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
