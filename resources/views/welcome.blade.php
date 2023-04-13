<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpg') }}">
    <title>My Website</title>
    <link rel="stylesheet" href="{{ asset('css/welcomes.css') }}">
</head>
<body>
     <div class="navbar">
        <img src="{{ asset('images/logo.png') }}" class="logo" alt="logo">
        <ul>
            <li><a href="">About</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
     </div>
     <div class="content">
        <h1>Hi Im Your's</h1>
        <p>Please help me reach 1M subs</p>
     </div>
</body>
</html>
