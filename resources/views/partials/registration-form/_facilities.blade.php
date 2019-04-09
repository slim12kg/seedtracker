<div class="form-row">
    @if(auth()->user()->seedCompany())
        <div class="col-md-12">
            <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
            <label>Facilities Available</label>
            <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom03">Land Area</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Size in hectare(s)" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Farm Machinery & Implementation</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="Quantity" required>
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom03">Seed Processing & Grading Equipment</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Quantity" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Seed Processing & Packaging Equipment</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="Quantity" required>
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom03">Seed Storage / Warehouse</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Quantity" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Seed Testing Lab. & Quality Control Equipment</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="Quantity" required>
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>

        <div class="col-md-12 p-0">
            <div class="col-md-12">
                <label>Other Facilities Available (Please Specify)</label>
            </div>
            <div class="form-row">
                <div class="group-content">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom06">Name</label>
                        <input type="text" class="form-control" id="validationCustom06">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustom06">Quantity</label>
                        <input type="text" class="form-control" id="validationCustom06">
                    </div>
                    <div class="col-md-1">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
                </div>
            </div>
        </div>
</div>
@else
    <div class="col-md-12">
        <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
        <label>Facilities Available</label>
        <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationCustom03">Land Area</label>
        <input type="text" class="form-control" id="validationCustom03" placeholder="Size in hectare(s)" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationCustom04">Farm Machinery & Implementation</label>
        <input type="text" class="form-control" id="validationCustom04" placeholder="Quantity" required>
    </div>
    <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
@endif
<div class="col-md-12 p-0">
    <div class="col-md-12">
        <label>Other Facilities Available (Please Specify)</label>
    </div>
    <div class="form-row">
        <div class="group-content">
            <div class="col-md-6 mb-3">
                <label for="validationCustom06">Name</label>
                <input type="text" class="form-control" id="validationCustom06">
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationCustom06">Quantity</label>
                <input type="text" class="form-control" id="validationCustom06">
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        </div>
    </div>
</div>
</div>