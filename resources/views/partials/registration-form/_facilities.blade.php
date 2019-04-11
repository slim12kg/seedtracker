<div class="form-row">
    @if(auth()->user()->seedCompany())
        <div class="col-md-12">
            <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
            <label>Facilities available</label>
            <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="land_area">Land area (hectares)</label>
            <input type="number" class="form-control" id="land_area" name="land_area" placeholder="Size in hectare(s)" value="{{old('land_area',$registration->land_area)}}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="farm_machinery_implementation">Farm machinery & implementation (qty)</label>
            <input type="number" class="form-control" id="farm_machinery_implementation" name="farm_machinery_implementation" placeholder="Quantity" value="{{old('farm_machinery_implementation',$registration->farm_machinery_implementation)}}" required>
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        <div class="col-md-6 mb-3">
            <label for="seed_processing_grading_equipment">Seed processing & grading equipment (qty)</label>
            <input type="number" class="form-control" id="seed_processing_grading_equipment" name="seed_processing_grading_equipment" placeholder="Quantity" value="{{old('seed_processing_grading_equipment',$registration->seed_processing_grading_equipment)}}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom04">Seed processing & packaging equipment (qty)</label>
            <input type="number" class="form-control" id="seed_processing_packaging_equipment" name="seed_processing_packaging_equipment" placeholder="Quantity" value="{{old('seed_processing_packaging_equipment',$registration->seed_processing_packaging_equipment)}}" required>
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        <div class="col-md-6 mb-3">
            <label for="validationCustom03">Seed storage / warehouse (qty)</label>
            <input type="number" class="form-control" id="seed_storage_warehouse" name="seed_storage_warehouse" placeholder="Quantity" value="{{old('seed_storage_warehouse',$registration->seed_storage_warehouse)}}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="seed_testing_lab_quality_control_equipment">Seed testing lab. & quality control equipment (qty)</label>
            <input type="number" class="form-control" id="seed_testing_lab_quality_control_equipment" name="seed_testing_lab_quality_control_equipment" placeholder="Quantity" value="{{old('seed_testing_lab_quality_control_equipment',$registration->seed_testing_lab_quality_control_equipment)}}" required>
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
</div>
@else
    <div class="col-md-12">
        <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
        <label>Facilities available</label>
        <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="land_area">Land area (hectares)</label>
        <input type="number" class="form-control" id="land_area" placeholder="Size in hectare(s)" value="{{old('land_area',$registration->land_area)}}" name="land_area" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="farm_machinery_implementation">Farm machinery & implementation (qty)</label>
        <input type="number" class="form-control" id="farm_machinery_implementation" name="farm_machinery_implementation" placeholder="Quantity" value="{{old('farm_machinery_implementation',$registration->farm_machinery_implementation)}}" required>
    </div>
    <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
@endif
<div class="col-md-12 p-0">
    <div class="col-md-12">
        <label>Other Facilities Available (Please Specify)</label>
    </div>
    <div class="form-row">
        @if(!$registration->other_facilities_available)
        <div class="group-content">
            <div class="col-md-6 mb-3">
                <label for="other_facilities_available_name">Name</label>
                <input type="text" class="form-control" id="other_facilities_available_name" name="other_facilities_available[name][]" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="other_facilities_available_qty">Quantity</label>
                <input type="number" class="form-control" id="other_facilities_available_qty" name="other_facilities_available[qty][]" required>
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        </div>
        @else
            @foreach($registration->other_facilities_available['name'] as $key => $facility)
                <div class="group-content">
                    <div class="col-md-6 mb-3">
                        <label for="other_facilities_available_name">Name</label>
                        <input type="text" class="form-control" id="other_facilities_available_name" name="other_facilities_available[name][]" value="{{$facility}}" required>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="other_facilities_available_qty">Quantity</label>
                        <input type="number" class="form-control" id="other_facilities_available_qty" name="other_facilities_available[qty][]"
                               value="{{$registration->other_facilities_available['qty'][$key]}}"  required>
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
</div>