<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content flat">
        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
        <div class="row sc-product-item">
            <div class="col-md-5 col-sm-6">
                @include('layouts.jqzoom', ['item' => $item])
            </div>
            <div class="col-md-7 col-sm-6">
                <div class="product-single">
                    @include('layouts.product_info', ['item' => $item])

                    <div class="sep"></div>

                    <div class="product-info-options space10">
                        <div class="row select-box-wrapper">
                            @foreach($item->attributeValues as $attribute_value)
                                <div class="col-md-6 space10">
                                    <p>
                                        {{ $attribute_value->attribute->name }}:
                                        {{ $attribute_value->value }}
                                    </p>
                                </div>
                            @endforeach
                        </div><!-- /.row .select-box-wrapper -->

                        <div class="space10"></div>

                        <dir class="product-qty-wrapper">
                          <p>@lang('theme.quantity'):</p>
                          <div class="product-info-qty-item">
                                <button class="product-info-qty product-info-qty-minus">-</button>
                                <input class="product-info-qty product-info-qty-input" data-name="product_quantity" data-min="{{$item->min_order_quantity}}" data-max="{{$item->stock_quantity}}" type="text" value="{{$item->min_order_quantity}}">
                                <button class="product-info-qty product-info-qty-plus">+</button>
                            </div>
                            <span class="available-qty-count">@lang('theme.stock_count', ['count' => $item->stock_quantity])</span>
                        </dir>
                    </div><!-- /.product-option -->

                    <div class="sep"></div>

                    {{-- <a href="#" class="btn btn-primary flat sc-add-to-cart">
                        <i class="fa fa-shopping-bag"></i> @lang('theme.button.add_to_cart')
                    </a> --}}

                    <a href="{{ route('checkout') }}" class="btn btn-warning flat"><i class="fa fa-rocket"></i>
                        @lang('theme.button.buy_now')
                    </a>

                    <a href="{{ route('show.product', $item->slug) }}" class="btn btn-primary flat">
                        @lang('theme.button.view_product_details')
                    </a>

                    @if($item->product->inventories_count > 1)
                        <a href="{{ route('show.offers', $item->product->slug) }}" class="btn btn-sm btn-link">
                            @lang('theme.view_more_offers', ['count' => $item->product->inventories_count])
                        </a>
                    @endif
                </div><!-- /.product-single -->

                <div class="space50"></div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->