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