@if($products->count() > 0)
    <div class="row product-list">
        @foreach($products as $product)
            @php
                $has_offer = FALSE;
                if(
                    ($product->offer_price > 0) &&
                    ($product->offer_start < \Carbon\Carbon::now()) &&
                    ($product->offer_end > \Carbon\Carbon::now())
                ){
                    $has_offer = get_percentage_of($product->sale_price, $product->offer_price);
                    $sale_price = $product->offer_price;
                }
                else{
                    $sale_price = $product->sale_price;
                }
            @endphp

            <div class="col-md-3">
                <div class="product product-grid-view sc-product-item">
                    <input name="product_price" value="{{ get_formated_decimal($sale_price) }}" type="hidden"/>
                    <input name="product_id" value="{{ $product->id }}" type="hidden"/>
                    <input name="shop_id" value="{{ $product->id }}" type="hidden"/>

                    <ul class="product-info-labels">
                        @if($product->orders_count >= config('system.popular.hot_item.sell_count', 3))
                            <li>@lang('theme.hot_item')</li>
                        @endif
                        @if($product->stuff_pick == 1)
                            <li>@lang('theme.stuff_pick')</li>
                        @endif
                        @if($has_offer)
                            <li>@lang('theme.percent_off',['value'=>$has_offer])</li>
                        @endif
                    </ul>

                    <div class="product-img-wrap">
                        <img class="product-img-primary" src="{{ get_product_img_src($product, 'medium') }}" data-name="product_image" alt="{{ $product->title }}" title="{{ $product->title }}"/>
                        <img class="product-img-alt" src="{{ get_product_img_src($product, 'medium', 'alt') }}" alt="{{ $product->title }}" title="{{ $product->title }}"/>
                        <a class="product-link" href="{{ route('show.product', $product->slug) }}" data-name="product_link"></a>
                    </div>

                    <div class="product-actions btn-group">
                        <a class="btn btn-default flat" href="{{ route('wishlist.add', $product) }}">
                            <i class="fa fa-heart-o" data-toggle="tooltip" title="@lang('theme.button.add_to_wishlist')"></i> <span>@lang('theme.button.add_to_wishlist')</span>
                        </a>

                        <a class="btn btn-default flat" href="#" data-toggle="modal" data-target="#quickViewModal">
                            <i class="fa fa-external-link" data-toggle="tooltip" title="@lang('theme.button.quick_view')"></i> <span>@lang('theme.button.quick_view')</span>
                        </a>

                        <a class="btn btn-primary flat sc-add-to-cart" href="#">
                            <i class="fa fa-shopping-cart"></i> @lang('theme.button.add_to_cart')
                        </a>
                    </div>

                    <div class="product-info">
                        @include('layouts.ratings', ['ratings' => $product->feedbacks->avg('rating'), 'count' => $product->feedbacks_count])

                        <a href="{{ route('show.product', $product->slug) }}" class="product-info-title" data-name="product_name">{{ $product->title }}</a>

                        <div class="product-info-availability">
                            @lang('theme.availability'): <span>{{ ($product->stock_quantity > 0) ? trans('theme.in_stock') : trans('theme.out_of_stock') }}</span>
                        </div>
                        <div class="product-info-price">
                            @if($has_offer)
                                <span class="old-price">{!! get_formated_price($product->sale_price, 2) !!}</span>
                                <span class="product-info-price-new">{!! get_formated_price($product->offer_price, 2) !!}</span>
                            @else
                                <span class="product-info-price-new">{!! get_formated_price($product->sale_price, 2) !!}</span>
                            @endif
                        </div>
                        <div class="product-info-desc"> {{ $product->description }} </div>
                        {{-- <div class="product-info-desc" data-name="product_description"> {{ $product->description }} </div> --}}
                        <ul class="product-info-feature-list">
                            <li>{{ $product->condition }}</li>
                            {{-- <li>{{ $product->product_id }}</li> --}}
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
@else
    <div class="clearfix space50"></div>
    <p class="lead text-center space50">
        @lang('theme.no_product_found')
        <a href="{{ url('categories') }}" class="btn btn-primary btn-sm flat">@lang('theme.button.shop_from_other_categories')</a>
    </p>
@endif