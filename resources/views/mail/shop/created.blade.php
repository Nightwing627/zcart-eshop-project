@component('mail::message')
# Introduction

The body of your message.
A shop has been created successfully! <br/>
{{ $shop }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
