<table class="table">
    @if($registration->applicant->seedCompany())
        <tr>
            <td>List crop to be handled</td>
            <td>
                @foreach($registration->list_of_crop_to_be_handled as $key => $crops)
                    {{$crops}} {{$key == count($registration->list_of_crop_to_be_handled) - 1 ? '' : ','}}
                @endforeach
            </td>
        </tr>
    @endif
    @if(!$registration->applicant->seedCompany())
        <tr>
            <td>Other crops to be handled</td>
            <td>
                @foreach($registration->list_of_crop_to_be_handled['others'] as $key => $crops)
                    {{$crops}} {{$key == count($registration->list_of_crop_to_be_handled['others']) - 1 ? '' : ','}}
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