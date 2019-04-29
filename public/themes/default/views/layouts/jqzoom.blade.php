<div class="clearfix">
	<a href="{{ get_product_img_src($item, 'full') }}" id="jqzoom" data-rel="gal-1">
		<img class="product-img" data-name="product_image" src="{{ get_product_img_src($item, 'large') }}" alt="{{ $item->title }}" title="{{ $item->title }}" />
	</a>
</div>

<ul class="jqzoom-thumbs">
	@php
		$item_images = $item->images->count() ? $item->images : $item->product->images;

		if(isset($variants)){
			// Remove images of current items from the variants imgs
			$other_images = $variants->pluck('images')->flatten(1)->filter(function ($value, $key) use ($item) {
							    return $value->imageable_id != $item->id;
							});
			$item_images = $item_images->concat($other_images);
		}
	@endphp
	@foreach($item_images as $img)
		<li>
			<a class="{{ $img->path == optional($item->image)->path ? 'zoomThumbActive' : '' }}" href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: '{{ get_storage_file_url($img->path, 'large') }}', largeimage: '{{ get_storage_file_url($img->path, 'full') }}'}">
				<img src="{{ get_storage_file_url($img->path, 'mini') }}" alt="Thumb" title="{{ $item->title }}" />
			</a>
		</li>
	@endforeach
</ul> <!-- /.jqzoom-thumbs -->