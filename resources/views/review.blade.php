@extends('layouts.app')

@section('content')
    <div class="row mt-50" style="margin-top: 30px;margin-bottom:20px">
        {{--        @include('partials._dashboard-menu')--}}
        <div class="col-md-12">
            <h1 class="text-center" style="margin-top: 0">NASC SEED TRACKER APPLICATION</h1>
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
            <form class="" method="POST" action="{{route('registration.submit')}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-row">
                    {{--Persoanl bio--}}
                    <h4>Personal Bio</h4>
                    <table class="table table-bordered">
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

                    <!--Business Info-->
                    <h4>Business Info</h4>
                    <table class="table table-bordered">
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
                        <tr>
                            <td>Places of business</td>
                            <td>
                                @foreach($registration->place_of_businesses as $key => $business)
                                    {{$business}} {{$key == count($registration->place_of_businesses) - 1 ? '' : ','}}
                                @endforeach
                            </td>
                        </tr>
                        @if($registration->applicant->seedCompany())
                            <tr>
                                <td>Category of business</td>
                                <td>{{$registration->category_of_business}}</td>
                            </tr>
                            <tr>
                                <td>Names of proprietor / partner / manager</td>
                                <td>
                                    @foreach($registration->name_of_proprietors as $key => $proprietor)
                                        {{$proprietor}} {{$key == count($registration->name_of_proprietors) - 1 ? '' : ','}}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Names of board of director</td>
                                <td>
                                    @foreach($registration->name_of_board_of_directors as $key => $board_of_director)
                                        {{$board_of_director}} {{$key == count($registration->name_of_board_of_directors) - 1 ? '' : ','}}
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>How long in seed business</td>
                            <td>{{$registration->how_long_in_seed_business}}</td>
                        </tr>
                    </table>
                    <h4 class="next-page">Seed Info</h4>
                    <table class="table table-bordered">
                        {{--Seed Info--}}
                        @if($registration->applicant->seedCompany())
                            <tr>
                                <td>List of crops to be handled</td>
                                <td>
                                    @foreach($registration->list_of_crop_to_be_handled as $key => $crops)
                                        {{$crops}}{{$key == count($registration->list_of_crop_to_be_handled) - 1 ? '' : ','}}
                                    @endforeach
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>List of crops to be handled</td>
                                <td>
                                    @foreach($registration->list_of_crop_to_be_handled as $key => $crop)
                                        @if($key != 'others')
                                            {{$crop}} {{$key == count($registration->list_of_crop_to_be_handled) - 2 ? '' : ','}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if(!$registration->applicant->seedCompany())
                            <tr>
                                <td>Other crops to be handled</td>
                                <td>
                                    @foreach($registration->list_of_crop_to_be_handled['others'] as $key => $crop)
                                        {{$crop}} {{$key == count($registration->list_of_crop_to_be_handled['others']) - 1 ? '' : ','}}
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if($registration->applicant->seedCompany())
                            <tr>
                                <td>Type of seeds</td>
                                <td>{{$registration->type_of_seeds}}</td>
                            </tr>
                            <tr>
                                <td>Details of {{$registration->type_of_seeds}} seeds</td>
                                <td>{{$registration->detail_of_seeds}}</td>
                            </tr>
                            <tr>
                                <td>Source of parent material</td>
                                <td>{{$registration->source_of_parent_material}}</td>
                            </tr>
                        @endif
                    </table>

                    <h4>Facilities</h4>
                    <table class="table table-bordered">
                        @if($registration->applicant->seedCompany())
                            <tr>
                                <td>Land area (hectares)</td>
                                <td>{{$registration->land_area}}</td>
                            </tr>
                            <tr>
                                <td>Farm machinery & implementation (qty)</td>
                                <td>{{$registration->farm_machinery_implementation}}</td>
                            </tr>
                            <tr>
                                <td>Seed processing & grading equipment (qty)</td>
                                <td>{{$registration->seed_processing_grading_equipment}}</td>
                            </tr>
                            <tr>
                                <td>Seed processing & packaging equipment (qty)</td>
                                <td>{{$registration->seed_processing_packaging_equipment}}</td>
                            </tr>
                            <tr>
                                <td>Seed storage / warehouse (qty)</td>
                                <td>{{$registration->seed_storage_warehouse}}</td>
                            </tr>
                            <tr>
                                <td>Seed testing lab. & quality control equipment (qty)</td>
                                <td>{{$registration->seed_testing_lab_quality_control_equipment}}</td>
                            </tr>
                        @else
                            <tr>
                                <td>Land area (hectares)</td>
                                <td>{{$registration->land_area}}</td>
                            </tr>
                            <tr>
                                <td>Farm machinery & implementation (qty)</td>
                                <td>{{$registration->farm_machinery_implementation}}</td>
                            </tr>
                        @endif
                        @foreach($registration->other_facilities_available['name'] as $key => $facility)
                            <tr>
                                <td>{{$facility}} (qty)</td>
                                <td>{{ $registration->other_facilities_available['qty'][$key] }}</td>
                            </tr>
                        @endforeach
                    </table>

                    @if($registration->applicant->seedCompany())
                        <h4>Finance</h4>
                        <table class="table table-bordered">
                            <tr>
                                <td>Breeder (nos.)</td>
                                <td>{{$registration->trained_breeder}}</td>
                            </tr>
                            <tr>
                                <td>Seed analyst (nos)</td>
                                <td>{{$registration->trained_seed_analyst}}</td>
                            </tr>
                            <tr>
                                <td>Agronomist (nos)</td>
                                <td>{{$registration->trained_agronomist}}</td>
                            </tr>
                            <tr>
                                <td>Finance to cover operation (₦)</td>
                                <td>{{number_format($registration->finance_to_cover_operation)}}</td>
                            </tr>
                            <tr>
                                <td>Evidence of incorporation</td>
                                <td>[File attached]</td>
                            </tr>
                        </table>
                    @endif

                    @if(!$registration->applicant->seedCompany())
                        <h4>Training</h4>
                        @if($registration->trainings_received === 'yes')
                            @foreach($registration->trainings['crop_trained'] as  $key => $training)
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Training</td>
                                        <td>00{{$key + 1}}</td>
                                    </tr>
                                    <tr>
                                        <td>Crop trained</td>
                                        <td>{{$training}}</td>
                                    </tr>
                                    <tr>
                                        <td>Organizer institute</td>
                                        <td>{{$registration->trainings['organizer_institute'][$key]}}</td>
                                    </tr>
                                    <tr>
                                        <td>Organizer name</td>
                                        <td>{{$registration->trainings['organizer_name'][$key]}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of training</td>
                                        <td>{{$registration->trainings['date_of_training'][$key]}}</td>
                                    </tr>
                                    <tr>
                                        <td>Evidence of training</td>
                                        <td>[File attached]</td>
                                        {{--<td>Click <a target="_blank" href="{{url($registration->trainings['evidence'][$key])}}">here</a> to view</td>--}}
                                    </tr>
                                </table>
                            @endforeach
                        @else
                            <table class="table">
                                <tr>
                                    <td>Trainings received in seed production</td>
                                    <td>{{$registration->trainings_received}}</td>
                                </tr>
                            </table>
                        @endif
                    @endif



                    <a href="{{url()->previous()}}" class="btn btn-primary">
                        <strong>Back</strong>
                    </a>
                    <a style="margin-left: 1.5%" onclick="event.preventDefault();window.print();" class="btn btn-primary">
                        <strong>Print Application</strong>
                    </a>
                    <button style="margin-left: 1.5%" class="btn btn-primary" type="submit">
                        <strong>Submit Application</strong>
                    </button>
                </div>
            </form>
            <div class="col-md-12" style="margin-bottom: 1.5%">&nbsp;</div>

            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

@section('styles')
    <style>
        @media print{
            .footer{
                display: none;
            }

            a.btn,button.btn{
                display: none;
            }

            .next-page{
                margin-top: 20px;
            }
        }
    </style>
@endsection