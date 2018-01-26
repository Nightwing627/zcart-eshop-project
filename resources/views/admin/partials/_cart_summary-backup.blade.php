
<?php if(isset($order)) $cart = $order; ?>

<div id="cart-summary" class="row">
  <div class="col-xs-12">

    <div class="col-md-3 col-sm-6 box-cart-summary">

      <h4 class="box-title">
        {{ trans('app.total') }}
      </h4>

      <h2 id="summary-total">

        {{ isset($cart->total) ? get_formated_decimal($cart->total) : 0 }}

      </h2>

    </div>
    <div class="col-md-3 col-sm-6 box-cart-summary">

      <h4 class="box-title">
        {{ trans('app.tax') }}
        <small>
          (<span id="summary-taxrate">

              {{ isset($cart->tax->taxrate) ? get_formated_decimal($cart->tax->taxrate) : 0 }}

          </span>%)
        </small>
      </h4>

      <h2 id="summary-tax">

          {{ isset($cart->tax_amount) ? get_formated_decimal($cart->tax_amount) : 0 }}

      </h2>

    </div>
    <div class="col-md-3 col-sm-6 box-cart-summary">

      <h4 class="box-title">
        {{ trans('app.shipping') }}
        @if(get_formated_decimal(config('shop_settings.order_handling_cost')))
          <small id="summary-hadling-cost">+
            {{ trans('app.handling') . '(' . get_formated_currency(config('shop_settings.order_handling_cost')) . ')' }}
          </small>
        @endif
        <span id="summary-packaging-cost"><small>+
          {{ trans('app.packaging') . '(' }}@if(config('system_settings.show_currency_symbol')){{config('system_settings.currency_symbol') . (config('system_settings.show_space_after_symbol') ? ' ' : '') }}@endif
          <span id="summary-packaging-cost-value"></span>)</small>
        </span>
      </h4>

      <h2 id="summary-shipping">

          {{ isset($cart->shipping) ? get_formated_decimal($cart->shipping) : 0 }}

      </h2>

    </div>
    <div class="col-md-3 col-sm-6 box-cart-summary">

      <h4 class="box-title">
        {{ trans('app.grand_total') }}
      </h4>

      <h2 id="summary-grand-total">

          {{ isset($cart->grand_total) ? get_formated_decimal($cart->grand_total) : 0 }}

      </h2>

    </div>
  </div>
</div>
