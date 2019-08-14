<div class="col-md-6 mb-3">
    <label for="applicant_firstname">Applicant first name</label>
    <input type="text" class="form-control" id="applicant_firstname" name="applicant_firstname" value="{{old('applicant_firstname',$registration->applicant_firstname)}}" required>
    @if (!$errors->has('applicant_firstname'))
        <div class="text-danger">
            {{$errors->first('applicant_firstname')}}
        </div>
    @endif
</div>

<div class="col-md-6 mb-3">
    <label for="applicant_lastname">Applicant last name</label>
    <input type="text" class="form-control" id="applicant_lastname" name="applicant_lastname" value="{{old('applicant_lastname',$registration->applicant_lastname)}}" required>
    @if (!$errors->has('applicant_lastname'))
        <div class="text-danger">
            {{$errors->first('applicant_lastname')}}
        </div>
    @endif
</div>

<div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>

<div class="col-md-6 mb-3">
    <label for="phone">Phone no.</label>
    <input type="text" class="form-control" id="phone" readonly name="phone" value="{{old('phone',$registration->phone)}}" required>
    @if (!$errors->has('phone'))
        <div class="text-danger">
            {{$errors->first('phone')}}
        </div>
    @endif
</div>

<div class="col-md-6 mb-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" readonly name="email" value="{{old('email',$registration->email)}}" required>
    @if (!$errors->has('email'))
        <div class="text-danger">
            {{$errors->first('email')}}
        </div>
    @endif
</div>