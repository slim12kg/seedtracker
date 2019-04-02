@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top:50px">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                    Dashboard
                </a>
                <a href="#" class="list-group-item list-group-item-action">Edit Profile</a>
                <a href="#" class="list-group-item list-group-item-action">Update Password</a>
                <a href="#" class="list-group-item list-group-item-action">Company Registration</a>
                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                   class="list-group-item list-group-item-action">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome {{auth()->user()->name}}, you are now logged in!
<hr>
                    <div class="alert alert-danger text-left">
                        Next you need to complete your <strong>company profile</strong> registration. <a href="{{route('company-profile')}}">Click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
