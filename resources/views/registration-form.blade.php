@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top:50px">
            @include('partials._dashboard-menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Company Profile</div>

                    <div class="panel-body">
                        <form class="" method="POST" action="#" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Applicant First name</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Applicant Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="" required>

                                </div>

                                <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Phone No.</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Email</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="" required>
                                </div>

                                <div class="col-md-12" style="margin-bottom: 0.1%">&nbsp;</div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Business Name</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Postal Address</label>
                                        <input type="text" class="form-control" id="validationCustom04" placeholder="" required>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row">
                                    <div class="group-content">
                                        <div class="col-md-11 mb-3">
                                            <label for="validationCustom06">Place of business (full contact details)</label>
                                            <input type="text" class="form-control" id="validationCustom06">
                                        </div>
                                        <div class="col-md-1">
                                            <label>&nbsp;</label>
                                            <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
                                    </div>
                                </div>

                                @if(auth()->user()->seedCompany())
                                    <div class="form-row" style="margin-left: 2.5%">
                                        <h5><strong>Category of Business</strong></h5>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label font-normal" for="inlineRadio1">Sole Proprietorship</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label font-normal" for="inlineRadio2">Partnership</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                            <label class="form-check-label font-normal" for="inlineRadio3">LLC</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 0.5%">&nbsp;</div>

                                    <div class="form-row">
                                        <div class="group-content">
                                            <div class="col-md-11 mb-3">
                                                <label for="validationCustom06">Names of Proprietor / Partner / Manager</label>
                                                <input type="text" class="form-control" id="validationCustom06">
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
                                                <label for="validationCustom06">Names of Board of Director</label>
                                                <input type="text" class="form-control" id="validationCustom06">
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
                                        <label for="how_long">How Long Have You Been in The Seed Business</label>
                                        <select class="form-control" name="how_long" id="">
                                            <option value="less than 1 year">Less than 1 year</option>
                                            <option value="1 year">1 year</option>
                                            <option value="2 year">2 years</option>
                                            <option value="3 year">3 years</option>
                                            <option value="4 year">4 years</option>
                                            <option value="5 year">5 years</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
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
                                                <label>Other Crops (Please Specify)</label>
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

                                @if(auth()->user()->seedCompany())
                                    <div class="form-row">
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
                                                <label>Other Facilities (Please Specify)</label>
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
                                    <div class="form-row">
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
                                    </div>
                                @endif

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
                                            <label for="validationCustom06">Finance to Cover Operation (N)</label>
                                            <input type="text" class="form-control" id="validationCustom06">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom06">Upload Evidence of Incorporation</label>
                                            <input type="file" class="form-control p-3px" id="validationCustom06">
                                        </div>
                                    </div>
                                @endif


                                <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Agree to <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>

                                <button style="margin-left: 2.5%" class="btn btn-primary" type="submit">Submit Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function(){
            $('input[name=type_of_seed]').on('change',function(){
                var option = $(this).val();

                $('#seed_type_selected').text(option);
            })
        })
    </script>
@endsection