<section>
  <div class="container">
    <div class="row">
      <div class="col-md-3 bg-light">
        <h3 class="widget-title">{{ trans('theme.order_info') }}</h3>
        <ul class="shopping-cart-summary space20">
          <li>
            <span>{{ trans('theme.subtotal') }}</span>
            <span>{{ get_formated_currency($cart->total, 2) }}</span>
          </li>
          <li>
            <span>{{ trans('theme.shipping') }}</span>
            <span>
              {{ $cart->get_shipping_cost() > 0 ? get_formated_currency($cart->get_shipping_cost(), 2) : trans('theme.free') }}
            </span>
          </li>
          @if($cart->packaging > 0)
            <li>
              <span>{{ trans('theme.packaging') }}</span>
              <span>{{ get_formated_currency($cart->packaging, 2) }}</span>
            </li>
          @endif
          <li>
            <span>{{ trans('theme.discount') }}</span>
            <span>-{{ get_formated_currency($cart->discount, 2) }}</span>
          </li>
          @if($cart->taxes > 0)
            <li>
              <span>{{ trans('theme.taxes') }}</span>
              <span>{{ get_formated_currency($cart->taxes, 2) }}</span>
            </li>
          @endif
          <li>
            <span class="lead">{{ trans('theme.total') }}</span>
            <span class="lead">{{ get_formated_currency($cart->grand_total(), 2) }}</span>
          </li>
        </ul>

        <div class="clearfix space50"></div>

        <a class="btn btn-black flat" href="{{ route('cart.index') }}">{{ trans('theme.button.update_cart') }}</a>
        <a class="btn btn-black flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a>
      </div> <!-- /.col-md-3 -->

      <div class="col-md-6">
        <h3 class="widget-title">{{ trans('theme.billing_detail') }}</h3>
        {!! Form::open(['route' => 'customer.login.submit', 'id' => 'checkoutForm', 'data-toggle' => 'validator', 'novalidate']) !!}
            <div class="form-group">
                <label>First &amp; Last Name</label>
                <input class="form-control flat" type="text" />
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control flat" type="text" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control flat" type="text" />
                    </div>
                </div>
            </div>
            <div class="checkbox">
                <label>
                    <input class="i-check" type="checkbox" id="create-account-checkbox" /> Create Account
                </label>
            </div>
            <div id="create-account" class="hide">
                <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control flat" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input class="form-control flat" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Country</label>
                <input class="form-control flat" type="text" />
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>City</label>
                        <input class="form-control flat" type="text" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Zip/Postal</label>
                        <input class="form-control flat" type="text" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control flat" type="text" />
            </div>
            <div class="checkbox">
                <label>
                    <input class="i-check" type="checkbox" id="shipping-address-checkbox" /> Ship to a Different Address
                </label>
            </div>
            <div id="shipping-address" class="hide">
                <div class="form-group">
                    <label>Shipping Country</label>
                    <input class="form-control flat" type="text" />
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Shipping City</label>
                            <input class="form-control flat" type="text" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Zip/Postal</label>
                            <input class="form-control flat" type="text" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Shipping Address</label>
                    <input class="form-control flat" type="text" />
                </div>
            </div>
        {!! Form::close() !!}
      </div> <!-- /.col-md-6 -->

      <div class="col-md-3">
          <h3 class="widget-title">{{ trans('theme.payment_options') }}</h3>
          @php
            $activeManualPaymentMethods = $shop->config->manualPaymentMethods;
          @endphp

          <div class="space30">
              @foreach($shop->paymentMethods as $payment_provider)
                  @php
                    // $logo_path = sys_image_path('payment-methods') . "{$payment_provider->code}.png";
                    switch ($payment_provider->code) {
                      case 'stripe':
                        $has_config = $shop->config->stripe ? TRUE : FALSE;
                        $info = trans('theme.notify.we_dont_save_card_info');
                        break;

                      case 'paypal-express':
                        $has_config = $shop->config->paypalExpress ? TRUE : FALSE;
                        $info = trans('theme.notify.you_will_be_redirected_to_paypal');
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
                  @continue(!$has_config)

                  @if($customer && (\App\PaymentMethod::TYPE_CREDIT_CARD == $payment_provider->type) && $customer->hasBillingToken())
                    <div class="form-group">
                      <label>
                        <input name="payment_method" value="saved_card" class="i-radio-blue payment-option" type="radio" data-info="{{$info}}" data-type="{{ $payment_provider->type }}" required="required" checked /> @lang('theme.card') <i class="fa fa-cc-{{ strtolower($customer->card_brand) }}"></i> ************{{$customer->card_last_four}}
                      </label>
                    </div>
                  @endif

                  <div class="form-group">
                    <label>
                      <input name="payment_method" value="{{ $payment_provider->code }}" class="i-radio-blue payment-option" type="radio" data-info="{{$info}}" data-type="{{ $payment_provider->type }}" required="required"/> {{ $payment_provider->code == 'stripe' ? trans('theme.credit_card') : $payment_provider->name }}
                    </label>
                  </div>
              @endforeach
          </div>

          <div id="cc-form" class="cc-form" style="display: none;">
              <hr/>
              <div class="form-group form-group-cc-name">
                {!! Form::text('name', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.cardholder_name'), 'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-number">
                {!! Form::text('number', Null, ['class' => 'form-control flat', 'data-stripe' => 'number', 'placeholder' => trans('theme.placeholder.card_number'), 'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-cvc">
                {!! Form::text('cvc', Null, ['class' => 'form-control flat', 'data-stripe' => 'cvc', 'placeholder' => trans('theme.placeholder.card_cvc'), 'required']) !!}
                <div class="help-block with-errors"></div>
              </div>

              <div class="row">
                <div class="col-md-6 nopadding-right">
                  <div class="form-group has-feedback">
                    {{ Form::selectMonth('exp-month', Null, ['id' =>'exp-month', 'class' => 'form-control flat', 'data-stripe' => 'exp-month', 'placeholder' => trans('theme.placeholder.card_exp_month'), 'required'], '%m') }}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-6 nopadding-left">
                  <div class="form-group has-feedback">
                    {{ Form::selectYear('exp-year', date('Y'), date('Y') + 10, Null, ['id' =>'exp-year', 'class' => 'form-control flat', 'data-stripe' => 'exp-year', 'placeholder' => trans('theme.placeholder.card_exp_year'), 'required']) }}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
          </div> <!-- /#cc-form -->

          <p class="text-info small space30">
            <i class="fa fa-info-circle"></i>
            <span id="payment-instructions">@lang('theme.placeholder.select_payment_option')</span>
          </p>

          <div class="clearfix space30">
            <a href="#" id="pay-now-btn" class="btn btn-primary btn-lg btn-block space20">
              <small><i class="fa fa-shield"></i> <span id="pay-now-btn-txt">@lang('theme.button.checkout')</span></small>
            </a>

            <a href="#" id="paypal-express-btn" class="hide space20">
              <img src="{{ asset(sys_image_path('payment-methods') . "paypal-express.png") }}" width="70%" alt="paypal express checkout" title="paypal-express" />
            </a>
          </div>
      </div> <!-- /.col-md-3 -->
    </div>
  </div>
</section>