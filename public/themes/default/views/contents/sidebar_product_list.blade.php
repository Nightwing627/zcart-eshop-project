<ul class="sidebar-product-list">
    @foreach($products as $product)
        <li>
            <div class="product-widget">
                <div class="product-img-wrap">
                    <img class="product-img" src="{{ get_product_img_src($product, 'medium') }}" data-name="product_image" alt="{{ $product->name }}" title="{{ $product->name }}" />
                </div>
                <div class="product-info">
                    @include('layouts.ratings', ['ratings' => 4.5])

                    <a href="{{ route('show.product', $product->slug) }}" class="product-info-title">{{ $product->name }}</a>
                    <div class="product-info-price">{!!  get_formated_price($product->inventories->min('sale_price')) !!}</div>
                </div>
            </div>
        </li>
    @endforeach
</ul>