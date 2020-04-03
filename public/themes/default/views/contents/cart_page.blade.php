<section>
  <div class="container">
    @if($carts->count() > 0)
      @php
          $geoip = geoip(request()->ip());
          $geoip_country = $business_areas->where('iso_code', $geoip->iso_code)->first();
      @endphp

      @foreach($carts as $cart)
        @php
            $cart_total = 0;

            $shipping_country_id = $cart->country->id ?? optional($geoip_country)->id;

            // if(! $shipping_country_id)
              // CANT SHIPP

            $shop_id = $cart->shop_id;

            $shipping_zone = get_shipping_zone_of($shop_id, $shipping_country_id, $cart->state->id);

            $shipping_options = isset($shipping_zone->id) ? getShippingRates($shipping_zone->id) : 'NaN';

            $packaging_options = optional($cart->shop)->packagings;

            if($cart->shop){
              $default_packaging = $cart->shippingPackage ??
                                    optional($cart->shop->packagings)->where('default',1)->first() ??
                                    $platformDefaultPackaging;
            }
            else{
                $default_packaging = $cart->shippingPackage ?? $platformDefaultPackaging;
            }
        @endphp

        <div class="row shopping-cart-table-wrap space30 {{$expressId == $cart->id ? 'selected' : ''}}" id="cartId{{$cart->id}}" data-cart="{{$cart->id}}">
          {!! Form::model($cart, ['method' => 'PUT', 'route' => ['cart.update', $cart->id], 'id' => 'formId'.$cart->id]) !!}
            {{ Form::hidden('cart_id', $cart->id, ['id' => 'cart-id'.$cart->id]) }}
            {{ Form::hidden('shop_id', $cart->shop->id, ['id' => 'shop-id'.$cart->id]) }}
            {{ Form::hidden('tax_id', isset($shipping_zone->id) ? $shipping_zone->tax_id : Null, ['id' => 'tax-id'.$cart->id]) }}
            {{ Form::hidden('taxrate', Null, ['id' => 'cart-taxrate'.$cart->id]) }}
            {{ Form::hidden('packaging_id', $default_packaging ? $default_packaging->id : Null, ['id' => 'packaging-id'.$cart->id]) }}
            {{ Form::hidden('ship_to', $cart->ship_to, ['id' => 'ship-to'.$cart->id]) }}
            {{ Form::hidden('zone_id', isset($shipping_zone->id) ? $shipping_zone->id : Null, ['id' => 'zone-id'.$cart->id]) }}
            {{ Form::hidden('shipping_rate_id', $cart->shipping_rate_id, ['id' => 'shipping-rate-id'.$cart->id]) }}
            {{ Form::hidden('ship_to_country_id', $cart->ship_to_country_id, ['id' => 'shipto-country-id'.$cart->id]) }}
            {{ Form::hidden('ship_to_state_id', $cart->ship_to_state_id, ['id' => 'shipto-state-id'.$cart->id]) }}
            {{-- {{ Form::hidden('shipping_rate_id', Null, ['id' => 'shipping-rate-id'.$cart->id]) }} --}}
            {{ Form::hidden('discount_id', $cart->coupon_id, ['id' => 'discount-id'.$cart->id]) }}
            {{ Form::hidden('handling_cost', optional($cart->shop->config)->order_handling_cost, ['id' => 'handling-cost'.$cart->id]) }}

            <div class="col-md-9 nopadding">
                <div class="shopping-cart-header-section">
                  <span>@lang('theme.store'):</span>
                  @if($cart->shop->slug)
                    <a href="{{ route('show.store', $cart->shop->slug) }}"> {{ $cart->shop->name }}</a>
                  @else
                    @lang('theme.store_not_available')
                  @endif

                  <span class="pull-right">
                      @lang('theme.ship_to'):
                      <a id="shipTo{{$cart->id}}" class="ship_to" data-cart="{{$cart->id}}" data-country="{{$shipping_country_id}}" data-state="{{$cart->state->id}}" href="javascript:void(0)">
                        {{ $cart->state->id ? $cart->state->name : $cart->country->name }}
                      </a>
                  </span>
                </div>

                <table class="table table shopping-cart-item-table" id="table{{$cart->id}}">
                    <thead>
                      <tr>
                          <th width="65px">{{ trans('theme.image') }}</th>
                          <th width="52%">{{ trans('theme.description') }}</th>
                          <th>{{ trans('theme.price') }}</th>
                          <th>{{ trans('theme.quantity') }}</th>
                          <th>{{ trans('theme.total') }}</th>
                          <th></th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($cart->inventories as $item)
                        @php
                          $unit_price = $item->currnt_sale_price();
                          $item_total = $unit_price * $item->pivot->quantity;
                          $cart_total += $item_total;
                        @endphp
                        <tr class="cart-item-tr">
                          <td>
                            <input type="hidden" class="freeShipping{{$cart->id}}" value="{{$item->free_shipping}}">
                            <input type="hidden" id="unitWeight{{$item->id}}" value="{{$item->shipping_weight}}">
                            {{ Form::hidden('shipping_weight['.$item->id.']', ($item->shipping_weight * $item->pivot->quantity), ['id' => 'itemWeight'.$item->id, 'class' => 'itemWeight'.$cart->id]) }}
                            <img src="{{ get_product_img_src($item, 'mini') }}" class="img-mini" alt="{{ $item->slug }}" title="{{ $item->slug }}" />
                          </td>
                          <td>
                            <div class="shopping-cart-item-title">
                              <a href="{{ route('show.product', $item->slug) }}" class="product-info-title">{{ $item->pivot->item_description }}</a>
                            </div>
                          </td>
                          <td class="shopping-cart-item-price">
                            <span>{{ get_formated_currency_symbol() }}
                              <span id="item-price{{$cart->id}}-{{$item->id}}" data-value="{{$unit_price}}">{{ number_format($unit_price, 2, '.', '') }}</span>
                            </span>
                          </td>
                          <td>
                            <div class="product-info-qty-item">
                              <button class="product-info-qty product-info-qty-minus">-</button>
                              <input name="quantity[{{$item->id}}]" id="itemQtt{{$item->id}}" class="product-info-qty product-info-qty-input" data-cart="{{$cart->id}}" data-item="{{$item->id}}" data-min="{{$item->min_order_quantity}}" data-max="{{$item->stock_quantity}}" type="text" value="{{$item->pivot->quantity}}">
                              <button class="product-info-qty product-info-qty-plus">+</button>
                            </div>
                          </td>
                          <td>
                            <span>{{ get_formated_currency_symbol() }}
                              <span id="item-total{{$cart->id}}-{{$item->id}}" class="item-total{{$cart->id}}">{{ number_format($item_total, 2, '.', '') }}</span>
                            </span>
                          </td>
                          <td>
                            <a class="cart-item-remove" href="#" data-cart="{{$cart->id}}" data-item="{{$item->id}}" data-toggle="tooltip" title="@lang('theme.remove_item')">&times;</a>
                          </td>
                        </tr> <!-- /.order-body -->
                      @endforeach
                    </tbody>

                    <tfoot>
                      <tr>
                        <td></td>
                        <td colspan="2">
                          <div class="input-group full-width">
                            <span class="input-group-addon flat">
                              <i class="fa fa-ticket"></i>
                            </span>
                            {{-- {{ Form::input('coupon', $cart->coupon ? $cart->coupon->code : Null, ['class' => 'form-control flat', 'id' => 'coupon'.$cart->id, 'placeholder' => trans('theme.placeholder.have_coupon_from_seller')]) }} --}}
                            <input name="coupon" value="{{ $cart->coupon ? $cart->coupon->code : Null }}" id="coupon{{$cart->id}}" class="form-control flat" type="text" placeholder="@lang('theme.placeholder.have_coupon_from_seller')">
                            <span class="input-group-btn">
                              <button class="btn btn-default flat apply_seller_coupon" type="button" data-cart="{{$cart->id}}">@lang('theme.button.apply_coupon')</button>
                            </span>
                          </div><!-- /input-group -->
                        </td>
                        <td colspan="3"></td>
                      </tr>
                    </tfoot>
                </table>

                <div class="notice notice-warning notice-sm hidden" id="shipping-notice{{$cart->id}}">
                  <strong>{{ trans('theme.warning') }}</strong> @lang('theme.notify.seller_doesnt_ship')
                </div>
                <div class="notice notice-danger notice-sm hidden" id="store-unavailable-notice{{$cart->id}}">
                  <strong>{{ trans('theme.warning') }}</strong> @lang('theme.notify.store_not_available')
                </div>
            </div><!-- /.col-md-9 -->

            <div class="col-md-3 space20">
                <div class="side-widget" id="cart-summary{{$cart->id}}">
                    <h3 class="side-widget-title"><span>{{ trans('theme.cart_summary') }}</span></h3>
                    <ul class="shopping-cart-summary">
                        <li>
                          <span>{{ trans('theme.subtotal') }}</span>
                          <span>{{ get_formated_currency_symbol() }}
                            <span id="summary-total{{$cart->id}}">{{ number_format($cart_total, 2, '.', '') }}</span>
                          </span>
                        </li>
                        <li>
                          <span>
                            <a class="dynamic-shipping-rates" data-toggle="popover" data-cart="{{$cart->id}}" data-options="{{ $shipping_options }}" id="shipping-options{{$cart->id}}" title= "{{ trans('theme.shipping') }}">
                              <u>{{ trans('theme.shipping') }}</u>
                            </a>
                            <em id="summary-shipping-name{{$cart->id}}" class="small text-muted"></em>
                          </span>
                          <span>{{ get_formated_currency_symbol() }}
                            <span id="summary-shipping{{$cart->id}}">{{ number_format(0, 2, '.', '') }}</span>
                          </span>
                        </li>
                        @unless(empty(json_decode($packaging_options)))
                          <li>
                            <span>
                              <a class="packaging-options" data-toggle="popover" data-cart="{{$cart->id}}" data-options="{{$packaging_options}}" title="{{ trans('theme.packaging') }}">
                                <u>{{ trans('theme.packaging') }}</u>
                              </a>
                              <em class="small text-muted" id="summary-packaging-name{{$cart->id}}">
                                {{ $default_packaging ? $default_packaging->name : '' }}
                              </em>
                            </span>
                            <span>{{ get_formated_currency_symbol() }}
                              <span id="summary-packaging{{$cart->id}}">
                                {{ number_format($default_packaging ? $default_packaging->cost : 0, 2, '.', '') }}
                              </span>
                            </span>
                          </li>
                        @endunless
                        <li id="discount-section-li{{$cart->id}}" style="display: {{$cart->coupon ? 'block' : 'none'}};">
                          <span>{{ trans('theme.discount') }}
                            <em id="summary-discount-name{{$cart->id}}" class="small text-muted">{{$cart->coupon ? $cart->coupon->name : ''}}</em>
                          </span>
                          <span>-{{ get_formated_currency_symbol() }}
                            <span id="summary-discount{{$cart->id}}">{{$cart->coupon ? number_format($cart->discount, 2, '.', '') : number_format(0, 2, '.', '') }}</span>
                          </span>
                        </li>
                        <li id="tax-section-li{{$cart->id}}" style="display: none;">
                          <span>{{ trans('theme.taxes') }}</span>
                          <span>{{ get_formated_currency_symbol() }}
                            <span id="summary-taxes{{$cart->id}}">{{ number_format(0, 2, '.', '') }}</span>
                          </span>
                        </li>
                        <li>
                          <span>{{ trans('theme.total') }}</span>
                          <span>{{ get_formated_currency_symbol() }}
                            <span id="summary-grand-total{{$cart->id}}">{{ number_format(0, 2, '.', '') }}</span>
                          </span>
                        </li>
                    </ul>
                </div>

                <button class="btn btn-primary btn-sm flat pull-right" id="checkout-btn{{$cart->id}}" type="submit"><i class="fa fa-shopping-cart"></i> {{ trans('theme.button.buy_from_this_seller') }}</button>
            </div> <!-- /.col-md-3 -->
          {!! Form::close() !!}
        </div> <!-- /.row -->
      @endforeach

      <a class="btn btn-black flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a>
    @else
      <div class="clearfix space50"></div>
      <p class="lead text-center space50">
        @lang('theme.empty_cart')
        <a href="{{ url('/') }}" class="btn btn-primary btn-sm flat">@lang('theme.button.shop_now')</a>
      </p>
    @endif
  </div> <!-- /.container -->
</section>