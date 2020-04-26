@php
  $geoip = geoip(request()->ip());
  $geoip_country = $business_areas->where('iso_code', $geoip->iso_code)->first();

  $shipping_country_id = $cart->ship_to_country_id ?? optional($geoip_country)->id;

  if(! $cart->shipping_state_id){
    $geoip_state = \DB::table('states')->select('id', 'name', 'iso_code')->where([
      ['country_id', '=', $shipping_country_id], ['iso_code', '=', $geoip->state]
    ])->first();
  }

  $shipping_state_id = $cart->ship_to_state_id ?? optional($geoip_state)->id;

  $shipping_zone = get_shipping_zone_of($cart->shop_id, $shipping_country_id, $shipping_state_id);

  $shipping_options = isset($shipping_zone->id) ? getShippingRates($shipping_zone->id) : 'NaN';
    // echo "<pre>"; print_r($shipping_options->toArray()); echo "<pre>"; exit('end!');
  $packaging_options = optional($cart->shop)->packagings;

  $default_packaging = $cart->shippingPackage ??
                        optional($cart->shop->packagings)->where('default',1)->first() ??
                        $platformDefaultPackaging;
@endphp

<section>
  <div class="container">
    {!! Form::open(['route' => ['order.create', $cart], 'id' => 'checkoutForm', 'data-toggle' => 'validator', 'novalidate']) !!}
      <div class="row shopping-cart-table-wrap space30" id="cartId{{$cart->id}}" data-cart="{{$cart->id}}">

        @if(Session::has('error'))
          <div class="notice notice-danger notice-sm">
            <strong>{{ trans('theme.error') }}</strong> {{ Session::get('error') }}
          </div>
        @endif

        <div class="notice notice-warning notice-sm space20" id="checkout-notice" style="display: {{ ($cart->shipping_rate_id || $cart->is_free_shipping()) ? 'none' : 'block' }};">
          <strong>{{ trans('theme.warning') }}</strong>
          <span id="checkout-notice-msg">@lang('theme.notify.seller_doesnt_ship')</span>
        </div>

        <div class="col-md-4 bg-light">
          <div class="seller-info space20">
            <div class="text-muted small">@lang('theme.sold_by')</div>

            <img src="{{ get_storage_file_url(optional($shop->image)->path, 'tiny') }}" class="seller-info-logo img-sm img-circle" alt="{{ trans('theme.logo') }}">

            <a href="{{ route('show.store', $shop->slug) }}" class="seller-info-name">
              {{ $shop->name }}
            </a>
          </div><!-- /.seller-info -->

          <div class="input-group full-width space30">
            <span class="input-group-addon flat">
              <i class="fa fa-ticket"></i>
            </span>
            <input name="coupon" value="{{ $cart->coupon ? $cart->coupon->code : Null }}" id="coupon{{$cart->id}}" class="form-control flat" type="text" placeholder="@lang('theme.placeholder.have_coupon_from_seller')">
            <span class="input-group-btn">
              <button class="btn btn-default flat apply_seller_coupon" type="button" data-cart="{{$cart->id}}">@lang('theme.button.apply_coupon')</button>
            </span>
          </div><!-- /input-group -->

          {{ Form::hidden('cart_id', $cart->id, ['id' => 'checkout-id']) }}
          {{ Form::hidden('shop_id', $cart->shop->id, ['id' => 'shop-id'.$cart->id]) }}
          {{ Form::hidden('tax_id', isset($shipping_zone->id) ? $shipping_zone->tax_id : Null, ['id' => 'tax-id'.$cart->id]) }}
          {{ Form::hidden('taxrate', $cart->taxrate, ['id' => 'cart-taxrate'.$cart->id]) }}
          {{ Form::hidden('packaging_id', $cart->packaging_id ?? $default_packaging->id, ['id' => 'packaging-id'.$cart->id]) }}
          {{ Form::hidden('zone_id', $cart->shipping_zone_id, ['id' => 'zone-id'.$cart->id]) }}
          {{ Form::hidden('shipping_rate_id', $cart->shipping_rate_id, ['id' => 'shipping-rate-id'.$cart->id]) }}
          {{ Form::hidden('ship_to_country_id', $cart->ship_to_country_id, ['id' => 'shipto-country-id'.$cart->id]) }}
          {{ Form::hidden('ship_to_state_id', $cart->ship_to_state_id, ['id' => 'shipto-state-id'.$cart->id]) }}
          {{ Form::hidden('discount_id', $cart->coupon_id, ['id' => 'discount-id'.$cart->id]) }}
          {{ Form::hidden('handling_cost', $cart->handling_cost > 0 ? $cart->handling_cost : optional($cart->shop->config)->order_handling_cost, ['id' => 'handling-cost'.$cart->id]) }}

          <h3 class="widget-title">{{ trans('theme.order_info') }}</h3>
          <ul class="shopping-cart-summary ">
            <li>
              <span>{{ trans('theme.item_count') }}</span>
              <span>{{ $cart->inventories_count }}</span>
            </li>
            <li>
              <span>{{ trans('theme.subtotal') }}</span>
              <span>{{ get_formated_currency_symbol() }}
                <span id="summary-total{{$cart->id}}">{{ number_format($cart->total, 2, '.', '') }}</span>
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
                <span id="summary-shipping{{$cart->id}}">{{ number_format($cart->get_shipping_cost(), 2, '.', '') }}</span>
              </span>

            </li>

            @unless(empty(json_decode($packaging_options)))
              <li>
                  <span>
                    <a class="packaging-options" data-toggle="popover" data-cart="{{$cart->id}}" data-options="{{$packaging_options}}" title="{{ trans('theme.packaging') }}">
                      <u>{{ trans('theme.packaging') }}</u>
                    </a>
                    <em class="small text-muted" id="summary-packaging-name{{$cart->id}}">
                      {{ optional($default_packaging)->name }}
                    </em>
                  </span>
                  <span>{{ get_formated_currency_symbol() }}
                    <span id="summary-packaging{{$cart->id}}">
                      {{ number_format($default_packaging ? $default_packaging->cost : 0, 2, '.', '') }}
                    </span>
                  </span>
              </li>
            @endunless

            <li id="discount-section-li{{$cart->id}}" style="display: {{$cart->discount > 0 ? 'block' : 'none'}};">
              <span>{{ trans('theme.discount') }}
                <em id="summary-discount-name{{$cart->id}}" class="small text-muted">{{$cart->coupon ? $cart->coupon->name : ''}}</em>
              </span>
              <span>-{{ get_formated_currency_symbol() }}
                <span id="summary-discount{{$cart->id}}">{{$cart->coupon ? number_format($cart->discount, 2, '.', '') : number_format(0, 2, '.', '') }}</span>
              </span>
            </li>

            <li id="tax-section-li{{$cart->id}}" style="display: {{$cart->taxes > 0 ? 'block' : 'none'}};">
              <span>{{ trans('theme.taxes') }}</span>
              <span>{{ get_formated_currency_symbol() }}
                <span id="summary-taxes{{$cart->id}}">{{ number_format($cart->taxes, 2, '.', '') }}</span>
              </span>
            </li>

            <li>
              <span class="lead">{{ trans('theme.total') }}</span>
              <span class="lead">{{ get_formated_currency_symbol() }}
                <span id="summary-grand-total{{$cart->id}}">{{ number_format($cart->grand_total(), 2, '.', '') }}</span>
              </span>
            </li>
          </ul>

          <hr class="style1 muted"/>

          <div class="clearfix"></div>

          <div class="text-center space20">
            <a class="btn btn-black flat" href="{{ route('cart.index') }}">{{ trans('theme.button.update_cart') }}</a>
            <a class="btn btn-black flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a>
          </div>
        </div> <!-- /.col-md-3 -->

        <div class="col-md-5">
          <h3 class="widget-title">{{ trans('theme.ship_to') }}</h3>

          @if(isset($customer))

              <div class="row customer-address-list">
                  @php
                    $pre_select = Null;
                  @endphp
                  @foreach($customer->addresses as $address)
                    @php
                      $ship_to_this_address = Null;
                      // If any address not selected yet
                      if($pre_select == Null){
                        // Has onely address
                        if($customer->addresses->count() == 1) {
                          $pre_select = 1; $ship_to_this_address = TRUE;
                        }
                        // Just created this address
                        elseif(Request::has('address')) {
                          if(request()->address == $address->id){
                            $pre_select = 1; $ship_to_this_address = TRUE;
                          }
                        }
                        // Zone selected at cart page
                        elseif($cart->ship_to_country_id == $address->country_id) {
                          $pre_select = 1; $ship_to_this_address = TRUE;
                        }
                        // Customer's shipping address
                        elseif($cart->ship_to == Null && $address->address_type === 'Shipping') {
                          $pre_select = 1; $ship_to_this_address = TRUE;
                        }
                      }
                    @endphp

                    <div class="col-sm-12 col-md-6 nopadding-{{ $loop->iteration%2 == 1 ? 'right' : 'left'}}">
                      <div class="address-list-item {{ $ship_to_this_address == true ? 'selected' : '' }}">
                        {!! $address->toHtml('<br/>', false) !!}
                        <input type="radio" class="ship-to-address" name="ship_to" value="{{$address->id}}" {{ $ship_to_this_address == true ? 'checked' : '' }} data-country="{{$address->country_id}}" data-state="{{$address->state_id}}" required>
                      </div>
                    </div>
                    @if($loop->iteration%2 == 0)
                      <div class="clearfix"></div>
                    @endif
                  @endforeach
              </div>

              <small id="ship-to-error-block" class="text-danger pull-right"></small>

              <div class="space20"></div>

              <div class="col-sm-12 space20">
                  <a href="{{ route('my.address.create') }}" class="addressForm btn btn-default btn-sm flat pull-right">
                    <i class="fa fa-address-card-o"></i> @lang('theme.button.add_new_address')
                  </a>
              </div>

          @else

              @include('forms.address', ['countries' => $business_areas->pluck('name', 'id')])

              <div class="form-group">
                {!! Form::email('email', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.email'), 'maxlength' => '100', 'required']) !!}
                <div class="help-block with-errors"></div>
              </div>

              <div class="checkbox">
                <label>
                  {!! Form::checkbox('create-account', Null, Null, ['id' => 'create-account-checkbox', 'class' => 'i-check']) !!} {!! trans('theme.create_account') !!}
                </label>
              </div>

              <div id="create-account" class="space30" style="display: none;">
                <div class="row">
                  <div class="col-md-6 nopadding-right">
                    <div class="form-group">
                      {!! Form::password('password', ['class' => 'form-control flat', 'id' => 'acc-password', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '6']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6 nopadding-left">
                    <div class="form-group">
                      {!! Form::password('password_confirmation', ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.confirm_password'), 'data-match' => '#acc-password']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>

                @if(config('system_settings.ask_customer_for_email_subscription'))
                  <div class="checkbox">
                    <label>
                      {!! Form::checkbox('accepts_marketing', null, null, ['class' => 'i-check']) !!} {!! trans('theme.input_label.subscribe_to_the_newsletter') !!}
                    </label>
                  </div>
                @endif

                <p class="text-info small">
                  <i class="fa fa-info-circle"></i>
                  {!! trans('theme.help.create_account_on_checkout', ['link' => get_page_url(\App\Page::PAGE_TNC_FOR_CUSTOMER)]) !!}
                </p>
              </div>

              {{-- <small class="help-block text-muted pull-right">* {{ trans('theme.help.required_fields') }}</small> --}}
          @endif

          <hr class="style4 muted"/>

          <div class="form-group">
            {!! Form::label('buyer_note', trans('theme.leave_message_to_seller')) !!}
            {!! Form::textarea('buyer_note', Null, ['class' => 'form-control flat summernote-without-toolbar', 'placeholder' => trans('theme.placeholder.message_to_seller'), 'rows' => '2', 'maxlength' => '250']) !!}
            <div class="help-block with-errors"></div>
          </div>
        </div> <!-- /.col-md-5 -->

        <div class="col-md-3">
            <h3 class="widget-title">{{ trans('theme.payment_options') }}</h3>
            @php
              $activeManualPaymentMethods = $shop->config->manualPaymentMethods;
            @endphp

            <div class="space30">
              @foreach($shop->paymentMethods as $payment_provider)
                @php
                  switch ($payment_provider->code) {
                    case 'stripe':
                      $has_config = $shop->config->stripe ? TRUE : FALSE;
                      $info = trans('theme.notify.we_dont_save_card_info');
                      break;

                    case 'instamojo':
                      $has_config = $shop->config->instamojo ? TRUE : FALSE;
                      $info = trans('theme.notify.you_will_be_redirected_to_instamojo');
                      break;

                    case 'authorize-net':
                      $has_config = $shop->config->authorizeNet ? TRUE : FALSE;
                      $info = trans('theme.notify.we_dont_save_card_info');
                      break;

                    case 'cybersource':
                      $has_config = $shop->config->cybersource ? TRUE : FALSE;
                      $info = trans('theme.notify.we_dont_save_card_info');
                      break;

                    case 'paypal-express':
                      $has_config = $shop->config->paypalExpress ? TRUE : FALSE;
                      $info = trans('theme.notify.you_will_be_redirected_to_paypal');
                      break;

                    case 'paystack':
                      $has_config = $shop->config->paystack ? TRUE : FALSE;
                      $info = trans('theme.notify.you_will_be_redirected_to_paystack');
                      break;

                    case 'wire':
                    case 'cod':
                      $has_config = in_array($payment_provider->id, $activeManualPaymentMethods->pluck('id')->toArray()) ? TRUE : FALSE;
                      $temp = $activeManualPaymentMethods->where('id', $payment_provider->id)->first();
                      $info = $temp ? $temp->pivot->additional_details : '';
                      break;

                    default:
                      $has_config = FALSE;
                      break;
                  }
                @endphp

                {{-- Skip the payment option if not confirured --}}
                @continue( ! $has_config )

                @if($customer && (\App\PaymentMethod::TYPE_CREDIT_CARD == $payment_provider->type) && $customer->hasBillingToken())
                  <div class="form-group">
                    <label>
                      <input name="payment_method" value="saved_card" class="i-radio-blue payment-option" type="radio" data-info="{{$info}}" data-type="{{ $payment_provider->type }}" required="required" checked /> @lang('theme.card'): <i class="fa fa-cc-{{ strtolower($customer->card_brand) }}"></i> ************{{$customer->card_last_four}}
                    </label>
                  </div>
                @endif

                <div class="form-group">
                  <label>
                    <input name="payment_method" value="{{ $payment_provider->id }}" data-code="{{ $payment_provider->code }}" class="i-radio-blue payment-option" type="radio" data-info="{{$info}}" data-type="{{ $payment_provider->type }}" required="required" {{ old('payment_method') == $payment_provider->id ? 'checked' : '' }}/> {{ $payment_provider->code == 'stripe' ? trans('theme.credit_card') : $payment_provider->name }}
                  </label>
                </div>
              @endforeach
            </div>

            {{-- authorize-net --}}
            <div id="authorize-net-cc-form" class="authorize-net-cc-form" style="display: none;">
              <hr class="style4 muted">
              <div class="stripe-errors alert alert-danger flat small hide">{{ trans('messages.trouble_validating_card') }}</div>
              <div class="form-group form-group-cc-name">
                {!! Form::text('cardholder_name', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.cardholder_name'), 'data-error' => trans('theme.help.enter_cardholder_name')]) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-number">
                {!! Form::text('cnumber', Null, ['id' => 'cnumber', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_number')]) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-cvc">
                {!! Form::text('ccode', Null, ['id' => 'ccode', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_cvc')]) !!}
                <div class="help-block with-errors"></div>
              </div>

              <div class="row">
                <div class="col-md-6 nopadding-right">
                  <div class="form-group has-feedback">
                    {{ Form::selectMonth('card_expiry_month', Null, ['id' =>'card_expiry_month', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_exp_month'), 'data-error' => trans('theme.help.card_exp_month')], '%m') }}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-6 nopadding-left">
                  <div class="form-group has-feedback">
                    {{ Form::selectYear('card_expiry_year', date('Y'), date('Y') + 10, Null, ['id' =>'card_expiry_year', 'class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.card_exp_year'), 'data-error' => trans('theme.help.card_exp_year')]) }}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
            </div> <!-- /#authorize-net-cc-form -->

            {{-- Stripe --}}
            <div id="cc-form" class="cc-form" style="display: none;">
              <hr class="style4 muted">
              <div class="stripe-errors alert alert-danger flat small hide">{{ trans('messages.trouble_validating_card') }}</div>
              <div class="form-group form-group-cc-name">
                {!! Form::text('name', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.cardholder_name'), 'data-error' => trans('theme.help.enter_cardholder_name'), 'data-stripe' => 'name']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-number">
                <input type="text" class='form-control flat' placeholder="@lang('theme.placeholder.card_number')" data-stripe='number'/>
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-cvc">
                <input type="text" class='form-control flat' placeholder="@lang('theme.placeholder.card_cvc')" data-stripe='cvc'/>
                <div class="help-block with-errors"></div>
              </div>

              <div class="row">
                <div class="col-md-6 nopadding-right">
                  <div class="form-group has-feedback">
                    {{ Form::selectMonth('exp-month', Null, ['id' =>'exp-month', 'class' => 'form-control flat', 'data-stripe' => 'exp-month', 'placeholder' => trans('theme.placeholder.card_exp_month'), 'data-error' => trans('theme.help.card_exp_month')], '%m') }}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-6 nopadding-left">
                  <div class="form-group has-feedback">
                    {{ Form::selectYear('exp-year', date('Y'), date('Y') + 10, Null, ['id' =>'exp-year', 'class' => 'form-control flat', 'data-stripe' => 'exp-year', 'placeholder' => trans('theme.placeholder.card_exp_year'), 'data-error' => trans('theme.help.card_exp_year')]) }}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>

              <div class="checkbox">
                <label>
                  {!! Form::checkbox('remember_the_card', null, null, ['id' => 'remember-the-card', 'class' => 'i-check']) !!} {!! trans('theme.remember_card_for_future_use') !!}
                </label>
              </div>
            </div> <!-- /#cc-form -->

            <p id="payment-instructions" class="text-info small space30">
              <i class="fa fa-info-circle"></i>
              <span>@lang('theme.placeholder.select_payment_option')</span>
            </p>

            <div id="submit-btn-block" class="clearfix space30" style="display: none;">
              <button id="pay-now-btn"  class="btn btn-primary btn-lg btn-block" type="submit">
                <small><i class="fa fa-shield"></i> <span id="pay-now-btn-txt">@lang('theme.button.checkout')</span></small>
              </button>

              <a href="#" id="paypal-express-btn" class="hide" type="submit">
                <img src="{{ asset(sys_image_path('payment-methods') . "paypal-express.png") }}" width="70%" alt="paypal express checkout" title="paypal-express" />
              </a>
            </div>
        </div> <!-- /.col-md-4 -->
      </div><!-- /.row -->
    {!! Form::close() !!}
  </div>
</section>