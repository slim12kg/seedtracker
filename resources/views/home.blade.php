@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top:50px">
        @include('partials._dashboard-menu')
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
                        Next you need to complete your <strong>company profile</strong> registration. <a href="{{route('company.registration')}}">Click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
