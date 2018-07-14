<div class="container filter-wrapper">
    <div class="row">
        <div class="col-md-12 ">
            <span>
                @lang('theme.sort_by'):
                <select name="sort_by" class="selectBoxIt">
                    <option value="">@lang('theme.best_match')</option>
                    <option value="">@lang('theme.popular')</option>
                    <option value="">@lang('theme.newest')</option>
                    <option value="">@lang('theme.older')</option>
                    <option value="">@lang('theme.price'): @lang('theme.low_to_high')</option>
                    <option value="">@lang('theme.price'): @lang('theme.high_to_low')</option>
                </select>
            </span>

            <div class="checkbox">
                <label>
                  <input class="i-check" type="checkbox"> @lang('theme.free_shipping') <span class="small">(100)</span>
                </label>
            </div>
            <div class="checkbox">
                <label>
                  <input class="i-check" type="checkbox"> @lang('theme.has_offers')
                </label>
            </div>
            <div class="checkbox">
                <label>
                  <input class="i-check" type="checkbox"> @lang('theme.new_arraivals')
                </label>
            </div>

            <span class="pull-right text-muted">
              <a href="#" class="viewSwitcher btn btn-primary btn-sm flat">
                <i class="fa fa-th" data-toggle="tooltip" title="@lang('theme.grid_view')"></i>
              </a>
              <a href="#" class="viewSwitcher btn btn-default btn-sm flat">
                <i class="fa fa-list" data-toggle="tooltip" title="@lang('theme.list_view')"></i>
              </a>
            </span>
        </div>
    </div>
</div><!-- /.filter-wrapper -->

<div class="clearfix space20"></div>

<div class="row product-list">
  @foreach($products as $product)
    <div class="col-md-3">
        <div class="product product-grid-view sc-product-item">
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

            <div class="product-actions btn-group">
                <a class="btn btn-default flat" href="#">
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
                @include('layouts.ratings', ['ratings' => 4.5])

                <a href="{{ route('show.product', $product->slug) }}" class="product-info-title" data-name="product_name">{{ $product->name }}</a>

                <div class="product-info-availability">
                    @lang('theme.availability'): <span>@lang('theme.in_stock')</span>
                </div>
                <div class="product-info-price">
                    <span class="product-info-price-new">{!!  get_formated_price($product->inventories->min('sale_price')) !!}</span>
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