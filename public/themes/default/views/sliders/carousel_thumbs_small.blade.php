<div class="owl-carousel small-carousel carousel-img-only">
    @foreach($products as $product)
        <div class="product-widget">
            <img class="product-img" src="{{ get_storage_file_url(optional($product->image)->path, 'small') }}" alt="{{ $product->title }}" title="{{ $product->title }}" />
            <a class="product-link" href="#" data-toggle="modal" data-target="#quickViewModal"></a>
        </div>
    @endforeach
</div>