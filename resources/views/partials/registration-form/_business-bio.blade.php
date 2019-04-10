<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="business_name">Business Name</label>
        <input type="text" class="form-control" id="business_name" name="business_name" value="{{old('business_name',$registration->business_name)}}" required>
        @if (!$errors->has('business_name'))
            <div class="text-danger">
                {{$errors->first('business_name')}}
            </div>
        @endif
    </div>
</div>
<div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="street">Street</label>
        <input type="text" class="form-control" id="street" name="street"  value="{{old('street',$registration->street)}}" required>
        @if (!$errors->has('street'))
            <div class="text-danger">
                {{$errors->first('street')}}
            </div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" value="{{old('city',$registration->city)}}" required>
        @if (!$errors->has('city'))
            <div class="text-danger">
                {{$errors->first('city')}}
            </div>
        @endif
    </div>
</div>
<div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="state">State</label>
        <input type="text" class="form-control" id="state" name="state" value="{{old('state',$registration->state)}}" required>
        @if (!$errors->has('state'))
            <div class="text-danger">
                {{$errors->first('state')}}
            </div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" name="country" value="{{old('country',$registration->country)}}" required>
        @if (!$errors->has('country'))
            <div class="text-danger">
                {{$errors->first('country')}}
            </div>
        @endif
    </div>
</div>
<div style="margin-bottom: 0.5%">&nbsp;</div>
<div class="form-row">
    @if(!$registration->place_of_businesses)
        <div class="group-content">
            <div class="col-md-11 mb-3">
                <label for="place_of_businesses">Place of business (full contact details)</label>
                <input type="text" class="form-control" id="place_of_businesses" name="place_of_businesses[]" required>
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        </div>
    @else
        @foreach($registration->place_of_businesses as $key => $business)
            <div class="group-content">
                <div class="col-md-11 mb-3">
                    <label for="place_of_businesses">Place of business (full contact details)</label>
                    <input type="text" class="form-control" id="place_of_businesses" name="place_of_businesses[]" value="{{$business}}" required>
                </div>
                <div class="col-md-1">
                    <label>&nbsp;</label>
                    @if($key == 0)
                        <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
                    @else
                        <button class="btn btn-danger btn-sm" title="remove" onclick="event.preventDefault();removeGroup(this)"> &minus; </button>
                    @endif
                </div>
                <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
            </div>
        @endforeach
    @endif
</div>