@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top:30px">
        @include('partials._dashboard-menu')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Application Status: {{$registration->application_status}}</div>

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Personal Bio</a></li>
                        <li><a data-toggle="tab" href="#menu2">Business Info.</a></li>
                        <li><a data-toggle="tab" href="#menu3">Seed Info.</a></li>
                        <li><a data-toggle="tab" href="#menu4">Facilities</a></li>
                        <li><a data-toggle="tab" href="#menu5">Finance Personnel</a></li>
                        <li><a data-toggle="tab" href="#menu6">Training</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <table class="table">
                                <tr>
                                    <td>Applicant</td>
                                    <td>{{$registration->fullname}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$registration->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$registration->email}}</td>
                                </tr>
                            </table>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <table class="table">
                                <tr>
                                    <td>Business name</td>
                                    <td>{{$registration->business_name}}</td>
                                </tr>
                                <tr>
                                    <td>Street</td>
                                    <td>{{$registration->street}}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{$registration->city}}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>{{$registration->state}}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{$registration->country}}</td>
                                </tr>
                            </table>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3>Seed Information</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <h3>Facilities</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <h3>Finance Personnel</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                            <h3>Training Received</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-sm">
                            <strong>Approve Application</strong>
                        </button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reject-modal">
                            <strong>Reject Application</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1"  id="reject-modal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputAmount">Reason</label>
                                <div class="form-group">
                                    <textarea name="reason" class="form-control" id="exampleInputAmount" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Back</button>
                        <button type="button" class="btn btn-primary">
                            <strong>Updated Application</strong>
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
@endsection