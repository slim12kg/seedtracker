@if(auth()->user()->seedCompany())
    <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
    <div class="col-md-12">
        <label>Suitable trained personnel</label>
    </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="trained_breeder">Breeder (no.)</label>
            <input type="number" name="trained_breeder" class="form-control" value="{{old('trained_breeder',$registration->trained_breeder)}}" id="trained_breeder">
        </div>
        <div class="col-md-4 mb-3">
            <label for="trained_seed_analyst">Seed analyst (no.)</label>
            <input type="number" class="form-control" value="{{old('trained_seed_analyst',$registration->trained_seed_analyst)}}" name="trained_seed_analyst" id="trained_seed_analyst">
        </div>
        <div class="col-md-4 mb-3">
            <label for="trained_agronomist">Agronomist (no.)</label>
            <input type="number" class="form-control" value="{{old('trained_agronomist',$registration->trained_agronomist)}}" name="trained_agronomist" id="trained_agronomist">
        </div>
        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="finance_to_cover_operation">Finance to cover operation (₦)</label>
            <input type="number" class="form-control" value="{{old('finance_to_cover_operation',$registration->finance_to_cover_operation)}}" name="finance_to_cover_operation" id="finance_to_cover_operation">
        </div>
        <div class="col-md-6 mb-3">
            <label for="evidence_of_inc">Upload evidence of incorporation</label>
            <input type="file" class="form-control p-3px" name="evidence_of_inc" accept=".jpeg,.pdf,application/pdf,image/jpeg" id="evidence_of_inc"
                    {{!$registration->evidence_of_inc  ? 'required' : '' }}>
            @if($registration->evidence_of_inc)
                <span class="text-danger">view uploaded file <a target="_blank" href="{{url($registration->evidence_of_inc)}}">here</a>. You can re-upload file</span>
            @endif
        </div>
    </div>
@endif