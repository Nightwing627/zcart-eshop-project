@php
	if($shop->featuredImage)
		$bg_img = get_storage_file_url($shop->featuredImage->path, 'cover');
	else
		$bg_img = asset('images/demo/shop_cover.jpg');
@endphp

<section class="store-banner-img-wrapper">
	<div class="banner banner-o-hid" style="background-color: #333; background-image:url( {{ $bg_img }} );">
		<div class="banner-caption">
			<h5 class="banner-title">{{ $shop->name }}</h5>
			<p class="banner-desc">{{ $shop->description }}</p>
		</div>
	</div>
</section>