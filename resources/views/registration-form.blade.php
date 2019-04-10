@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top:50px">
        @include('partials._dashboard-menu')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Company Profile</div>

                <div class="panel-body">
                    <form class="" method="POST" action="{{route('registration.complete')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-row">
                            @include('partials.registration-form._applicant-bio')
                            <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>

                            @include('partials.registration-form._business-bio')

                            @include('partials.registration-form._business-coop-bio')
                            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>

                            @include('partials.registration-form._seed-info')

                            @include('partials.registration-form._facilities')

                            @include('partials.registration-form._finance-personnel')

                            @include('partials.registration-form._training-received')

                            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input name="terms" type="checkbox" value="yes" required>
                                            Agree to <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                    @if ($errors->has('terms'))
                                        <div class="text-danger">
                                            Please agree to terms & condition to submit registration
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
                            <button style="margin-left: 2.5%" class="btn btn-primary" type="submit">Complete Registration</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function(){
            $('input[name=type_of_seed]').on('change',function(){
                var option = $(this).val();

                $('#seed_type_selected').text(option);
            });

            $('input[name=trainings_received]').on('change',function(){
                var option = $(this).val();
                var group = $('#training_group');

                if(option === 'yes'){
                    group.removeClass('hide');
                    group.find('input').attr('required',true);
                }else{
                    group.addClass('hide');
                    group.find('input').attr('required',false);
                }
            });
        })
    </script>
@endsection