<section>
  <div class="container">
    @foreach($carts as $cart)
      <div class="row shopping-cart-table-wrap">
          <div class="col-md-9 nopadding">
              <div>
                  <h5>
                    <span>@lang('theme.store'):</span>
                    @if($cart->shop)
                      <a href="{{ route('show.store', $cart->shop->slug) }}"> {{ $cart->shop->name }}</a>
                    @else
                      @land('theme.shop_not_available')
                    @endif
                  </h5>
              </div>
              <form accept="{{ route('cart.update', 1) }}">
                  <table class="table table shopping-cart-item-table">
                      <thead>
                        <tr>
                            <th>{{ trans('theme.description') }}</th>
                            <th>{{ trans('theme.price') }}</th>
                            <th>{{ trans('theme.quantity') }}</th>
                            <th>{{ trans('theme.total') }}</th>
                            <th></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <td>
                            <div class="input-group">
                              <input type="text" name="coupon" class="form-control flat" placeholder="coupon" />
                              <span class="input-group-btn">
                                <button class="btn btn-default flat" type="button">Apply Coupon</button>
                              </span>
                            </div><!-- /input-group -->
                          </td>
                          <td colspan="2"><span class="pull-right">{{ trans('theme.subtotal') }}: </span></td>
                          <td>
                            $219.00
                          </td>
                          <td></td>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($cart->inventories as $item)
                          <tr class="order-body">
                            <td>
                                <img src="{{ get_storage_file_url(optional($item->image)->path, 'mini') }}" alt="{{ $item->slug }}" title="{{ $item->slug }}" />
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
                  </table>

                  {{-- <button class="btn btn-black btn-lg flat pull-right" type="submit">{{ trans('theme.button.update_cart')}}</button> --}}
              </form>
              {{-- <a class="btn btn-black btn-lg flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a> --}}
          </div>

          <div class="col-md-3">
              <div class="side-widget">
                  <h3><span>{{ trans('theme.cart_summary') }}</span></h3>
                  <ul class="shopping-cart-summary">
                      <li>
                        <span>{{ trans('theme.packaging') }}</span>
                        <span>$0</span>
                      </li>
                      <li>
                        <span>{{ trans('theme.shipping') }}</span>
                        <span>Free</span>
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
              {!! Form::open(['route' => 'checkout']) !!}
                <button class="btn btn-warning btn-sm flat pull-right" type="submit"><i class="fa fa-shopping-cart"></i> {{ trans('theme.button.buy_from_this_seller') }}</button>
              {!! Form::close() !!}
          </div>
      </div> <!-- /.row -->
    @endforeach
  </div> <!-- /.container -->
</section>