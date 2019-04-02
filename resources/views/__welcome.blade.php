<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IITA</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="{{asset('tinyslide/css/tinyslide.css')}}" rel="stylesheet" />
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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

        .top-left{
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .top-left a,.top-right a{
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .content {
            text-align: center;
            width: 80%;
            height: 78vh;
        }

        .title {
            font-size: 42px;
        }

        .m-b-md {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-left links">
        <a href="{{ url('/') }}">Home</a>
    </div>
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="#" style="margin: 0 10px;">|</a>
                <a href="{{ url('/register') }}">Register</a>
                <a href="#" style="margin: 0 10px;">|</a>
                <a href="{{ url('/register') }}">&#9993; Contact</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Seed Tracker
        </div>
        <section id="tiny" class="tinyslide">
            <aside class="slides">
                <figure> <img src="seed-a.jpeg" alt="">
                    {{--<figcaption> Description </figcaption>--}}
                </figure>
                <figure> <img src="seed-b.jpeg" alt="">
                    {{--<figcaption> Description </figcaption>--}}
                </figure>
                <figure> <img src="seed-c.jpeg" alt="">
                    {{--<figcaption> Description </figcaption>--}}
                </figure>
            </aside>
        </section>
    </div>
</div>
</body>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="{{asset('tinyslide/js/tinyslide.js')}}"></script>
<script>
    var tiny = $('#tiny').tiny().data('api_tiny');
</script>
</html>
