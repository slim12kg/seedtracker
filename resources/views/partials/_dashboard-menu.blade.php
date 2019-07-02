@php
    $route = Route::currentRouteName();
@endphp

<div class="col-md-3">
    <div class="panel mb-none">
        <div class="panel-body avatar-panel">
            <div class="col-md-4 p-0">
                <img src="{{asset(auth()->user()->profile_image?: 'storage/profile/avatar.png')}}" class="img-responsive img-circle"  alt="profile photo">
            </div>
            <div class="col-md-8 avatar-desc">
                <div class="col-md-12 p-0">
                    {{auth()->user()->name}}
                </div>
                <div class="divider col-md-12"></div>
                <div class="col-md-12 p-0 text-capitalize">
                    {{auth()->user()->user_type}}
                </div>
            </div>
        </div>
    </div>
    <div class="list-group">
        <a href="{{route('home')}}" class="list-group-item list-group-item-action {{$route === 'home' ? 'active' : ''}}">
            Dashboard
        </a>
        <a href="{{route('account.edit')}}" class="list-group-item list-group-item-action {{$route === 'account.edit' ? 'active' : ''}}">Edit Profile</a>
        <a href="{{route('account.password')}}" class="list-group-item list-group-item-action {{$route === 'account.password' ? 'active' : ''}}">Update Password</a>
        @if(auth()->user()->is_admin)
            <a href="{{route('applications.review')}}" class="list-group-item list-group-item-action {{$route === 'applications.review'  || $route === 'applications.filter'  ? 'active' : ''}}">
                Applications
            </a>
        @else
            <a href="{{route('company.registration')}}" class="list-group-item list-group-item-action {{$route === 'company.registration' ? 'active' : ''}}">
                {{auth()->user()->seedCompany() ? 'Company' : 'Producer'}} Registration
            </a>
        @endif
        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
           class="list-group-item list-group-item-action">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    @if(auth()->user()->is_admin)
        <div class="panel mb-none panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Log history</h3>
            </div>
            <div class="panel-body" id="log-book">
                @foreach($logs as $log)
                    <p class="mb-0point5">
                        <span class="text-danger">{{$log->created_at}}</span> {{$log->description}}
                    </p>
                @endforeach
            </div>
        </div>
    @endif
</div>