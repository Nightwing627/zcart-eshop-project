@if($product->featuredImage)
	<img src="{{ get_storage_file_url(optional($product->featuredImage)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.featured_image') }}">
@else
	<img src="{{ get_storage_file_url(optional($product->image)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
@endif
<p class="indent10">
	{{ $product->name }}
	@unless($product->active)
        <span class="label label-default indent10">{{ trans('app.inactive') }}</span>
    @endunless
</p>