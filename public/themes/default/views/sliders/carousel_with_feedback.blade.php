<div class="owl-carousel product-carousel">
    @foreach($products as $product)
        <div class="product-widget">
            <img class="product-img" src="{{ get_storage_file_url(optional($product->image)->path, 'medium') }}" data-name="product_image" alt="{{ $product->title }}" title="{{ $product->title }}" />
            <a class="product-link" href="{{ route('show.product', $product->slug) }}"></a>
            <div class="product-info">
                @include('layouts.ratings', ['ratings' => $product->averageFeedback()])

                <h5 class="product-info-title">{{ $product->title }}</h5>
                <div class="product-info-price">{!!  get_formated_price($product->sale_price) !!}</div>
            </div>
        </div>
    @endforeach
</div>