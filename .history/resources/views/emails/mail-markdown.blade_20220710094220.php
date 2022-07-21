@component('mail::message')
# Thanksfull

The body of your contact us.

@component('mail::button', ['url' => ''])
our 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
