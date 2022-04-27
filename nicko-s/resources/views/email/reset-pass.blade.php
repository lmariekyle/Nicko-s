@component('mail::message')
Change password here
 
Click the link to reset password:
<a href="{{ route('reset.password.get', $detail['token']) }}">{{ $detail['token'] }}</a>
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent