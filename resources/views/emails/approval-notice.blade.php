@component('mail::message')

<p>
    NST Application submitted by {{$fullname}}, is awaiting your final approval, before applicant can have access to his/her certificate. You can also update application status, with reason as appropriate.
</p>
@component('mail::table')
    |                       |                                       |
    |-----------------      |--------------                         |
    | **Status**            | {{$status}}                           |
    | **Reason**            | {{$reason}}                           |
@endcomponent

Warm Regards
@endcomponent