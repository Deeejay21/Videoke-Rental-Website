@component('mail::message')

<strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}
<strong>Email:</strong> {{ $user->email }}

<strong>Message:</strong> {{ $data['message'] }}

@endcomponent
