<table class="table">
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
        <td>Click <a target="_blank" href="{{url($registration->evidence_of_inc)}}">here</a> to view</td>
    </tr>
</table>