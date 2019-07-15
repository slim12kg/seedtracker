@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top:50px">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">
                        @if(session('error'))
                            <div class="alert alert-info">
                                {{session('error')}}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}" name="login-form">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-md-offset-4 col-sm-12">
                                <div class="pull-left" id="render-captcha"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?onload=reCaptchaCallback&render=explicit" async defer></script>

    <script>
        var RC2KEY = '6Le9vpwUAAAAAFCsxhfzcVLIuZok9hXDUaiR2ry5',
            doSubmit = false;

        function reCaptchaVerify(response) {
            if (response === document.querySelector('.g-recaptcha-response').value) {
                doSubmit = true;
            }
        }

        function reCaptchaExpired () {
            alert('Captcha expired');
           window.location.reload();
        }

        function reCaptchaCallback () {
            grecaptcha.render('render-captcha', {
                'sitekey': RC2KEY,
                'callback': reCaptchaVerify,
                'expired-callback': reCaptchaExpired
            });
        }

        document.forms['login-form'].addEventListener('submit',function(e){
            if (!doSubmit) {
                e.preventDefault();
                return false;
            }
        })
    </script>
@endsection
