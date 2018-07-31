<div class="product-info-price">
    @if($item->hasOffer())
        <span class="old-price">{!! get_formated_price($item->sale_price, 2) !!}</span>
    @endif
    <span class="product-info-price-new">{!! get_formated_price($item->currnt_sale_price(), 2) !!}</span>
</div>