@component('mail::message')
# Order Shipped
 
Reset password
<a href="{{ route('reset.password.get', $details['token']) }}">{{ $details['token'] }}</a>
 
@component('mail::button', ['url' => ''])
Reset
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent