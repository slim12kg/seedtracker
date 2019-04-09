<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="seed tracker application">
    <meta name="author" content="">
    <meta name="theme-color" content="#0A3764">
    <title>Seed Tracker App</title>
    <link rel="stylesheet" href="{{asset('css/tmp/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/tmp/override.css')}}" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet">
</head>
<body>
<div class="container_global">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href=/en/>
                    <img id="link_presidence" alt="" src="/images/seedtrackerlogo.png" style="width: 33%;padding: 4% 0;">
                </a>
            </div>

        @php
            $route = Route::currentRouteName();
        @endphp

        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{$route === 'welcome' ? 'active' : ''}}">
                        <a href="{{url('/')}}">
                            Home <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="{{$route === 'about' ? 'active' : ''}}">
                        <a href="{{route('about')}}">About</a>
                    </li>
                    <li class="{{$route === 'faq' ? 'active' : ''}}">
                        <a href="{{route('faq')}}">Frequently Asked Questions</a>
                    </li>
                    <li class="{{$route === 'contact' ? 'active' : ''}}">
                        <a href="{{route('contact')}}">Contact us</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a title="English" href="#">
                            EN
                        </a>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        @if(session()->has('notification'))
            <div class="alert alert-info alert-dismissible mb-none" style="margin-top:30px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Notification: </strong> {{session('notification')}}
            </div>
        @endif

        @yield('content')
    </div>
    <div class="footer">
        <div class="container-fluid">
            <!-- Modal -->
            <div class="modal fade" id="mlModal" role="dialog">
                <!-- Modal Content-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Legal Notice</h4>
                        </div>
                        <div class="modal-body">
                            The seed tracker website is the exclusive property of IITA Seed Tracker Team.
                        </div>
                    </div>
                </div>
            </div>
            <a href='{{url('/')}}'>
                <img style="width: 100px;height: 53px;margin: 1%;" id="link_evisa" alt="" src="/images/seedtrackerlogo.png">
            </a>
            <footer class="container-fluid text-center foot">
                <div class="copyrights">
                    <a class="link" href="{{url('/')}}">
                        Home                </a>
                    <a class="link" href="{{route('about')}}">
                        About
                    </a>
                    <a class="link" href="{{route('faq')}}">
                        Frequently Asked Questions
                    </a>
                    <a class="link" href="{{route('contact')}}">
                        Contact us
                    </a>
                    <a class="mentions right" href="#" data-toggle="modal" data-target="#mlModal" id="" >
                        Legal Notice
                    </a>
                </div>
            </footer>
        </div>
    </div>
</div>

<script src="{{asset('js/tmp/script.js')}}"></script>
{{--<script src="{{asset('js/tmp/script-01.js')}}"></script>--}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function addMore(e){
        var group = $(e).closest('.group-content');
        var newGroup = group.clone();

        newGroup.find('button').replaceWith('<button class="btn btn-danger btn-sm" title="remove" onclick="event.preventDefault();removeGroup(this)"> &minus;</button>');
        group.after(newGroup);
    }

    function removeGroup(e) {
        $(e).closest('.group-content').remove();
    }
</script>
@yield('scripts')
</body>

</html>