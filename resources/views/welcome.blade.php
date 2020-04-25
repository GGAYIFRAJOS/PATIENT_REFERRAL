<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EREFERRAL</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.css') }}">

        <link rel="shortcut icon" href="{{ URL::asset('/images/logo.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/all.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}"></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"></a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="container" style="margin:auto;">
                    <img src="{{ URL::asset('/images/referral2.jpg') }}" alt="">
                </div>
                <div class="container" style="margin:auto;">
                    <h3><U> EREFERRAL MANAGEMENT INFORMATION SYSTEM</U></h3>
                </div>
                <div class="container" style="margin:auto;">
                    <a href="{{ route('login') }}" class="btn btn-primary"><i class="fas fa-pen"></i>LOGIN</a>
                    <a href="{{ route('register') }}" class="btn btn-warning"><i class="fas fa-book"></i>REGISTER</a>
                </div>
            </div>
        </div>
    </body>
</html>
