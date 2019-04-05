@if(auth()->user()->seedCompany())
    <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
    <div class="col-md-12">
        <label>Suitable Trained Personnel</label>
    </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom06">Breeder (No.)</label>
            <input type="text" class="form-control" id="validationCustom06">
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom06">Seed Analyst (No.)</label>
            <input type="text" class="form-control" id="validationCustom06">
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom06">Agronomist (No.)</label>
            <input type="text" class="form-control" id="validationCustom06">
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom06">Finance to Cover Operation (₦)</label>
            <input type="text" class="form-control" id="validationCustom06">
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom06">Upload Evidence of Incorporation</label>
            <input type="file" class="form-control p-3px" id="validationCustom06">
        </div>
    </div>
@endif