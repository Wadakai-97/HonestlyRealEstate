@component('mail::message')
# Thanksfull

The body of your contact us.

@component('mail::button', ['url' => ''])
our wwbsite
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
