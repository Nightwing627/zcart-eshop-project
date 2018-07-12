<div class="product-info-rating">
	@for($i = 1; $i <= 5; $i++)
		@if( ($ratings - $i) > 0 )
			<span class="rated"><i class="fa fa-star"></i></span>
		@elseif( ($ratings - $i) < 0 && ($ratings - $i) > -1 )
			<span class="rated"><i class="fa fa-star-half-o"></i></span>
		@else
			<span><i class="fa fa-star-o"></i></span>
		@endif
	@endfor
	@if(isset($count) && $count)
		<a href="#" class="product-info-rating-count">({{ $ratings }}) {{ trans_choice('theme.reviews', 2, ['count' => 2]) }}</a>
	@endif
</div>