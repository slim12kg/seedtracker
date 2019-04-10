<table class="table">
    @if($registration->applicant->seedCompany())
        <tr>
            <td>Land area (hectares)</td>
            <td>{{$registration->land_area}}</td>
            {{--<td>--}}
            {{--@foreach($registration->list_of_crop_to_be_handled as $key => $crops)--}}
            {{--{{$crops}} {{$key == count($registration->list_of_crop_to_be_handled) - 1 ? '' : ','}}--}}
            {{--@endforeach--}}
            {{--</td>--}}
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