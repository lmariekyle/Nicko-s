@component('mail::message')
# Order Shipped
 
Reset password
{{-- <a href="{{ route('reset.password.get', $detail['token']) }}">{{ $detail['token'] }}</a> --}}
 
@component('mail::button', ['url' => 'reset.password.get'])
Reset
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent