@if($products->count() > 0)
    <div class="row product-list">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="product product-grid-view sc-product-item">
                    <input name="product_price" value="{{ get_formated_decimal($product->first()->sale_price) }}" type="hidden" />
                    <input name="product_id" value="{{ $product->first()->id }}" type="hidden" />
                    <input name="shop_id" value="{{ $product->first()->id }}" type="hidden" />

                    <ul class="product-info-labels">
                        <li>@lang('theme.hot_item')</li>
                        <li>@lang('theme.stuff_pick')</li>
                    </ul>

                    <div class="product-img-wrap">
                        <img class="product-img-primary" src="{{ get_product_img_src($product->first(), 'medium') }}" data-name="product_image" alt="{{ $product->first()->title }}" title="{{ $product->first()->title }}" />
                        <img class="product-img-alt" src="{{ get_product_img_src($product->first(), 'medium', 'alt') }}" alt="{{ $product->first()->title }}" title="{{ $product->first()->title }}" />
                        <a class="product-link" href="{{ route('show.product', $product->first()->slug) }}" data-name="product_link"></a>
                    </div>

                    <div class="product-actions btn-group">
                        <a class="btn btn-default flat" href="{{ route('wishlist.add', $product->first()) }}">
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
                        @include('layouts.ratings', ['ratings' => $product->first()->averageFeedback(), 'count' => $product->first()->feedbacks_count])

                        <a href="{{ route('show.product', $product->first()->slug) }}" class="product-info-title" data-name="product_name">{{ $product->first()->title }}</a>

                        <div class="product-info-availability">
                            @lang('theme.availability'): <span>@lang('theme.in_stock')</span>
                        </div>
                        <div class="product-info-price">
                            <span class="product-info-price-new">{!! get_formated_price($product->first()->sale_price) !!}</span>
                        </div>
                        <div class="product-info-desc"> {{ $product->first()->description }} </div>
                        {{-- <div class="product-info-desc" data-name="product_description"> {{ $product->description }} </div> --}}
                        <ul class="product-info-feature-list">
                            <li>{{ $product->first()->condition }}</li>
                            {{-- <li>{{ $product->product_id }}</li> --}}
                        </ul>
                    </div><!-- /.product-info -->
                </div><!-- /.product -->
            </div><!-- /.col-md-* -->
        @endforeach
    </div><!-- /.row .product-list -->

    <div class="sep"></div>

    <div class="row pagenav-wrapper">
      {{-- {{ $products->links('layouts.pagination') }} --}}
    </div><!-- /.row .pagenav-wrapper -->
@else
    <div class="clearfix space50"></div>
    <p class="lead text-center space50">
        @lang('theme.no_product_found')
        <a href="{{ url('categories') }}" class="btn btn-primary btn-sm flat">@lang('theme.button.shop_from_other_categories')</a>
    </p>
@endif