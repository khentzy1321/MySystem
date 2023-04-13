@extends('layouts.admin')




@section('content')

@if(auth()->check())
    <?php auth()->user()->update(['last_activity' => now()]); ?>
@endif

<style>
    span i{
        position: relative;
        left:-10px;
        top: -8px;
    }
    .img-td{
        position: relative;
    }
    .act{
        position: relative;
        right: 0.7rem;
    }
</style>

<div>
    <div class="container">
        <header><h1>All Users</h1> </header>
        <div class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('users.create') }}"><button class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i></button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Img</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Day Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                <tr data-user-id="{{ $user->id }}">
                                    <td class="img-td">
                                        @if ($user->profile_image)
                                        <img src="{{ asset('../images/profile/'.$user->profile_image) }}" alt="">
                                    @else
                                        <img src="{{ asset('../images/depolt3.png') }}" alt="">
                                       @endif
                                        <span>
                                            @if ($user->last_activity && (now()->diffInMinutes($user->last_activity) < 120))
                                                <span class="text-success"><i class="fas fa-circle"></i></span>
                                            @else
                                                <span class="text-danger"><i class="fas fa-circle"></i></span>
                                            @endif
                                            @if ($user->last_activity && (now()->diffInMinutes($user->last_activity) < 10))
                                                 <br><small class="text-success act">Active</small>
                                                @elseif ($user->logout_time)
                                                    <br><small>offline {{ Carbon\Carbon::parse($user->logout_time)->diffForHumans() }}</small>
                                                @endif
                                        </span>
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>

                                        <button class="btn btn-primary btn-sm btn-outline-secondary mx-2">
                                            <a href="{{ route('users.show', $user->id) }}" class="text-white"><i class="fas fa-eye"></i></a>
                                        </button>
                                        <button class="btn btn-success btn-sm btn-outline-secondary">
                                            <a href="{{ route('users.edit', $user->id) }}" class="text-white"><i class="fas fa-edit"></i></a>
                                        </button>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline mx-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-outline-secondary btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    td img{
        height: 40px;
        width: 40px;
        border-radius: 50%;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function sendHeartbeat(userId) {
    $.ajax({
        url: '/heartbeat',
        method: 'POST',
        data: {
            userId: userId // pass the user ID to the server
        },
        success: function(response) {
            // update user's status to active
            $('[data-user-id="' + userId + '"] td:last-child').html('active');
        }
    });
}

setInterval(function() {
    $('[data-user-id]').each(function() {
        var userId = $(this).data('user-id');
        sendHeartbeat(userId);
    });
}, 10000); // send heartbeat every 10 seconds
</script>
@endsection
