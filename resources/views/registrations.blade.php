@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top:30px">
        @include('partials._dashboard-menu')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Submitted Applications</div>

                <div class="panel-body">
                    <div class="row mb-0point5">
                        <form action="{{route('applications.filter')}}" methos="GET">
                            <div class="col-md-3">
                                <label for="issue_date">Issue Year</label>
                                <select name="issue_date" id="issue_date" class="form-control">
                                    <option value="">All</option>
                                    @for($year = 2018; $year < 2020; $year++)
                                        <option {{request('issue_date') == $year ? 'selected' : ''}}
                                                value="{{$year}}">{{$year}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="company_name">Company name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{request('company_name')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="producer_type">Producer type</label>
                                <select name="producer_type" id="producer_type" class="form-control">
                                    <option value="">All types</option>
                                    <option {{request('producer_type') == "seed company" ? 'selected' : ''}}
                                            value="seed company">Seed Company</option>
                                    <option {{request('producer_type') == "community seed producer" ? 'selected' : ''}}
                                            value="community seed producer">Community Seed Producer</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="registration_no">Registration no.</label>
                                <input type="text" class="form-control" id="registration_no" name="registration_no" value="{{request('registration_no')}}">
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="state">States</label>
                                <select name="state" id="state" class="form-control">
                                    <option value="">All States</option>
                                    @foreach($states as $state)
                                        <option {{request('state') == $state ? 'selected' : ''}}
                                                value="{{$state}}">{{$state}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="application_status">Application status</label>
                                <select name="application_status" id="application_status" class="form-control">
                                    <option value="">All</option>
                                    <option {{request('application_status') == "pending" ? 'selected' : ''}}
                                            value="pending">Pending</option>
                                    <option {{request('application_status') == "queried" ? 'selected' : ''}}
                                            value="queried">Queried</option>
                                    <option {{request('application_status') == "approved" ? 'selected' : ''}}
                                            value="approved">Approved</option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-1">
                                <label for="registration_no">&nbsp;</label>
                                <button class="btn btn-success form-control">
                                    <strong>🔍 Search</strong>
                                </button>
                            </div>
                        </form>
                    </div>
                    <br>
                    {{--<div class="col-md-12 table-responsive">--}}
                    @if($registrations->count())
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>Applicant</td>
                                <td>Date submitted</td>
                                <td>Last updated</td>
                                <td>Last reviewed</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <td>{{$registration->fullname}}</td>
                                    <td>{{$registration->created_at->format('d M Y')}}</td>
                                    <td>{{$registration->updated_at->format('d M Y')}}</td>
                                    <td>{{$registration->last_reviewed_by_admin ? $registration->last_reviewed_by_admin->format('d M Y') : ' Not reviewed '}}</td>
                                    <td>{{$registration->application_status}}</td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('applications.view',$registration)}}"><small>View Application</small></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info text-left">
                            <strong>No result returned!</strong>
                        </div>
                    @endif
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection