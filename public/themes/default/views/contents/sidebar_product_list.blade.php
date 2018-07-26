<ul class="sidebar-product-list">
    @foreach($products as $product)
        <li>
            <div class="product-widget">
                <div class="product-img-wrap">
                    <img class="product-img" src="{{ get_storage_file_url(optional($product->image)->path, 'medium') }}" data-name="product_image" alt="{{ $product->title }}" title="{{ $product->title }}" />
                </div>
                <div class="product-info">
                    @include('layouts.ratings', ['ratings' => $product->averageFeedback()])
                    <a href="{{ route('show.product', $product->slug) }}" class="product-info-title">{{ $product->title }}</a>
                    <div class="product-info-price">{!!  get_formated_price($product->sale_price) !!}</div>
                </div>
            </div>
        </li>
    @endforeach
</ul>