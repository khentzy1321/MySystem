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
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
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
            <div class="login_box">
                <div class="left">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1  class="text-white">LOGIN</h1>
                            <div class="field-set">
                                <div class="fields">
                                    <i class="fas fa-user"> </i>
                                    <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <muted>{{ $message }}</muted>
                                    </div>
                                @enderror
                                </div>
                                <div class="fields">
                                    <i class="fas fa-lock"> </i>
                                    <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="btn-sub text-white">
                                <button type="submit" >LOGIN</button>
                            </div>
                            <div class="link-signup" style="color: rgb(184, 184, 184)">
                                Create an account? <a class="text-white text-bolder" href="{{ route('register') }}">Sign up</a>
                            </div>
                            <div class="social-acc">
                                <a href=""><img src="{{ asset('/images/icons/facebook (1).png') }}" alt="imag"></a>
                                <a href=""><img src="{{ asset('/images/icons/google (1).png') }}" alt="imag"></a>
                                <a href=""><img src="{{ asset('/images/icons/youtube (1).png') }}" alt="imag"></a>
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

