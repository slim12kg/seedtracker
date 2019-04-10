@if(auth()->user()->seedCompany())
    <div class="form-row">
        @if(!$registration->list_of_crop_to_be_handled)
            <div class="group-content">
                <div class="col-md-11 mb-3">
                    <label for="list_of_crop_to_be_handled">List Crop to Be Handled</label>
                    <input type="text" class="form-control" id="list_of_crop_to_be_handled" name="list_of_crop_to_be_handled[]" required>
                </div>
                <div class="col-md-1">
                    <label>&nbsp;</label>
                    <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
                </div>
                <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
            </div>
        @else
            @foreach($registration->list_of_crop_to_be_handled as $key => $crop)
                <div class="group-content">
                    <div class="col-md-11 mb-3">
                        <label for="list_of_crop_to_be_handled">List Crop to Be Handled</label>
                        <input type="text" class="form-control" id="list_of_crop_to_be_handled" name="list_of_crop_to_be_handled[]" value="{{$crop}}" required>
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
@else
    <div class="form-rows">
        <div class="col-md-11 mb-3">
            <label for="list_of_crop_to_be_handled">Crops to Be Handled</label>
        </div>
        <div class="col-md-6">
            @php
            $cropHandled = $registration->list_of_crop_to_be_handled ?: [];
            @endphp
            <div class="checkbox">
                <label class="checkbox">
                    <input type="checkbox" name="list_of_crop_to_be_handled[]" {{in_array('banana/plantain',$cropHandled) ? 'checked' :''}}  id="banana/plantain" value="banana/plantain">
                    Banana/Plantain
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="list_of_crop_to_be_handled[]" {{in_array('cassava',$cropHandled) ? 'checked' :''}}   id="cassava" value="cassava">
                    Cassava
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="list_of_crop_to_be_handled[]" {{in_array('yam',$cropHandled) ? 'checked' :''}}  id="yam" value="yam">
                    Yam
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="checkbox">
                <label class="checkbox">
                    <input type="checkbox" name="list_of_crop_to_be_handled[]" {{in_array('coco',$cropHandled) ? 'checked' :''}} id="coco" value="coco">
                    Coco
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="list_of_crop_to_be_handled[]" {{in_array('sweet potato',$cropHandled) ? 'checked' :''}} id="sweet_potato" value="sweet potato">
                    Sweet Potato
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="list_of_crop_to_be_handled[]" {{in_array('oil palm',$cropHandled) ? 'checked' :''}} id="oil_palm" value="oil palm">
                    Oil Palm
                </label>
            </div>
        </div>

        <div class="col-md-12 p-0">
            <div class="col-md-12">
                <label>Other Crops to Be Handled(Please Specify)</label>
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="form-row">
                @if(!$registration->list_of_crop_to_be_handled['others'])
                    <div class="group-content">
                        <div class="col-md-6 mb-3">
                            <label for="list_of_crop_to_be_handled">Crop Name</label>
                            <input type="text" class="form-control" id="list_of_crop_to_be_handled" name="list_of_crop_to_be_handled[others][]" required>
                        </div>

                        <div class="col-md-1">
                            <label>&nbsp;</label>
                            <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
                    </div>
                @else
                    @foreach($registration->list_of_crop_to_be_handled['others'] as $key => $crop)
                        <div class="group-content">
                            <div class="col-md-6 mb-3">
                                <label for="list_of_crop_to_be_handled">Crop Name</label>
                                <input type="text" class="form-control" id="list_of_crop_to_be_handled" name="list_of_crop_to_be_handled[others][]" value="{{$crop}}" required>
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
                    <input type="radio" name="type_of_seeds" {{$registration->type_of_seeds === 'conventional (opv)' ? 'checked' : ''}} id="conventional" value="conventional (opv)"> Conventional (OPV)
                </label>
                <label class="radio">
                    <input type="radio" name="type_of_seeds" {{$registration->type_of_seeds === 'conventional (hybrid)' ? 'checked' : ''}} id="hybrid" value="conventional (hybrid)">Conventional (Hybrid)
                </label>
                <label class="radio">
                    <input type="radio" name="type_of_seeds" {{$registration->type_of_seeds === 'genetically modified' ? 'checked' : ''}} id="genetically_modified" value="genetically modified"> Genetically Modified
                </label>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="detail_of_seeds">Details of <span id="seed_type_selected" class="text-capitalize">{{$registration->type_of_seeds}}</span> Seeds</label>
            <textarea class="form-control" id="detail_of_seeds" name="detail_of_seeds"  required>{{old('detail_of_seeds',$registration->detail_of_seeds)}}</textarea>
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
                    <input type="radio" name="source_of_parent_material" {{old('source_of_parent_material',$registration->source_of_parent_material) === 'breeder seed' ? 'checked' : ''}} id="breeder_seed" value="breeder seed"> Breeder Seed
                </label>
                <label class="radio">
                    <input type="radio" name="source_of_parent_material"
                           {{old('source_of_parent_material',$registration->source_of_parent_material) === 'foundation seed' ? 'checked' : ''}} id="foundation_seed" value="foundation seed"> Foundation Seed
                </label>
                <label class="radio">
                    <input type="radio" name="source_of_parent_material" {{old('source_of_parent_material',$registration->source_of_parent_material) === 'parental lines' ? 'checked' : ''}} id="parental_lines" value="parental lines">Parental Lines
                </label>
            </div>
        </div>
    </div>
@endif