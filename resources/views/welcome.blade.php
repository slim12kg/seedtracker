@extends('layouts.app')

@section('content')
    <div class="body_contain">
        <div class="container-fluid">
            <div class="site-heading">
                <h1>Seed Tracker Application</h1>
            </div>

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div id="confirm-msg" class="alert alert-dismissible" role="alert"></div>
                <!-- Indicators -->
                <ol class="carousel-indicators hidden">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="seed-a.jpeg" alt="" />
                    </div>
                    <div class="item">
                        <img src="seed-a.jpeg" alt="" />
                    </div>
                    <div class="item">
                        <img src="seed-a.jpeg" alt="" />
                    </div>
                </div>

                <!-- Left and right controls -->
                <div class="row mybuttonrow">
                    @if(auth()->check())
                        <a href="{{route('home')}}" class="btn btn-primary btn-lg col-sm-4 left mybuttonrow-left">
                            <span class="tx">Dashboard</span>
                        </a>
                    @else
                        <a href="{{route('register')}}" class="btn btn-primary btn-lg col-sm-4 left mybuttonrow-left">
                            <span class="tx">New registration</span>
                        </a>
                    @endif
                    @if(auth()->check())
                        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                           class="btn btn-primary btn-lg col-sm-4 right mybuttonrow-right">
                            <span class="tx">Logout here</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                            <a href="{{route('login')}}" class="btn btn-primary btn-lg col-sm-4 right mybuttonrow-right" id="check-status">
                                <span class="tx">Login here</span>
                            </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection