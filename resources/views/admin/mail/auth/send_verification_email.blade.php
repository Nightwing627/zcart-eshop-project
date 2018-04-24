@component('mail::message')
#{{ trans('notifications.email_verification.greeting', ['user' => $user->getName()]) }}

{{ trans('notifications.email_verification.message') }}
<br/>

@component('mail::button', ['url' => $url, 'color' => trans('notifications.email_verification.action.color')])
{{ trans('notifications.email_verification.action.text') }}
@endcomponent

{{ trans('messages.thanks') }},<br>
{{ get_platform_title() }}
@endcomponent
