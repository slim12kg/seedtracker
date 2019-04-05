@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top:50px">
            @include('partials._dashboard-menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Account Profile</div>

                    <div class="panel-body">
                        <form method="POST" action="#" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstname">New Password</label>
                                    <input type="text" class="form-control" id="password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback text-danger">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="text" class="form-control" name="password_confirmation" id="password_confirmation">
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-rows">
                                    <div class="col-md-12">
                                        <button style="" class="btn btn-primary" type="submit">
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection