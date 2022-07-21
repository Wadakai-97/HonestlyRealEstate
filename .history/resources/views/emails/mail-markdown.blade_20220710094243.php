@component('mail::message')
# Thanksfull

The body of your contact us.

@component('mail::button', ['url' => ''])
our wwbsite
@endcomponent

Thank you so much.<br>
{{ config('app.name') }}
@endcomponent
