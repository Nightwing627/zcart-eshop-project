<div class="product-info-price">
    <span class="old-price" style="display: {{$item->hasOffer() ? '' : 'none'}}">{!! get_formated_price($item->sale_price, 2) !!}</span>
    <span class="product-info-price-new">{!! get_formated_price($item->currnt_sale_price(), 2) !!}</span>

    <small class="percent-off" style="display: {{$item->hasOffer() ? '' : 'none'}}">@lang('theme.percent_off', ['value' => get_percentage_of($item->sale_price, $item->offer_price)])</small>
</div>