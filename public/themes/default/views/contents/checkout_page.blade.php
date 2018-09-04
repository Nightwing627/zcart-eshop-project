<section>
  <div class="container">
    {!! Form::open(['route' => ['order.create', $cart], 'id' => 'checkoutForm', 'data-toggle' => 'validator', 'novalidate']) !!}
      <div class="row space30">
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

          <div class="clearfix space30"></div>

          <a class="btn btn-black flat" href="{{ route('cart.index') }}">{{ trans('theme.button.update_cart') }}</a>
          <a class="btn btn-black flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a>
        </div> <!-- /.col-md-3 -->

        <div class="col-md-5">
          <h3 class="widget-title">{{ trans('theme.ship_to') }}</h3>
          @if(isset($customer))
            <div class="row customer-address-list space20">
              @foreach($customer->addresses as $address)
                @php
                  if($customer->addresses->count() == 1)
                    $pre_select = true;
                  else if(Request::has('address'))
                    $pre_select = request()->address == $address->id;
                  else
                    $pre_select = $address->address_type == 'Shipping';
                @endphp

                <div class="col-sm-12 col-md-6 nopadding-{{ $loop->iteration%2 == 1 ? 'right' : 'left'}}">
                  <div class="address-list-item {{ $pre_select ? 'selected' : '' }}">
                    {!! $address->toHtml('<br/>', false) !!}
                    <input type="radio" class="ship-to-address" name="ship_to" value="{{$address->id}}" {{ $pre_select ? 'checked' : '' }}>
                  </div>
                </div>
                @if($loop->iteration%2 == 0)
                  <div class="clearfix"></div>
                @endif
              @endforeach
            </div>

            <a href="#" data-toggle="modal" data-target="#createAddressModal" class="btn btn-default btn-sm flat space30">
              <i class="fa fa-address-card-o"></i> @lang('theme.button.add_new_address')
            </a>
          @else
              @include('forms.address')

              <div class="checkbox">
                <label>
                  {!! Form::checkbox('create-account', Null, Null, ['id' => 'create-account-checkbox', 'class' => 'i-check']) !!} {!! trans('theme.create_account') !!}
                </label>
              </div>

              <div id="create-account" class="space30" style="display: none;">
                <div class="form-group">
                  {!! Form::email('email', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.email'), 'maxlength' => '100']) !!}
                  <div class="help-block with-errors"></div>
                </div>

                <div class="row">
                  <div class="col-md-6 nopadding-right">
                    <div class="form-group">
                      {!! Form::password('password', ['class' => 'form-control flat', 'id' => 'acc-password', 'placeholder' => trans('app.placeholder.password'), 'data-minlength' => '6']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6 nopadding-left">
                    <div class="form-group">
                      {!! Form::password('password_confirmation', ['class' => 'form-control flat', 'placeholder' => trans('app.placeholder.confirm_password'), 'data-match' => '#acc-password']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>

                @if(config('system_settings.ask_customer_for_email_subscription'))
                  <div class="checkbox">
                    <label>
                      {!! Form::checkbox('subscribe', null, null, ['class' => 'i-check']) !!} {!! trans('app.form.subscribe_to_the_newsletter') !!}
                    </label>
                  </div>
                @endif

                <p class="text-info small">
                  <i class="fa fa-info-circle"></i>
                  @lang('theme.help.create_account_on_checkout', ['link' => get_page_url(\App\Page::PAGE_TNC_FOR_CUSTOMER)])
                </p>
              </div>

              {{-- <small class="help-block text-muted pull-right">* {{ trans('theme.help.required_fields') }}</small> --}}
          @endif

          <h3 class="widget-title">{{ trans('theme.leave_message_to_seller') }}</h3>
          <div class="form-group">
            {!! Form::textarea('buyer_note', Null, ['class' => 'form-control flat summernote-without-toolbar', 'placeholder' => trans('theme.placeholder.message_to_seller'), 'rows' => '2', 'maxlength' => '250']) !!}
            <div class="help-block with-errors"></div>
          </div>
        </div> <!-- /.col-md-5 -->

        <div class="col-md-4">
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
                    <input name="payment_method" value="{{ $payment_provider->id }}" data-code="{{ $payment_provider->code }}" class="i-radio-blue payment-option" type="radio" data-info="{{$info}}" data-type="{{ $payment_provider->type }}" required="required"/> {{ $payment_provider->code == 'stripe' ? trans('theme.credit_card') : $payment_provider->name }}
                  </label>
                </div>
              @endforeach
            </div>

            <div id="cc-form" class="cc-form" style="display: none;">
              <hr/>
              <div class="form-group form-group-cc-name">
                {!! Form::text('name', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.cardholder_name'), 'data-error' => trans('theme.help.enter_cardholder_name')]) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-number">
                {!! Form::text('number', Null, ['class' => 'form-control flat', 'data-stripe' => 'number', 'placeholder' => trans('theme.placeholder.card_number')]) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group form-group-cc-cvc">
                {!! Form::text('cvc', Null, ['class' => 'form-control flat', 'data-stripe' => 'cvc', 'placeholder' => trans('theme.placeholder.card_cvc')]) !!}
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
            </div> <!-- /#cc-form -->

            <p id="payment-instructions" class="text-info small space30">
              <i class="fa fa-info-circle"></i>
              <span>@lang('theme.placeholder.select_payment_option')</span>
            </p>

            <div class="clearfix"></div>

            <button id="pay-now-btn"  class="btn btn-primary btn-lg btn-block" type="submit">
              <small><i class="fa fa-shield"></i> <span id="pay-now-btn-txt">@lang('theme.button.checkout')</span></small>
            </button>

            <a href id="paypal-express-btn"  class="hide" type="submit">
              <img src="{{ asset(sys_image_path('payment-methods') . "paypal-express.png") }}" width="70%" alt="paypal express checkout" title="paypal-express" />
            </a>
        </div> <!-- /.col-md-4 -->
      </div><!-- /.row -->
    {!! Form::close() !!}
  </div>
</section>

@if(isset($customer))
  @include('modals.create_address')
@endif