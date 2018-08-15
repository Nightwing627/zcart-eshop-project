<section class="store-banner-img-wrapper">
	<div class="banner banner-o-hid" style="background-color: #333; background-image:url( {{ get_cover_img_src($shop, 'shop') }} );">
		<div class="banner-caption">
			<img src="{{ get_storage_file_url(optional($shop->logo)->path, 'mini') }}" class="img-rounded">
			<h5 class="banner-title">{{ $shop->name }}</h5>
			<p class="banner-desc">{{ $shop->description }}</p>
		</div>
	</div>
</section>