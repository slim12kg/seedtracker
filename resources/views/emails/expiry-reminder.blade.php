@component('mail::message')

## Hello {{$firstname}},

<p>
        Your certificate obtained on the NASC Seedtracker website will expire in on {{$exipry}}.
        Please make sure to renew your certificate before then, or you won't be regarded by a licenced producer on our platform.
</p>
<p>
        We recommend renewing certificate by visiting {{$url}} and login to complete the process.
</p>
<p>
        For any questions or support, please visit {{$url}}, or send a reply to this email.
</p>

Regards,<br>
The NASC Seedtracker
@endcomponent