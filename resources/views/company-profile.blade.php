@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top:50px">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        Dashboard
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Edit Profile</a>
                    <a href="#" class="list-group-item list-group-item-action">Update Password</a>
                    <a href="#" class="list-group-item list-group-item-action active">Company Registration</a>
                    <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="list-group-item list-group-item-action">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Company Profile</div>

                    <div class="panel-body">
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Applicant First name</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Applicant Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="" required>

                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
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
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom06">Place(s) of business (full contact details)</label>
                                        <textarea class="form-control" id="validationCustom06"  required></textarea>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Phone No.</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Email</label>
                                        <input type="text" class="form-control" id="validationCustom04" placeholder="" required>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.1%">&nbsp;</div>
                                <hr>

                                <div class="form-row" style="margin-left: 2.5%">
                                    <h5><strong>Category of Business</strong></h5>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Sole Proprietorship</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Partnership</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">LLC</label>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom03">Names(s) of Proprietor/Partner/Manager</label>
                                        <textarea class="form-control" id="validationCustom06"  required placeholder="Enter one per line"></textarea>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom03">Names(s) of Board Of Directors</label>
                                        <textarea class="form-control" id="validationCustom06"  required placeholder="Enter one per line"></textarea>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom03">How Long Have You Been in The Seed Business</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="e.g 1 year" required>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom03">List Crop(s) to Be Handled</label>
                                        <textarea class="form-control" id="validationCustom06"  required placeholder="Enter one per line"></textarea>
                                    </div>
                                </div>

                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-row" style="margin-left: 2.5%"><h5><strong>Details of Seeds</strong></h5></div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Conventional</label>
                                        <textarea class="form-control" id="validationCustom06"  required placeholder="Enter one per line"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Genetically Modified</label>
                                        <textarea class="form-control" id="validationCustom06"  required placeholder="Enter one per line"></textarea>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>

                                <div class="form-row" style="margin-left: 2.5%">
                                    <h5><strong>Source of Parent Material</strong></h5>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Breeder Seed</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Foundation Seed</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Parental Lines</label>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5%">&nbsp;</div>


                                <div style="margin-bottom: 0.5%">&nbsp;</div>
                                <div class="form-group" style="margin-left: 2.5%">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <button style="margin-left: 2.5%" class="btn btn-primary" type="submit">Submit Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection