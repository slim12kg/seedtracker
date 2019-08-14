@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top:50px">
                <div class="panel panel-default">
                    <div class="panel-heading">Registration Form</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" name="register-form">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="firstname" class="col-md-4 control-label">Firstname</label>
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label">Lastname</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                    <label for="email" class="col-md-4 control-label">Registration type</label>
                                    <div class="col-md-6 mt-1">
                                        <div class="form-check">
                                            <input class="form-check-input" required type="radio" {{old('user_type') == 'seed company' ? 'checked' : ''}} name="user_type" id="seed_company" value="seed company">
                                            <label class="form-check-label font-normal" for="seed_company">
                                                Seed Company
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" required type="radio" name="user_type"
                                                   {{old('user_type') == 'community seed producer' ? 'checked' : ''}}  id="community_seed_producer"
                                                   value="community seed producer">
                                            <label class="form-check-label font-normal" for="community_seed_producer">
                                                Community Seed Producer
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" required type="radio" name="user_type" {{old('user_type') == 'research organization' ? 'checked' : ''}}
                                            id="research_organization" value="research organization">
                                            <label class="form-check-label font-normal" for="research_organization">
                                                Research Organization / NGO's
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group d-none"  id="type-fields">
                                <div class="row">
                                    <label for="category" class="col-md-4 control-label d-none select_cat">Select Category</label>
                                    <div class="col-md-6 mt-1">
                                        <div class="form-check seed_company d-none">
                                            <input class="form-check-input" required type="radio" {{old('type_category') == 'large scale company' ? 'checked' : ''}}
                                            name="type_category" id="large_scale_company" value="large scale company">
                                            <label class="form-check-label font-normal" for="large_scale_company">
                                                Large Scale Company
                                            </label>
                                        </div>
                                        <div class="form-check seed_company d-none">
                                            <input class="form-check-input" required type="radio" name="type_category" {{old('type_category') == 'medium scale company' ? 'checked' : ''}}
                                            id="medium_scale_company" value="medium scale company">
                                            <label class="form-check-label font-normal" for="medium_scale_company">
                                                Medium Scale Company
                                            </label>
                                        </div>
                                        <div class="form-check seed_company d-none">
                                            <input class="form-check-input" required type="radio" name="type_category" {{old('type_category') == 'small scale company' ? 'checked' : ''}}
                                            id="small_scale_company" value="small scale company">
                                            <label class="form-check-label font-normal" for="small_scale_company">
                                                Small Scale Company
                                            </label>
                                        </div>
                                        <div class="form-check seed_company d-none">
                                            <input class="form-check-input" required type="radio" name="type_category" {{old('type_category') == 'seed company' ? 'checked' : ''}}
                                            id="seed_producer_seller" value="seed company">
                                            <label class="form-check-label font-normal" for="seed_producer_seller">
                                                Seed Producer and Seller
                                            </label>
                                        </div>
                                        <div class="form-check seed_company d-none">
                                            <input class="form-check-input" required type="radio" name="type_category" {{old('type_category') == 'seed dealer' ? 'checked' : ''}}
                                            id="seed_dealer" value="seed dealer">
                                            <label class="form-check-label font-normal" for="seed_dealer">
                                                Seed Dealer
                                            </label>
                                        </div>


                                        <div class="form-check research_org d-none">
                                            <input class="form-check-input" type="radio" name="type_category" {{old('type_category') == 'international research institute' ? 'checked' : ''}}
                                            required id="international_research_institute" value="international research institute">
                                            <label class="form-check-label font-normal" for="international_research_institute">
                                                International Research Institute
                                            </label>
                                        </div>

                                        <div class="form-check research_org d-none">
                                            <input class="form-check-input" required type="radio" name="type_category" {{old('type_category') == 'universities' ? 'checked' : ''}}
                                            id="universities" value="universities">
                                            <label class="form-check-label font-normal" for="universities">
                                                Universities
                                            </label>
                                        </div>

                                        <div class="form-check research_org d-none">
                                            <input class="form-check-input" type="radio" name="type_category" {{old('type_category') == 'federal agriculture institute' ? 'checked' : ''}}
                                            required id="federal_agriculture_institute" value="federal agriculture institute">
                                            <label class="form-check-label font-normal" for="federal_agriculture_institute">
                                                Federal Agriculture Institute
                                            </label>
                                        </div>

                                        <div class="form-check research_org d-none">
                                            <input class="form-check-input" required type="radio" name="type_category" {{old('type_category') == 'cso/ngo' ? 'checked' : ''}}
                                            id="cso_ngo" value="cso/ngo">
                                            <label class="form-check-label font-normal" for="cso_ngo">
                                                CSO/NGO
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <div class="row">
                                    <label for="registered_before" class="col-md-4 control-label">Have you registered before?</label>
                                    <div class="col-md-6 mt-1">
                                        <div class="form-check">
                                            <input class="form-check-input" required type="radio"  id="yes"
                                                   name="registered_before" value="yes">
                                            <label class="form-check-label font-normal" for="yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" required type="radio" id="no"
                                                   name="registered_before" checked value="no">
                                            <label class="form-check-label font-normal" for="no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

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
                                <label for="password-confirm" class="col-md-4 control-label">Confirm password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-md-offset-4 col-sm-12">
                                <div class="pull-left" id="render-captcha"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .d-none{
            display:none;
        }
    </style>
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

        document.forms['register-form'].addEventListener('submit',function(e){
            if (!doSubmit) {
                e.preventDefault();
                return false;
            }
        });

        @if($type = old('user_type'))
        $(function(){
            toggleType('{{$type}}');
        });
        @endif

        $(function () {
            $(document).on('change','[name=user_type]',function(e){
                var type = $('[name=user_type]:checked').val();

                toggleType(type);
            });
        });

        function toggleType(type) {
            var wrap = $('.select_cat');
            var seedCompany = $('.seed_company');
            var researchOrg = $('.research_org');
            var comProducer = $('.com_seed_company');
            var regType = $('#type-fields');

            switch (type){
                case "seed company":
                    regType.removeClass('d-none');
                    wrap.removeClass('d-none');
                    seedCompany.removeClass('d-none');
                    researchOrg.addClass('d-none');
                    researchOrg.addClass('d-none');
                    break;
                case "research organization":
                    regType.removeClass('d-none');
                    wrap.removeClass('d-none');
                    researchOrg.removeClass('d-none');
                    seedCompany.addClass('d-none');
                    comProducer.addClass('d-none');
                    break;
                case "community seed producer":
                    regType.addClass('d-none');
                    wrap.addClass('d-none');
                    seedCompany.addClass('d-none');
                    researchOrg.addClass('d-none');
                    researchOrg.addClass('d-none');
                    break;
                default:
                    regType.addClass('d-none');
                    break;
            }
        }
    </script>
@endsection
