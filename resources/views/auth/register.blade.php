<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <body>
        <section class="area">
                <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                </ul>
            <div class="register_box">
                <div class="left">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h1 class="text-white">REGISTER</h1>
                            <div class="field-set">
                                <div class="fields form-group">
                                    <i class="fas fa-user"> </i>
                                    <input type="text" class="@error('name') is-invalid @enderror" name="name" placeholder="Username">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <muted>{{ $message }}</muted>
                                        </div>
                                    @enderror
                                </div>
                                <div class="fields form-group">
                                    <i class="fas fa-envelope"> </i>
                                    <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <muted>{{ $message }}</muted>
                                    </div>
                                @enderror
                                </div>
                                <div class="fields form-group">
                                    <i class="fas fa-unlock"> </i>
                                    <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <muted>{{ $message }}</muted>
                                    </div>
                                    @enderror
                                </div>
                                <div class="fields form-group">
                                    <i class="fas fa-lock"> </i>
                                    <input type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" role="alert">
                                        <muted>{{ $message }}</muted>
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="btn-sub">
                                <button type="submit">Register</button>
                            </div>
                            <div class="link-signup text-white">
                                Already have an account? <a href="{{ route('login') }}">Sign in</a>
                            </div>
                            <div class="social-acc">
                                <img src="{{ asset('/images/icons/facebook (1).png') }}" alt="imag">
                                <img src="{{ asset('/images/icons/google (1).png') }}" alt="imag">
                                <img src="{{ asset('/images/icons/youtube (1).png') }}" alt="imag">
                        </div>
                        </form>
                        <div class="home">
                            <a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                         </div>
                    </div>
                <div class="right">
                    <div class="bubble">
                        <h1>Konichiwa</h1>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                        <div><span class="dot"></span></div>
                </div>

            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    </body>
    </html>

</body>
</html>




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <muted>{{ $message }}</muted>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <muted>{{ $message }}</muted>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <muted>{{ $message }}</muted>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
