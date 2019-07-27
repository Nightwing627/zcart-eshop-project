<img src="{{ get_avatar_src($customer, 'tiny') }}" class="img-circle" alt="{{ trans('app.avatar') }}">
<p class="indent10">
	{{ $customer->nice_name }}
	@unless($customer->active)
        <span class="label label-default indent10">{{ trans('app.inactive') }}</span>
    @endunless
</p>