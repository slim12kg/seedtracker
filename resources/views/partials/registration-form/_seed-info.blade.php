@if(auth()->user()->seedCompany())
    <div class="form-row">
        <div class="group-content">
            <div class="col-md-11 mb-3">
                <label for="validationCustom06">List Crop to Be Handled</label>
                <input type="text" class="form-control" id="validationCustom06">
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        </div>
    </div>
@else
    <div class="form-rows">
        <div class="col-md-11 mb-3">
            <label for="validationCustom06">Crops to Be Handled</label>
        </div>
        <div class="col-md-6">
            <div class="checkbox">
                <label class="checkbox">
                    <input type="checkbox" name="profession" class="{{old('profession') === 'journalist' ? 'checked' : ''}}" id="journalist" value="journalist"> Banana/Plantain
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="profession" class="{{old('profession') === 'plant health' ? 'checked' : ''}}" id="plant_health" value="plant health"> Cassava                                 </label>
                <label class="checkbox">
                    <input type="checkbox" name="profession" class="{{old('profession') === 'regulator' ? 'checked' : ''}}" id="regulator" value="regulator">Yam
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="checkbox">
                <label class="checkbox">
                    <input type="checkbox" name="profession" class="{{old('profession') === 'journalist' ? 'checked' : ''}}" id="journalist" value="journalist">Coco
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="profession" class="{{old('profession') === 'plant health' ? 'checked' : ''}}" id="plant_health" value="plant health"> Sweet Potato                                 </label>
                <label class="checkbox">
                    <input type="checkbox" name="profession" class="{{old('profession') === 'regulator' ? 'checked' : ''}}" id="regulator" value="regulator">Oil Palm
                </label>
            </div>
        </div>

        <div class="col-md-12 p-0">
            <div class="col-md-12">
                <label>Other Crops to Be Handled(Please Specify)</label>
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="form-row">
                <div class="group-content">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom06">Crop Name</label>
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
@endif

@if(auth()->user()->seedCompany())
    <div class="form-rows">
        <div class="col-md-12">
            <label class="mb-none">Type of Seeds</label>
        </div>
        <div class="col-md-12">
            <div class="radio">
                <label class="radio">
                    <input type="radio" name="type_of_seed" class="{{old('type_of_seed') === 'conventional (opv)' ? 'checked' : ''}}" id="conventional" value="conventional (opv)"> Conventional (OPV)
                </label>
                <label class="radio">
                    <input type="radio" name="type_of_seed" class="{{old('type_of_seed') === 'conventional (hybrid)' ? 'checked' : ''}}" id="hybrid" value="conventional (hybrid)">Conventional (Hybrid)
                </label>
                <label class="radio">
                    <input type="radio" name="type_of_seed" class="{{old('type_of_seed') === 'genetically modified' ? 'checked' : ''}}" id="genetically_modified" value="genetically modified"> Genetically Modified
                </label>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="validationCustom03">Details of <span id="seed_type_selected" class="text-capitalize"></span> Seeds</label>
            <textarea class="form-control" id="validationCustom06"  required></textarea>
        </div>
    </div>
    <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>

    <div class="form-rows">
        <div class="col-md-12">
            <label class="mb-none">Source of Parent Material</label>
        </div>
        <div class="col-md-12">
            <div class="radio">
                <label class="radio">
                    <input type="radio" name="profession" class="{{old('profession') === 'journalist' ? 'checked' : ''}}" id="journalist" value="journalist"> Breeder Seed
                </label>
                <label class="radio">
                    <input type="radio" name="profession" class="{{old('profession') === 'plant health' ? 'checked' : ''}}" id="plant_health" value="plant health"> Foundation Seed                                 </label>
                <label class="radio">
                    <input type="radio" name="profession" class="{{old('profession') === 'regulator' ? 'checked' : ''}}" id="regulator" value="regulator">Parental Lines
                </label>
            </div>
        </div>
    </div>
@endif