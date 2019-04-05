@if(auth()->user()->seedCompany())
    <div class="form-row" style="margin-left: 2.5%">
        <h5><strong>Category of Business</strong></h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="category_of_business" id="sole" value="sole proprietorship" required>
            <label class="form-check-label font-normal" for="sole">Sole Proprietorship</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="partnership" id="partnership" value="partnership">
            <label class="form-check-label font-normal" for="partnership">Partnership</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="llc" id="llc" value="llc">
            <label class="form-check-label font-normal" for="llc">LLC</label>
        </div>
    </div>

    <div style="margin-bottom: 0.5%">&nbsp;</div>
    <div class="form-row">
        <div class="group-content">
            <div class="col-md-11 mb-3">
                <label for="name_of_proprietors">Names of Proprietor / Partner / Manager</label>
                <input type="text" class="form-control" id="name_of_proprietors" name="name_of_proprietors[]">
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        </div>
    </div>
    <div style="margin-bottom: 0.5%">&nbsp;</div>

    <div class="form-row">
        <div class="group-content">
            <div class="col-md-11 mb-3">
                <label for="name_of_board_of_directors">Names of Board of Director</label>
                <input type="text" class="form-control" id="name_of_board_of_directors" name="name_of_board_of_directors[]">
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        </div>
    </div>
@endif

<div style="margin-bottom: 0.5%">&nbsp;</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="how_long_in_seed_business">How Long Have You Been in The Seed Business</label>
        <select class="form-control" name="how_long_in_seed_business" id="how_long_in_seed_business">
            <option value="less than 1 year">Less than 1 year</option>
            <option value="up to 1 year">up to 1 year</option>
            <option value="up to 2 years">up to 2 years</option>
            <option value="up to 3 years">up to 3 years</option>
            <option value="up to 4 years">up to 4 years</option>
            <option value="up to 5 years">up to 5 years</option>
        </select>
    </div>
</div>