<section>
    <div class="container">
      <div class="row">
          <div class="col-md-3 bg-light">
              <h3 class="widget-title">{{ trans('theme.order_info') }}</h3>
              <ul class="shopping-cart-summary space20">
                  <li>
                    <span>{{ trans('theme.subtotal') }}</span>
                    <span>$2199</span>
                  </li>
                  <li>
                    <span>{{ trans('theme.shipping') }}</span>
                    <span>Free</span>
                  </li>
                  <li>
                    <span>{{ trans('theme.packaging') }}</span>
                    <span>Free</span>
                  </li>
                  <li>
                    <span>{{ trans('theme.discount') }}</span>
                    <span>$0</span>
                  </li>
                  <li>
                    <span>{{ trans('theme.taxes') }}</span>
                    <span>$0</span>
                  </li>
                  <li>
                    <span>{{ trans('theme.total') }}</span>
                    <span>$2199</span>
                  </li>
              </ul>

              <a href="#" class="space10">
                  <img src="{{ asset(sys_image_path('payment-methods') . "paypal-express.png") }}" width="70%" alt="Image Alternative text" title="Image Title" />
              </a>

              <p class="small text-muted space30">Important: You will be redirected to PayPal's website to securely complete your payment.</p>

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
              <ul class="space20">
                @if($customer && $customer->hasBillingToken())
                  <div class="form-group">
                      <label>
                        <input name="payment_method" value="save_card" class="i-radio-blue" type="radio" required="required" checked /> @lang('theme.card') <i class="fa fa-cc-{{ strtolower($customer->card_brand) }}"></i> ************{{$customer->card_last_four}}
                      </label>
                  </div>
                @endif

                @foreach($shop->paymentMethods as $payment_provider)
                    @php
                      // $logo_path = sys_image_path('payment-methods') . "{$payment_provider->code}.png";
                      switch ($payment_provider->code) {
                        case 'stripe':
                          if($shop->config->stripe)
                            $has_config = TRUE;
                          break;

                        case 'paypal-express':
                          if($shop->config->paypalExpress)
                            $has_config = TRUE;
                          break;

                        case 'wire':
                        case 'cod':
                          $active = $shop->config->manualPaymentMethods->pluck('id')->toArray();
                          $has_config = in_array($payment_provider->id, $active) ? TRUE : FALSE;
                          break;

                        default:
                          $has_config = FALSE;
                          break;
                      }
                    @endphp

                    {{-- Skip the payment option if not confirured --}}
                    @continue(!$has_config)

                    <li>
                        <div class="form-group">
                          <label>
                            <input name="payment_method" value="{{ $payment_provider->code }}" class="i-radio-blue payment-option" type="radio" data-info="{{ '' }}" data-type="{{ $payment_provider->type }}" required="required"/> {{ $payment_provider->code == 'stripe' ? trans('theme.credit_card') : $payment_provider->name }}
                          </label>
                        </div>
                    </li>
                @endforeach
              </ul>
              <p class="text-info small">
                <i class="fa fa-info-circle"></i>
                <span id="payment-instructions">@lang('theme.placeholder.select_payment_option')</span>
              </p>

              {{--
              @if($customer)
                @lang('theme.card') <i class="fa fa-cc-{{ strtolower($customer->card_brand) }}"></i> ************{{$customer->card_last_four}}
              @else
                <div class="cc-form">
                    <div class="clearfix"></div>
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
                </div>
              @endif
              --}}
              <a class="btn btn-primary btn-lg btn-block"><small><i class="fa fa-shield"></i> @lang('theme.button.pay_now')</small></a>

              <div class="clearfix space30"></div>

              <p class="small text-muted">
                <span class="text-info">
                  <strong><i class="icon fa fa-info-circle"></i></strong>
                  {{ trans('theme.notify.we_dont_save_card_info') }}
                </span>
              </p>
          </div> <!-- /.col-md-3 -->
      </div>
    </div>
</section>