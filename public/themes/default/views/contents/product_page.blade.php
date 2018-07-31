<section>
	<div class="container">
		<div class="row sc-product-item">
		  	<div class="col-md-5 col-sm-6">
		  		@include('layouts.jqzoom', ['item' => $item])
		  	</div><!-- /.col-md-5 col-sm-6 -->

		  	<div class="col-md-7 col-sm-6">
		  		<div class="row">
				  	<div class="col-md-7 col-sm-6 nopadding">
				      	<div class="product-single">
					  		@include('layouts.product_info', ['item' => $item])

				          	<div class="sep"></div>

				          	<div class="product-info-options space10">
				              	<div class="row select-box-wrapper">
				              		@foreach($item->attributeValues as $attribute_value)
					                  	<div class="col-md-6 space10">
					                      	<p>
					                      		{{ $attribute_value->attribute->name }}:
					                      		{{ $attribute_value->value }}
					                      	</p>
				                      	</div>
				              		@endforeach

				              		{{-- @foreach($attributes as $attribute)
					                  	<div class="col-md-6 space10">
					                      	<p>{{ $attribute->name }}:</p>
						                    <select class="product-attribute-selector {{ $attribute->attribute_type_id == \App\Attribute::TYPE_COLOR ? 'color-options' : 'selectBoxIt' }}" required="required">
							              		@foreach($attribute->attributeValues as $option)
					                          		<option value="{{ $option->id }}" data-color="{{ $option->color }}" {{ in_array($option->id, $item_attrs) ? 'selected' : '' }}>{{ $option->value }}</option>
							              		@endforeach
					                      	</select>
					                  	</div>
					                  	@if($loop->iteration%2 == 0)
								          	<div class="clearfix"></div>
					                  	@endif
				              		@endforeach --}}
				              	</div><!-- /.row .select-box-wrapper -->

				              	<div class="space10"></div>

				              	<dir class="product-qty-wrapper">
				                  <p>@lang('theme.quantity'):</p>
				                  <div class="product-info-qty-item">
				                      	<button class="product-info-qty product-info-qty-minus">-</button>
				                      	<input class="product-info-qty product-info-qty-input" data-name="product_quantity" data-max="{{$item->stock_quantity}}" type="text" value="1">
				                      	<button class="product-info-qty product-info-qty-plus">+</button>
					                </div>
				                  	<span class="available-qty-count">@lang('theme.stock_count', ['count' => $item->stock_quantity])</span>
				              	</dir>
				          	</div><!-- /.product-option -->

				          	<div class="sep"></div>

 				          	<a href="{{ route('checkout') }}" class="btn btn-lg btn-warning flat"><i class="fa fa-rocket"></i> @lang('theme.button.buy_now')</a>

 				          	@if($item->product->inventories_count > 1)
						        <a href="{{ route('show.offers', $item->product->slug) }}" class="btn btn-sm btn-link">
					        		@lang('theme.view_more_offers', ['count' => $item->product->inventories_count])
						        </a>
					        @endif
				      	</div><!-- /.product-single -->
			  		</div>

				  	<div class="col-md-5 col-sm-6 nopadding-right">
				        <div class="seller-info space30">
				            <div class="text-muted small">@lang('theme.sold_by')</div>

							<img src="{{ get_storage_file_url(optional($item->shop->image)->path, 'tiny') }}" class="seller-info-logo img-sm img-circle" alt="{{ trans('app.logo') }}">

				            <a href="{{ route('show.store', $item->shop->slug) }}" class="seller-info-name">
				            	{{ $item->shop->name }}
				            </a>
				        </div><!-- /.seller-info -->

			          	<a href="#" class="btn btn-primary btn-lg btn-block flat space10 sc-add-to-cart">
			          		<i class="fa fa-shopping-bag"></i> @lang('theme.button.add_to_cart')
			          	</a>

			          	@if($item->product->inventories_count > 1)
					        <a href="{{ route('show.offers', $item->product->slug) }}" class="btn btn-block btn-link btn-sm">
					        	@lang('theme.view_more_offers', ['count' => $item->product->inventories_count])
					        </a>
						@endif
			  		</div>
		  		</div><!-- /.row -->
		      	<div class="space20"></div>
		  	</div><!-- /.col-md-7 col-sm-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

<div class="clearfix space20"></div>

<section>
    <div class="container">
      	<div class="row">
	        <div class="col-md-2 bg-light nopadding-right nopadding-left">
		        <div class="section-title">
		          <h4>@lang('theme.bought_together')</h4>
		        </div>
				<ul class="sidebar-product-list">
			        <li>
			            <div class="product-widget">
			                <div class="product-img-wrap">
			                    <img class="product-img" src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
			                </div>
			                <div class="product-info">
			                    <a href="product-page.html" class="product-info-title">Dooney & Bourke Pebble Grain Lexington</a>
			                    <div class="product-info-price">$142</div>
			                </div>
			                <div class="space10"></div>
				          	<a href="#" class="btn btn-primary btn-xs flat sc-add-to-cart pull-right"><i class="fa fa-shopping-bag"></i> @lang('theme.button.add_to_cart')</a>
			            </div>
			        </li>
			        <li>
			            <div class="product-widget">
			                <div class="product-img-wrap">
			                    <img class="product-img" src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
			                </div>
			                <div class="product-info">
			                    <a href="product-page.html" class="product-info-title">Dooney & Bourke Pebble Grain Lexington</a>
			                    <div class="product-info-price">$142</div>
			                </div>
			                <div class="space10"></div>
				          	<a href="#" class="btn btn-primary btn-xs flat sc-add-to-cart pull-right"><i class="fa fa-shopping-bag"></i> @lang('theme.button.add_to_cart')</a>
			            </div>
			        </li>
	          	</ul>
	        </div><!-- /.col-md-2 -->

	        <div class="col-md-10" id="product_desc_section">
          		<div role="tabpanel">
	              	<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#desc_tab" aria-controls="desc_tab" role="tab" data-toggle="tab" aria-expanded="true">@lang('theme.product_desc')</a>
						</li>
						<li role="presentation">
							<a href="#seller_desc_tab" aria-controls="seller_desc_tab" role="tab" data-toggle="tab" aria-expanded="false">@lang('theme.product_desc_seller')</a>
						</li>
						<li role="presentation">
							<a href="#reviews_tab" aria-controls="reviews_tab" role="tab" data-toggle="tab" aria-expanded="false">@lang('theme.customer_reviews')</a>
						</li>
					</ul><!-- /.nav-tab -->

              		<div class="tab-content">
                  		<div role="tabpanel" class="tab-pane fade active in" id="desc_tab">
							{!! $item->product->description !!}
		                </div>
         		        <div role="tabpanel" class="tab-pane fade" id="seller_desc_tab">
                		  	{!! $item->description !!}
	                  	</div>
		              	<div role="tabpanel" class="tab-pane fade" id="reviews_tab">
                      		<div class="reviews-tab">
	                      		@forelse($item->feedbacks->sortByDesc('created_at') as $feedback)
									<p>
										<b>{{ $feedback->customer->nice_name or $feedback->customer->name  }}</b>

										<span class="pull-right small">
											<b class="text-success">@lang('theme.verified_purchase')</b>
											<span class="text-muted"> | {{ $feedback->created_at->diffForHumans() }}</span>
										</span>
									</p>

									<p>{{ $feedback->comment }}</p>

			                        @include('layouts.ratings', ['ratings' => $feedback->rating])

			                        @unless($loop->last)
										<div class="sep"></div>
			                        @endunless
	                          	@empty
	                          		<div class="space20"></div>
	                          		<p class="lead text-center text-muted">@lang('theme.no_reviews')</p>
	                          	@endforelse
	                      	</div>
    	              	</div>
	              	</div><!-- /.tab-content -->
          		</div><!-- /.tabpanel -->
        	</div><!-- /.col-md-9 -->
      	</div><!-- /.row -->
    </div><!-- /.container -->
</section>

<div class="clearfix space20"></div>