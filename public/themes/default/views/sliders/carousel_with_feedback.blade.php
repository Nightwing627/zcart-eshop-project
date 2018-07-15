<div class="owl-carousel product-carousel">
    @foreach($products as $product)
        <div class="product-widget">
            <img class="product-img" src="{{ get_storage_file_url(optional($product->featuredImage)->path, 'medium') }}" data-name="product_image" alt="{{ $product->name }}" title="{{ $product->name }}" />
            <a class="product-link" href="{{ route('show.product', $product->slug) }}"></a>
            <div class="product-info">
                @include('layouts.ratings', ['ratings' => rand(0,5)])

                <h5 class="product-info-title">{{ $product->name }}</h5>
                <div class="product-info-price">{!!  get_formated_price($product->inventories->min('sale_price')) !!}</div>
            </div>
        </div>
    @endforeach
</div>