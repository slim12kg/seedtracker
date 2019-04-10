@if($registration->trainings_received === 'yes')

    <h5><strong>Trainings</strong></h5>
    <hr>
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
                <td>Click <a target="_blank" href="{{url($registration->trainings['evidence'][$key])}}">here</a> to view</td>
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
