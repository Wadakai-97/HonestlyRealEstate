@component('mail::message')
# Introduction

The body of your contact to our .

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
