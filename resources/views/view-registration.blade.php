@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top:30px">
        @include('partials._dashboard-menu')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6 text-capitalize">
                            <strong>{{$registration->applicant->user_type}}</strong>
                        </div>
                        <div class="col-md-6 text-right text-capitalize">
                            <strong>Application Status:</strong> <span class="label label-danger">
                                {{$registration->application_status}}
                                {{$registration->provisional ? '(Awaiting)' : ''}}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Personal Bio</a></li>
                        <li><a data-toggle="tab" href="#menu2">Business Info.</a></li>
                        <li><a data-toggle="tab" href="#menu3">Seed Info.</a></li>
                        <li><a data-toggle="tab" href="#menu4">Facilities</a></li>
                        @if($registration->applicant->seedCompany())
                            <li><a data-toggle="tab" href="#menu5">Finance/Personnel</a></li>
                        @endif
                        @if(!$registration->applicant->seedCompany())
                            <li><a data-toggle="tab" href="#menu6">Training</a></li>
                        @endif
                        @if($registration->application_status === 'approved')
                            <li><a data-toggle="tab" href="#menu7">Certificate</a></li>
                        @endif
                    </ul>

                    @php
                        $type = $registration->applicant->user_type;
                        $category = $registration->applicant->type_category;
                    @endphp


                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            @include('partials.view-registration._personal-bio')
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            @include('partials.view-registration._business-bio')
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            @include('partials.view-registration._seed-info')
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            @include('partials.view-registration._facilities')
                        </div>
                        @if($registration->applicant->seedCompany())
                            <div id="menu5" class="tab-pane fade">
                                @include('partials.view-registration._finance')
                            </div>
                        @endif
                        @if(!$registration->applicant->seedCompany())
                            <div id="menu6" class="tab-pane fade">
                                @include('partials.view-registration._training')
                            </div>
                        @endif
                        @if($registration->application_status === 'approved')
                            <div id="menu7" class="tab-pane fade">
                                <br>
                                <p>
                                    Click <a target="_blank" href="{{route('certificate.view',$registration)}}">here</a>
                                    to view applicant certificate
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if($registration->application_status !== 'approved' || auth()->user()->is_dg)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <h5>Update Application status</h5>
                            <hr>
                            <button class="btn btn-success btn-sm" data-toggle="modal" onclick="event.preventDefault();setStatus('approved','Approve Application')" data-target="#reject-modal">
                                <strong>Approve Application</strong>
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="event.preventDefault();setStatus('rejected','Reject Application')" data-target="#reject-modal">
                                <strong>Reject Application</strong>
                            </button>
                            <button class="btn btn-info btn-sm" data-toggle="modal" onclick="event.preventDefault();setStatus('queried','Query Application')" data-target="#reject-modal">
                                <strong>Query Application</strong>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="modal fade" tabindex="-1"  id="reject-modal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="update_type"></h4>
                    </div>
                    <form action="{{route('applications.view',$registration)}}" method="POST" class="form-horizontal">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <input type="hidden" name="status" id="application_status" value="pending">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status_reason">Reason</label>
                                    <textarea name="status_reason" class="form-control" id="status_reason" cols="30" rows="5">{{$registration->status_reason}}</textarea>
                                </div>
                            </div>
                            <div class="form-group hide" id="application_dates_from">
                                <div class="col-md-6">
                                    <label for="certification_start_date">Certification dates from</label>
                                    <input type="date" name="certification_start_date"
                                           id="certification_start_date"
                                           value="{{$registration->certification_start_date ? $registration->certification_start_date->format('Y-m-d') : ''}}"
                                           class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="certification_end_date">Certification dates to</label>
                                    <input type="date" name="certification_end_date"
                                           value="{{$registration->certification_end_date ? $registration->certification_end_date->format('Y-m-d') : ''}}"
                                           id="certification_end_date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">&larr; Back</button>
                            <button type="submit" class="btn btn-primary">
                                <strong>Updated Status</strong>
                            </button>
                        </div>
                    </form>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
    <script>
        function  setStatus(status, title)
        {
            console.log(status,title);
            document.getElementById('application_status').value = status;
            document.getElementById('update_type').innerHTML = title;

            var group = $('#application_dates_from');

            if(status === 'approved'){
                group.removeClass('hide');
                group.find('input').attr('required',true);
            }else{
                group.addClass('hide');
                group.find('input').removeAttr('required');
            }
        }

        @if($type)
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