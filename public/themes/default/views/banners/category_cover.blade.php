@php
	if(isset($category->image->path) && Storage::exists($category->image->path))
		$bg_img = get_storage_file_url($category->image->path, 'cover');
		// asset('storage/' . $category->images->path);
	else
		$bg_img = asset('images/demo/category_cover.jpg');
@endphp

<section class="category-banner-img-wrapper">
	<div class="banner banner-o-hid" style="background-color: #333; background-image:url( {{ $bg_img }} );">
		<div class="banner-caption">
			<h5 class="banner-title">{{ $category->name }}</h5>
			<p class="banner-desc">{{ $category->description }}</p>
		</div>
	</div>
</section>