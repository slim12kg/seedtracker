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

<div class="col">
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