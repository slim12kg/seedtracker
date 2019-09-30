@component('mail::message')

## Dear {{$firstname}},

<p>
    Welcome to National Seed Tracker.
</p>
<p>
    Thanks for registering on the NASC Seed Tracker.
</p>

@component('mail::button', ['url' => $activation])
    Click here to activate your account
@endcomponent

Regards,<br>
Admin
@endcomponent