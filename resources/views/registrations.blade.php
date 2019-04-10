@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top:30px">
        @include('partials._dashboard-menu')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Submitted Applications</div>

                <div class="panel-body">
                    {{--<div class="col-md-12 table-responsive">--}}
                        @if(!empty($registrations))
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
                            <div class="alert alert-danger text-left">
                                No application currently available for review.
                            </div>
                        @endif
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection