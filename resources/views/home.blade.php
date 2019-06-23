@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top:30px">
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
                    @if(!auth()->user()->registered && !auth()->user()->is_admin)
                        <div class="alert alert-danger text-left">
                            Next you need to complete your <strong>company profile</strong> registration.
                            <a href="{{route('company.registration')}}">Click here</a>
                        </div>
                    @endif

                    @if(auth()->user()->registered)
                        <div class="alert alert-danger text-left">
                            Application status: <strong class="text-capitalize">{{$status = auth()->user()->registration->application_status}}</strong>.
                            @if($status !== 'pending')
                                @if($status !== 'approved')
                                    <br>
                                    Reason: <span>{{auth()->user()->registration->status_reason}}</span>
                                @else
                                    <br>
                                    Click <a target="_blank" href="{{route('certificate')}}">here</a> to print your verified certificate
                                @endif
                            @endif
                        </div>
                    @endif

                    @if(auth()->user()->is_admin)
                        <div class="alert alert-danger text-left">
                            You have <strong><u><a href="{{route('applications.review')}}">{{$pending}} Pending</a></u></strong>
                            applications to review.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
