<div class="row product-list">
    @foreach($products as $product)
        <div class="col-md-12">
            <div class="product product-list-view sc-product-item">
                <input name="product_price" value="60.00" type="hidden" />
                <input name="product_id" value="{{ $product->id }}" type="hidden" />

                <ul class="product-info-labels">
                    <li>@lang('theme.hot_item')</li>
                    <li>@lang('theme.stuff_pick')</li>
                </ul>

                <div class="product-img-wrap">
                    <img class="product-img-primary" src="{{ get_product_img_src($product, 'medium') }}" data-name="product_image" alt="{{ $product->name }}" title="{{ $product->name }}" />
                    <img class="product-img-alt" src="{{ get_product_img_src($product, 'medium', 'alt') }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
                    <a class="product-link" href="{{ route('show.product', $product->slug) }}" data-name="product_link"></a>
                </div>

                <div class="product-actions">
                    <a class="btn btn-default flat" href="#" data-toggle="modal" data-target="#quickViewModal">
                        <i class="fa fa-external-link" data-toggle="tooltip" title="@lang('theme.button.quick_view')"></i> <span>@lang('theme.button.quick_view')</span>
                    </a>

                    <a class="btn btn-primary flat sc-add-to-cart" href="#">
                        <i class="fa fa-shopping-cart"></i> @lang('theme.button.add_to_cart')
                    </a>

                    <a class="btn btn-link" href="#">
                        <i class="fa fa-trash-o" data-toggle="tooltip" title="@lang('theme.button.remove_from_wishlist')"></i> <span>@lang('theme.button.remove')</span>
                    </a>
                </div>

                <div class="product-info">
                    @include('layouts.ratings', ['ratings' => 4.5])

                    <a href="{{ route('show.product', $product->slug) }}" class="product-info-title" data-name="product_name">{{ $product->name }}</a>

                    <div class="product-info-availability">
                        @lang('theme.availability'): <span>@lang('theme.in_stock')</span>
                    </div>
                    <div class="product-info-price">
                        <span class="product-info-price-new">{{ get_formated_currency(60) }}</span>
                    </div>
                    <div class="product-info-desc" data-name="product_description"> {{ $product->description }} </div>
                    <ul class="product-info-feature-list">
                        <li>{{ trans_choice('theme.days', 4, ['count' => 4]) }}</li>
                        <li>@lang('theme.free_shipping')</li>
                    </ul>
                </div><!-- /.product-info -->
            </div><!-- /.product -->
        </div><!-- /.col-md-* -->
    @endforeach
</div><!-- /.row .product-list -->

<div class="sep"></div>

<div class="row pagenav-wrapper">
    {{ $products->links('layouts.pagination') }}
</div><!-- /.row .pagenav-wrapper -->

<div class="clearfix space20"></div>