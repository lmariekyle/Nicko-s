@component('mail::message')
Change password here
 
Click the link to reset password:
<a href="{{ route('reset.password.get', $details['token']) }}">{{ $details['token'] }}</a>
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent