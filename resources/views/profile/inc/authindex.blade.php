@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

@section('content')

<section >
    @foreach ($users as $user)

    @endforeach
    <div class="card_background_img" style="background-image: url('{{ Auth::user()->background_image ? asset('../images/bacground/' . Auth::user()->background_image) : asset('../images/bgimages.jpg') }}')">
        <div class="editbgview">

            <a class="btn btn-info show-modal" data-id="{{ $user->id }}"
                 data-name="{{ $user->name }}"
                 data-action="{{ url('users/updateBackImage/', $user->id) }}">Edit</a>

        </div>
    </div>
    <div class="card_profile_img" style="background-image: url('{{ Auth::user()->profile_image ? asset('../images/profile/' . Auth::user()->profile_image ) : asset('../images/depolt3.png') }}')">
            <div class="edit">
            <button id="editbtn" data-toggle="modal" data-target="#addprofimage-{{$user->id}}">
                <i class="fas fa-pen"></i>
            </button>
        </div>
        </div>
            <div class="user_details">
            <h2 class="text-center">{{ Auth::user()->name }}</h2>
        </div>
        <div class="card_count">
            <div class="count">
                @include('profile.inc.info')
            </div>

    </div>
    @include('users.editbgimage')
    @include('users.editprofileimage')
</section>
<style>
    .card_profile_img{
    width: 240px;
    height: 240px;
    background-color: #868d9b;
    background-image:url({{ asset('../images/profile/'. Auth::user()->profile_image) }});
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    border:0.1rem solid black;
    border-radius: 300px;
    margin: 0 auto;
    margin-top: -150px;
    }

.card_background_img {
    width: 100%;
    height: 400px;
    background-color: #e1e7ed;
    background-image: url({{ asset('../images/' . Auth::user()->background_image ) }});
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
</style>
@endsection
