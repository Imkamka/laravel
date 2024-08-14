<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rafay diaries and farms</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    @vite('resources/js/app.js')
</head>

<body>



    <div class="container login align-content-center">
        <div class="row container-1">
            <div class="col-lg-6">
                <div class="group-1 w-100">
                    <div class="welcome-to-wanda-animal-feed">
                        Welcome to Wanda Animal Feed
                    </div>
                    <span class="your-one-stop-solution-for-high-quality-animal-nutrition">
                        Your One-Stop Solution for High-Quality Animal Nutrition
                    </span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="container">
                    <div class="logo">
                        @include('Admin.includes.svg')

                    </div>
                    <div class="selectors d-flex">
                        <a href="{{ route('view.login') }}" class="nav-link link-1">Log In</a>
                        <a href="{{ route('view.register') }}" class="nav-link link-2">Sign Up</a>
                    </div>
                    <div class="container">
                        <form action="{{ route('auth.login') }}" method="POST">
                            @method('post')
                            @csrf
                            <div class="heading">
                                <div class="login-1">
                                    Login
                                </div>
                                @if (session('error'))
                                    <p class="pt-2 text-danger">
                                        {{ Session::get('error') }}
                                    </p>
                                @else
                                    <span class="please-enter-your-registered-username">
                                        Please enter your registered username
                                    </span>
                                @endif
                            </div>
                            <div class="input-fields">
                                <span class="username">
                                    Username or Email Address
                                </span>
                                <input name="email" type="text"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                    placeholder="Enter Username or email address">

                            </div>
                            <div class="input-fields">
                                <span class="password">
                                    Password
                                </span>
                                <input type="password" name="password"
                                    class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                    placeholder="Enter Password">
                                <a href="" class="forgot-password ">
                                    <span class="float-end">Forgot Password?</span>
                                </a>
                            </div>
                            <div class="input-fields">
                                <button class="btn btn-primary btn-block p-2 sign-in">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
