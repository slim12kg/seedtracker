@component('mail::message')

## Dear {{$firstname}},

<p>
    Your NST Seed Tracker application has been {{$status}}.
</p>
<p>
    Reason: {{$reason}}
</p>

Regards,
Admin
@endcomponent