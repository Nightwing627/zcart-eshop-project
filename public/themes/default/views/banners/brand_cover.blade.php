@php
	if($brand->featuredImage)
		$bg_img = get_storage_file_url($brand->featuredImage->path, 'cover');
	else
		$bg_img = asset('images/demo/brand_cover.jpg');
@endphp

<section class="brand-banner-img-wrapper">
	<div class="banner banner-o-hid" style="background-color: #333; background-image:url( {{ $bg_img }} );">
		<div class="banner-caption">
			<h5 class="banner-title">{{ $brand->name }}</h5>
			<p class="banner-desc">{{ $brand->description }}</p>
		</div>
	</div>
</section>