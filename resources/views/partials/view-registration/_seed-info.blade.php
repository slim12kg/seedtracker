@php
    $seedCompany = $registration->applicant->seedCompany();
@endphp

<table class="table">
    @if($seedCompany)
        <tr>
            <td>List of crops to be handled</td>
            <td>
                @foreach($registration->list_of_crop_to_be_handled as $key => $crop)
                    {{$crop}} {{$key == count($registration->list_of_crop_to_be_handled) - 1 ? '' : ','}}
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
    @if(!$seedCompany)
        <tr>
            <td>Other crops to be handled</td>
            <td>
                @foreach($registration->list_of_crop_to_be_handled['others'] as $key => $crops)
                    {{$crops}} {{$key == count($registration->list_of_crop_to_be_handled['others']) - 1 ? '' : ','}}
                @endforeach
            </td>
        </tr>
    @endif
    @if($seedCompany)
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