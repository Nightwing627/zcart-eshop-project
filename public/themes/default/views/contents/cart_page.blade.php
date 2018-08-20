<section>
  <div class="container">
    @php
      if(Auth::guard('customer')->check()){
        $customer = Auth::guard('customer')->user();
        $shipping_address = $customer->shippingAddress ? $customer->shippingAddress : $customer->primaryAddress;
        $shipping_country_id = $shipping_address->country_id;
        $shipping_state_id = $shipping_address->state_id;
      }
      else{
        $shipping_country = geoip(request()->ip());
        $shipping_country_id = get_id_of_model('countries', 'iso_3166_2', $shipping_country->iso_code);
        $shipping_state_id = get_id_of_model('states', 'iso_3166_2', $shipping_country->state);
      }

      $country_dropdown = '';
      foreach($countries as $country_id => $country_name){
        $country_dropdown .= '<option value="' . $country_id . '" ';
        $country_dropdown .= $country_id == $shipping_country_id ? 'selected' : '';
        $country_dropdown .= '>' . $country_name . '</option>';
      }
    @endphp

    @foreach($carts as $cart)
      @php
        $shop_id = $cart->shop_id;
        $default_packaging = isset($cart->packaging_id) ? $cart->shippingPackage : getDefaultPackaging($shop_id);

        $shipping_zone = get_shipping_zone_of($shop_id, $shipping_country_id, $shipping_state_id);
        // $shipping_options = $shipping_zone ? getShippingRates($shipping_zone->id) : 'NaN';
        $shipping_options = $shipping_zone ? getShippingRates($shipping_zone->id) : 'NaN';

        // echo "<pre>"; print_r(Auth::guard('customer')->id()); echo "</pre>"; exit();
      @endphp

      <div class="row shopping-cart-table-wrap space30" id="cartId{{$cart->id}}">
        {!! Form::open(['route' => 'checkout', 'id' => 'formId'.$cart->id]) !!}
          {{ Form::hidden('shop_id', $cart->shop_id, ['id' => 'shop_id'.$cart->id]) }}
          {{ Form::hidden('packaging_id', $default_packaging ? $default_packaging->id : Null, ['id' => 'packaging_id'.$cart->id]) }}
          {{ Form::hidden('packaging', $default_packaging ? $default_packaging->cost : Null, ['id' => 'cart-packaging'.$cart->id]) }}
          <div class="col-md-9 nopadding">
              <div class="shopping-cart-header-section">
                <span>@lang('theme.store'):</span>
                @if($cart->shop)
                  <a href="{{ route('show.store', $cart->shop->slug) }}"> {{ $cart->shop->name }}</a>
                @else
                  @land('theme.shop_not_available')
                @endif

                <span class="pull-right">
                    @lang('theme.ship_to'):
                    <select name="sort_by" class="selectBoxIt ship_to" data-cart="{{$cart->id}}">
                      {!! $country_dropdown !!}
                    </select>
                </span>
              </div>

              <table class="table table shopping-cart-item-table">
                  <thead>
                    <tr>
                        <th width="65px">{{ trans('theme.image') }}</th>
                        <th width="55%">{{ trans('theme.description') }}</th>
                        <th>{{ trans('theme.price') }}</th>
                        <th>{{ trans('theme.quantity') }}</th>
                        <th>{{ trans('theme.total') }}</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cart->inventories as $item)
                      <tr class="order-body">
                        <td>
                            {{ Form::hidden('shipping_weight['.$item->id.']', $item->shipping_weight, ['class' => 'itemWeight'.$cart->id]) }}
                            <img src="{{ get_storage_file_url(optional($item->image)->path, 'mini') }}" alt="{{ $item->slug }}" title="{{ $item->slug }}" />
                          </td>
                          <td>
                            <div class="shopping-cart-item-title">
                                <a href="{{ route('show.product', $item->slug) }}" class="product-info-title">{{ $item->pivot->item_description }}</a>
                            </div>
                        </td>
                        <td class="shopping-cart-item-price">
                            {{ get_formated_currency($item->pivot->unit_price) }}
                        </td>
                        <td>
                            <div class="product-info-qty-item">
                                <button class="product-info-qty product-info-qty-minus">-</button>
                                <input class="product-info-qty product-info-qty-input" data-name="product_quantity" data-max="{{$item->stock_quantity}}" type="text" value="1">
                                <button class="product-info-qty product-info-qty-plus">+</button>
                            </div>
                        </td>
                        <td>{{ get_formated_currency($item->pivot->unit_price * $item->pivot->quantity, 2) }}</td>
                        <td>
                          <a class="cart-item-remove" href="#" data-toggle="tooltip" title="Remove Item">&times;</a>
                        </td>
                      </tr> <!-- /.order-body -->
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td>
                        <div class="input-group">
                          <span class="input-group-addon flat">
                            <i class="fa fa-ticket"></i>
                          </span>
                          {{ Form::text('coupon', Null, ['id' => 'coupon'.$cart->id, 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.have_coupon_from_seller')]) }}
                          <span class="input-group-btn">
                            <button class="btn btn-default flat apply_seller_coupon" type="button" data-cart="{{$cart->id}}">@lang('theme.button.apply_coupon')</button>
                          </span>
                        </div><!-- /input-group -->
                      </td>
                      <td colspan="2"><span class="pull-right">{{ trans('theme.subtotal') }}: </span></td>
                      <td>{{ get_formated_currency_symbol() }}
                        <span id="summary-total{{$cart->id}}">{{ get_formated_decimal(500, true, 2) }}</span>
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
              </table>
          </div>

          <div class="col-md-3 space20">
              <div class="side-widget">
                  <h3 class="side-widget-title"><span>{{ trans('theme.cart_summary') }}</span></h3>
                  <ul class="shopping-cart-summary">
                      <li>
                        <span>
                          <a class="packaging-options" data-toggle="popover" data-cart="{{$cart->id}}" data-options="{{ getPackagings($shop_id) }}" title="{{ trans('theme.packaging') }}">
                            <u>{{ trans('theme.packaging') }}</u>
                          </a>
                          <em class="small text-muted" id="summary-packaging-name{{$cart->id}}">
                            {{ $default_packaging ? $default_packaging->name : '' }}
                          </em>
                        </span>
                        <span>{{ get_formated_currency_symbol() }}
                          <span id="summary-packaging{{$cart->id}}">
                            {{ get_formated_decimal($default_packaging ? $default_packaging->cost : 0, true, 2) }}
                          </span>
                        </span>
                      </li>
                      <li>
                        <span>
                          <a class="dynamic-shipping-rates" data-toggle="popover" data-cart="{{$cart->id}}" data-options="{{ $shipping_options }}" title= "{{ trans('theme.shipping') }}">
                            <u>{{ trans('theme.shipping') }}</u>
                          </a>
                          <em id="summary-shipping-name{{$cart->id}}" class="small text-muted"></em>
                        </span>
                        <span>{{ get_formated_currency_symbol() }}
                          <span id="summary-shipping{{$cart->id}}">{{ get_formated_decimal(0, true, 2) }}</span>
                        </span>
                      </li>
                      <li>
                        <span>{{ trans('theme.taxes') }}</span>
                        <span>$0</span>
                      </li>
                      <li>
                        <span>{{ trans('theme.discount') }}</span>
                        <span>$0</span>
                      </li>
                      <li>
                        <span>{{ trans('theme.total') }}</span>
                        <span>$2199</span>
                      </li>
                  </ul>
              </div>

              <button class="btn btn-primary btn-sm flat pull-right" type="submit"><i class="fa fa-shopping-cart"></i> {{ trans('theme.button.buy_from_this_seller') }}</button>
          </div>
        {!! Form::close() !!}
      </div> <!-- /.row -->
    @endforeach

    <a class="btn btn-black flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a>
  </div> <!-- /.container -->
</section>