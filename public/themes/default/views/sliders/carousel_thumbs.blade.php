<div class="owl-carousel big-carousel carousel-img-only">
    @foreach($products as $product)
        <div class="product-widget">
            <img class="product-img" src="{{ get_product_img_src($product, 'medium') }}" data-name="product_image" alt="{{ $product->name }}" title="{{ $product->name }}" />
            <a class="product-link" href="#" data-toggle="modal" data-target="#quickViewModal"></a>
        </div>
    @endforeach
</div>