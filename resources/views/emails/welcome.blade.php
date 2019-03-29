@component('mail::message')

## Welcome to {{ config('app.name')  }}

The Cassava Seed Tracker™ is a fully featured program for real-time tracking of cassava seed production, including pre-planting planning, registration of seed fields, crop management, harvesting, quality assessment and quality assertion. The Cassava Seed Tracker is also a digital platform for communication and networking of cassava seed producers and service providers for common good.
<hr>
<br>
We provide the following solutions:
<br>
1. Crop Management Tools

2. Cassava Community

3. Cassava Variety Info

4. Cassava Trading Info

5. Decision Support

<br>
@component('mail::button', ['url' => 'seedtracker.corpreneur.com.ng'])
    Activate Your Account
@endcomponent

Regards,<br>
{{ config('app.name') }} Team

@endcomponent