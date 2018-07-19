@if($wishlist->count() > 0)
    <div class="row product-list">
        @foreach($wishlist as $wish)
            <div class="col-md-12">
                <div class="product product-list-view">
                    <ul class="product-info-labels">
                        <li>@lang('theme.hot_item')</li>
                        <li>@lang('theme.stuff_pick')</li>
                    </ul>

                    <div class="product-img-wrap">
                        <img class="product-img-primary" src="{{ get_product_img_src($wish->product, 'medium') }}" alt="{{ $wish->product->name }}" title="{{ $wish->product->name }}" />
                        <img class="product-img-alt" src="{{ get_product_img_src($wish->product, 'medium', 'alt') }}" alt="{{ $wish->product->name }}" title="{{ $wish->product->name }}" />
                        <a class="product-link" href="{{ route('show.product', $wish->product->slug) }}"></a>
                    </div>

                    <div class="product-actions">
                        <a class="btn btn-default flat" href="#" data-toggle="modal" data-target="#quickViewModal">
                            <i class="fa fa-external-link" data-toggle="tooltip" title="@lang('theme.button.quick_view')"></i> <span>@lang('theme.button.quick_view')</span>
                        </a>

                        <a class="btn btn-primary flat" href="{{ route('show.product', $wish->product->slug) }}">
                            <i class="fa fa-shopping-cart"></i> @lang('theme.button.buy_now')
                        </a>

                        {!! Form::open(['route' => ['wishlist.remove', $wish], 'method' => 'delete', 'class' => 'data-form']) !!}
                            <button class="btn btn-link btn-block confirm" type="submit">
                                <i class="fa fa-trash-o" data-toggle="tooltip" title="@lang('theme.button.remove_from_wishlist')"></i> <span>@lang('theme.button.remove')</span>
                            </button>
                        {!! Form::close() !!}
                    </div>

                    <div class="product-info">
                        @include('layouts.ratings', ['ratings' => 4.5])

                        <a href="{{ route('show.product', $wish->product->slug) }}" class="product-info-title">{{ $wish->product->name }}</a>

                        <div class="product-info-availability">
                            @lang('theme.availability'): <span>@lang('theme.in_stock')</span>
                        </div>
                        <div class="product-info-price">
                            <span class="product-info-price-new">{{ get_formated_currency($wish->product->inventories->min('sale_price')) }}</span>
                        </div>
                        <div class="product-info-desc"> {{ $wish->product->description }} </div>
                        <ul class="product-info-feature-list">
                            <li>{{ trans_choice('theme.days', 4, ['count' => 4]) }}</li>
                            <li>@lang('theme.free_shipping')</li>
                        </ul>
                    </div><!-- /.product-info -->
                </div><!-- /.product -->
            </div><!-- /.col-md-* -->
        @endforeach
    </div><!-- /.row .product-list -->
@else
  <div class="clearfix space50"></div>
  <p class="lead text-center space50">
    @lang('theme.empty_wishlist')
    <a href="{{ url('/') }}" class="btn btn-primary btn-sm flat">@lang('theme.button.shop_now')</a>
  </p>
@endif

<div class="sep"></div>

<div class="row pagenav-wrapper">
    {{ $wishlist->links('layouts.pagination') }}
</div><!-- /.row .pagenav-wrapper -->

<div class="clearfix space20"></div>