<div class="owl-carousel small-carousel carousel-img-only">
	@php
	$products = [3,2,4,3,4,2,4,3,4,23,2,3,5,2]
	@endphp
    @foreach($products as $product)
        <div class="product-widget">
            <img class="product-img" src="http://via.placeholder.com/100" alt="Product" title="Product Image" />
            <a class="product-link" href="#" data-toggle="modal" data-target="#quickViewModal"></a>
        </div>
    @endforeach
</div>