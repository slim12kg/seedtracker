<table class="table">
    <tr>
        <td>Applicant</td>
        <td>{{$registration->fullname}}</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>{{$registration->phone}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$registration->email}}</td>
    </tr>
    <tr>
        <td>Date Submitted</td>
        <td>{{$registration->created_at->format('d M Y')}}</td>
    </tr>
</table>

@php
    $type = $registration->applicant->user_type;
    $category = $registration->applicant->type_category;
@endphp

<form action="{{route('applications.update-category',$registration)}}" method="POST"
        {{$type == 'community seed producer' ? 'd-none' : ''}}>
    {{method_field('PUT')}}
    {{csrf_field()}}
    <fieldset class="form-group">
        <div class="row">
            <label for="email" class="col-md-4 control-label">Registration type</label>
            <div class="col-md-6 {{$type != 'seed company' ? 'd-none' : ''}}">
                <div class="form-check">
                    <input class="form-check-input" required type="radio"
                           {{$type == 'seed company' ? 'checked' : ''}}
                           name="user_type" id="seed_company" value="seed company">
                    <label class="form-check-label font-normal" for="seed_company">
                        Seed Company
                    </label>
                </div>
                <div class="form-check {{$type != 'research organization' ? 'd-none' : ''}}">
                    <input class="form-check-input" required type="radio" name="user_type"
                           {{$type == 'research organization' ? 'checked' : ''}}
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
            <label for="category" class="col-md-4 control-label d-none select_cat">Update Category</label>
            <div class="col-md-6 mt-1">
                <div class="form-check seed_company d-none">
                    <input class="form-check-input" required type="radio" {{$category == 'large scale company' ? 'checked' : ''}}
                    name="type_category" id="large_scale_company" value="large scale company">
                    <label class="form-check-label font-normal" for="large_scale_company">
                        Large Scale Company
                    </label>
                </div>
                <div class="form-check seed_company d-none">
                    <input class="form-check-input" required type="radio" name="type_category" {{$category == 'medium scale company' ? 'checked' : ''}}
                    id="medium_scale_company" value="medium scale company">
                    <label class="form-check-label font-normal" for="medium_scale_company">
                        Medium Scale Company
                    </label>
                </div>
                <div class="form-check seed_company d-none">
                    <input class="form-check-input" required type="radio" name="type_category" {{$category == 'small scale company' ? 'checked' : ''}}
                    id="small_scale_company" value="small scale company">
                    <label class="form-check-label font-normal" for="small_scale_company">
                        Small Scale Company
                    </label>
                </div>
                <div class="form-check seed_company d-none">
                    <input class="form-check-input" required type="radio" name="type_category" {{$category == 'seed company' ? 'checked' : ''}}
                    id="seed_producer_seller" value="seed company">
                    <label class="form-check-label font-normal" for="seed_producer_seller">
                        Seed Producer and Seller
                    </label>
                </div>
                <div class="form-check seed_company d-none">
                    <input class="form-check-input" required type="radio" name="type_category" {{$category == 'seed dealer' ? 'checked' : ''}}
                    id="seed_dealer" value="seed dealer">
                    <label class="form-check-label font-normal" for="seed_dealer">
                        Seed Dealer
                    </label>
                </div>


                <div class="form-check research_org d-none">
                    <input class="form-check-input" type="radio" name="type_category" {{$category == 'international research institute' ? 'checked' : ''}}
                    required id="international_research_institute" value="international research institute">
                    <label class="form-check-label font-normal" for="international_research_institute">
                        International Research Institute
                    </label>
                </div>

                <div class="form-check research_org d-none">
                    <input class="form-check-input" required type="radio" name="type_category" {{$category == 'universities' ? 'checked' : ''}}
                    id="universities" value="universities">
                    <label class="form-check-label font-normal" for="universities">
                        Universities
                    </label>
                </div>

                <div class="form-check research_org d-none">
                    <input class="form-check-input" type="radio" name="type_category" {{$category == 'federal agriculture institute' ? 'checked' : ''}}
                    required id="federal_agriculture_institute" value="federal agriculture institute">
                    <label class="form-check-label font-normal" for="federal_agriculture_institute">
                        Federal Agriculture Institute
                    </label>
                </div>

                <div class="form-check research_org d-none">
                    <input class="form-check-input" required type="radio" name="type_category" {{$category == 'cso/ngo' ? 'checked' : ''}}
                    id="cso_ngo" value="cso/ngo">
                    <label class="form-check-label font-normal" for="cso_ngo">
                        CSO/NGO
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            @if($registration->application_status === 'approved')
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            @else
                <a href="#" class="btn btn-primary disabled">
                    Update
                </a>
                <div class="row">
                   <div class="col-md-12">
                       <small class="text-danger">
                           Application already approved!
                       </small>
                   </div>
                </div>
            @endif
        </div>
    </div>
</form>

<div class="col mt-2">
    <h5>Contact {{$registration->business_name}}</h5>
</div>
@php
    $personnel = auth()->user()->name;
    $applicant = $registration->fullname;
@endphp
<div class="col">
    <a href="#" class="mr-1 d-inline-block" data-toggle="modal" data-target="#mail-applicant">
        <img width="32" src="{{asset('images/contact/mail.png')}}"/>
    </a>
    <a href="#" class="mr-1 d-inline-block" data-toggle="modal" data-target="#sms-applicant">
        <img width="32" src="{{asset('images/contact/speech-bubble.png')}}"/>
    </a>
    <a href="https://wa.me/{{$registration->phone}}?text={{"Hello $applicant, I'm  $personnel from NASC"}}" class="mr-1 d-inline-block">
        <img width="32" src="{{asset('images/contact/whatsapp.png')}}"/>
    </a>
</div>

{{--Send email to applicant--}}
<!-- Modal -->
<div class="modal fade" id="mail-applicant" tabindex="-1" role="dialog" aria-labelledby="mail-applicant" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Email {{ucwords($applicant)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('mail-applicant')}}" method="POST" id="mail-form">
                    {{csrf_field()}}
                    <input type="hidden" name="email" value="{{$registration->email}}">
                    <input type="hidden" name="name" value="{{ucwords($applicant)}}">
                    <div class="col">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" value="Update From {{ucwords($personnel)}} at NASC" name="subject" class="form-control">
                    </div>
                    <div class="col mt-2">
                        <label for="message">Message</label>
                        <textarea type="text" id="message" name="message" required rows="10" class="form-control"></textarea>
                    </div>
                    <div class="col mt-2 text-right">
                        <button type="submit" class="btn btn-primary">Send</button>
                        <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--Send sms to applicant--}}
<!-- Modal -->
<div class="modal fade" id="sms-applicant" tabindex="-1" role="dialog" aria-labelledby="sms-applicant" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smsTitle">SMS {{ucwords($applicant)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="sms-form">
                    {{csrf_field()}}
                    <div class="col mt-2">
                        <label for="message">Message (Maximum of 160 characters)</label>
                        <textarea type="text" id="message" name="message" required rows="5" class="form-control" maxlength="160"></textarea>
                    </div>
                    <div class="col mt-2 text-right">
                        <button type="submit" class="btn btn-primary">Send</button>
                        <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
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