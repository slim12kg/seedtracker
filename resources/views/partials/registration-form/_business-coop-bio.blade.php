@if(auth()->user()->seedCompany())
    <div class="form-row" style="margin-left: 2.5%">
        <h5><strong>Category of Business</strong></h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" {{$registration->category_of_business === 'sole proprietorship' ? 'checked' : ''}} name="category_of_business" id="sole" value="sole proprietorship" required>
            <label class="form-check-label font-normal" for="sole">Sole Proprietorship</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" {{$registration->category_of_business === 'partnership' ? 'checked' : ''}} type="radio" name="category_of_business" id="partnership" value="partnership">
            <label class="form-check-label font-normal" for="partnership">Partnership</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" {{$registration->category_of_business === 'llc' ? 'checked' : ''}}  type="radio" name="category_of_business" id="llc" value="llc">
            <label class="form-check-label font-normal" for="llc">LLC</label>
        </div>
    </div>

    <div style="margin-bottom: 0.5%">&nbsp;</div>
    <div class="form-row">
        @if(!$registration->name_of_proprietors)
            <div class="group-content">
                <div class="col-md-11 mb-3">
                    <label for="name_of_proprietors">Names of Proprietor / Partner / Manager</label>
                    <input type="text" class="form-control" id="name_of_proprietors" name="name_of_proprietors[]" required>
                </div>
                <div class="col-md-1">
                    <label>&nbsp;</label>
                    <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
                </div>
                <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
            </div>
        @else
            @foreach($registration->name_of_proprietors as $key => $proprietor)
                <div class="group-content">
                    <div class="col-md-11 mb-3">
                        <label for="name_of_proprietors">Names of Proprietor / Partner / Manager</label>
                        <input type="text" class="form-control" id="name_of_proprietors" name="name_of_proprietors[]" value="{{$proprietor}}">
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

<div style="margin-bottom: 0.5%">&nbsp;</div>

<div class="form-row">
    @if(!$registration->name_of_board_of_directors)
    <div class="group-content">
        <div class="col-md-11 mb-3">
            <label for="name_of_board_of_directors">Names of Board of Director</label>
            <input type="text" class="form-control" id="name_of_board_of_directors" name="name_of_board_of_directors[]" required>
        </div>
        <div class="col-md-1">
            <label>&nbsp;</label>
            <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
    </div>
    @else
        @foreach($registration->name_of_board_of_directors as $key => $board_of_director)
            <div class="group-content">
                <div class="col-md-11 mb-3">
                    <label for="name_of_board_of_directors">Names of Board of Director</label>
                    <input type="text" class="form-control" id="name_of_board_of_directors" name="name_of_board_of_directors[]" value="{{$board_of_director}}" required>
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
@endif

<div style="margin-bottom: 0.5%">&nbsp;</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="how_long_in_seed_business">How Long Have You Been in The Seed Business</label>
        <select class="form-control" name="how_long_in_seed_business" id="how_long_in_seed_business">
            <option {{$registration->how_long_in_seed_business === 'less than 1 year' ? 'checked' : ''}} value="less than 1 year">Less than 1 year</option>
            <option {{$registration->how_long_in_seed_business === 'up to 1 year' ? 'checked' : ''}} value="up to 1 year">up to 1 year</option>
            <option {{$registration->how_long_in_seed_business === 'up to 2 year' ? 'checked' : ''}} value="up to 2 years">up to 2 years</option>
            <option {{$registration->how_long_in_seed_business === 'up to 3 year' ? 'checked' : ''}} value="up to 3 years">up to 3 years</option>
            <option {{$registration->how_long_in_seed_business === 'up to 4 year' ? 'checked' : ''}} value="up to 4 years">up to 4 years</option>
            <option {{$registration->how_long_in_seed_business === 'up to 5 year' ? 'checked' : ''}} value="up to 5 years">up to 5 years</option>
        </select>
    </div>
</div>