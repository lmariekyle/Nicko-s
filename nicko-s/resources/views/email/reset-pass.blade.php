@component('mail::message')
<h4 class="e-1">Nicko's Kitchen</h4>
 
Your password can be reset by clicking the link below. If you did not request a new password, please ignore this email.
<br><br><br>
 
@component('mail::button', ['url' => route('reset.password.get', $detail['token'])])
    Reset
@endcomponent


Thanks,<br>
Nicko's Kitchen
@endcomponent
