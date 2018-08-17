<input name="product_price" value="{{ get_formated_decimal($item->currnt_sale_price(), true, 2) }}" type="hidden" />
<input name="product_id" value="{{ $item->id }}" type="hidden" />
<input name="product_link" value="{{ route('show.product', $item->slug) }}" type="hidden" />
<div class="product-info">
	@if($item->product->manufacturer)
  	<a href="{{ route('show.brand', $item->product->manufacturer->slug) }}" class="product-info-seller-name">{{ $item->product->manufacturer->name }}</a>
	@else
    <a href="{{ route('show.store', $item->shop->slug) }}" class="product-info-seller-name">{{ $item->shop->name }}</a>
	@endif

	<h5 class="product-info-title space10" data-name="product_name">{{ $item->title }}</h5>

	@include('layouts.ratings', ['ratings' => $item->feedbacks->avg('rating'), 'count' => $item->feedbacks_count])

	@include('layouts.pricing', ['item' => $item])

	<div class="row">
  	<div class="col-sm-6 col-xs-12 nopadding-right">
      	<div class="product-info-availability space10">@lang('theme.availability'):
      		<span>{{ $item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock') }}</span>
      	</div>
  	</div>
  	<div class="col-sm-6 col-xs-12 nopadding-left">
      	<div class="product-info-availability space10">@lang('theme.condition'):
      		<span><b>{{ $item->condition }}</b></span>
      	</div>
  	</div>
	</div>

	<a href="{{ route('wishlist.add', $item->product) }}" class="btn btn-link">
		<i class="fa fa-heart-o"></i> @lang('theme.button.add_to_wishlist')
	</a>
</div><!-- /.product-info -->

@include('layouts.share_btns')
