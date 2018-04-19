@component('mail::message')
#{{ trans('notifications.password_updated.greeting', ['user' => $user]) }}

{{ trans('notifications.password_updated.message') }}
<br/>

@component('mail::button', ['url' => $url, 'color' => trans('notifications.password_updated.action.color')])
{{ trans('notifications.password_updated.action.text') }}
@endcomponent

{{ trans('messages.thanks') }},<br>
{{ get_platform_title() }}
@endcomponent
