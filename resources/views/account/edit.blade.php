@extends('layouts.app')

@section('content')
        <div class="row" style="margin-top:30px">
            @include('partials._dashboard-menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Account Profile</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('account.update')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstname">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname',auth()->user()->firstname)}}">
                                    @if($errors->has('firstname'))
                                        <div class="invalid-feedback text-danger">
                                            {{$errors->first('firstname')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastname">Last name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname',auth()->user()->lastname)}}">
                                    @if($errors->has('lastname'))
                                        <div class="invalid-feedback text-danger">
                                            {{$errors->first('lastname')}}
                                        </div>
                                    @endif
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="">Select your gender</option>
                                            <option {{old('gender',auth()->user()->gender) === 'male' ? 'selected' : ''}} value="male">Male</option>
                                            <option {{old('gender',auth()->user()->gender) === 'female' ? 'selected' : ''}} value="female">Female</option>
                                            <option {{old('gender',auth()->user()->gender) === 'other' ? 'selected' : ''}} value="other">Other</option>
                                        </select>
                                        @if($errors->has('gender'))
                                            <div class="invalid-feedback text-danger">
                                                {{$errors->first('gender')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="profile_image">New Profile Image</label>
                                        <input type="file" class="form-control p-3px" accept=".jpeg,.png,.jpg,image/png,image/jpeg" name="profile_image" id="profile_image">
                                        @if($errors->has('profile_image'))
                                            <div class="invalid-feedback text-danger">
                                                {{$errors->first('profile_image')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('email',auth()->user()->phone)}}" placeholder="Minimum of 11 characters">
                                        @if($errors->has('phone'))
                                            <div class="invalid-feedback text-danger">
                                                {{$errors->first('phone')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{old('email',auth()->user()->email)}}">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback text-danger">
                                                {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if(auth()->user()->seedCompany())
                                    <div class="col-md-12" style="margin-top: 3.5%"></div>
                                    <div class="form-rows">
                                        <div class="col-md-12">
                                            <label class="mb-none">Profession {{old('profession',auth()->user()->profession)}}</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio mt-none">
                                                <label class="radio" for="administrator">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'administrator' ? 'checked' : ''}} id="administrator" value="administrator" required>Administrator
                                                </label>
                                                <label class="radio" for="agronomy">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) == 'agronomy' ? 'checked' : ''}} id="agronomy" value="agronomy" required> Agronomy
                                                </label>
                                                <label class="radio" for="breeding">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'breeding' ? 'checked' : ''}} id="breeding" value="breeding" required> Breeding
                                                </label>
                                                <label class="radio" for="farming">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'farming' ? 'checked' : ''}} id="farming" value="farming" required> Farming
                                                </label>
                                                <label class="radio" for="seed_business">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'seed business' ? 'checked' : ''}} id="seed_business" value="seed business" required> Seed Business
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio">
                                                <label class="radio">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'journalist' ? 'checked' : ''}} id="journalist" value="journalist" required> Journalist
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'plant health' ? 'checked' : ''}} id="plant_health" value="plant health" required> Plant Health
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'regulator' ? 'checked' : ''}} id="regulator" value="regulator" required>Regulator
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'self employed' ? 'checked' : ''}} id="self_employed" value="self employed" required> Self Employed
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="profession" {{old('profession',auth()->user()->profession) === 'trader' ? 'checked' : ''}} id="trader" value="trader" required> Trader
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom: 0.1%"></div>
                                @else
                                    <div class="col-md-12" style="margin-bottom: 3%"></div>
                                @endif

                                <div class="form-rows">
                                    <div class="col-md-12">
                                        <button style="" class="btn btn-primary" type="submit">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection