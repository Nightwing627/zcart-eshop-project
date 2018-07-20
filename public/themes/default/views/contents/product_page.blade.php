<section>
	<div class="container">
		<div class="row sc-product-item">
		  	<div class="col-md-5 col-sm-6">
		      	<div class="clearfix">
		          	<a href="{{ get_product_img_src($product, 'full') }}" id="jqzoom" data-rel="gal-1">
		              	<img class="product-img" data-name="product_image" src="{{ get_product_img_src($product, 'large') }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
		          	</a>
		      	</div>

		      	<ul class="jqzoom-thumbs">
		      		@if($product->featuredImage)
				        <li>
			              	<a class="zoomThumbActive" href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: '{{ get_storage_file_url($product->featuredImage->path, 'large') }}', largeimage: '{{ get_storage_file_url($product->featuredImage->path, 'full') }}'}">
			                  	<img src="{{ get_storage_file_url($product->featuredImage->path, 'small') }}" alt="Thumb" title="Thumb Image" />
			              	</a>
			          	</li>
		      		@endif
	          		@foreach($product->images as $img)
			        	<li>
			              	<a class="{{ !$product->featuredImage && $loop->first ? 'zoomThumbActive' : '' }}" href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: '{{ get_storage_file_url($img->path, 'large') }}', largeimage: '{{ get_storage_file_url($img->path, 'full') }}'}">
			                  	<img src="{{ get_storage_file_url($img->path, 'small') }}" alt="Thumb" title="Thumb Image" />
			              	</a>
			          	</li>
		          	@endforeach
		      	</ul> <!-- /.jqzoom-thumbs -->
		  	</div><!-- /.col-md-5 col-sm-6 -->

		  	<div class="col-md-7 col-sm-6">
		  		<div class="row">
				  	<div class="col-md-7 col-sm-6 nopadding">
				      	<div class="product-single">
		                    <input name="product_price" value="{{ $product->inventories->min('sale_price') }}" type="hidden" />
		                    <input name="product_id" value="{{ $product->id }}" type="hidden" />
				          	<div class="product-info">
				              	<a href="{{ route('show.brand', $product->manufacturer->slug) }}" class="product-info-seller-name">{{ $product->manufacturer ? $product->manufacturer->name : 'The Demo Shop' }}</a>
				              	<h5 class="product-info-title" data-name="product_name">{{ $product->name }}</h5>

		                        @include('layouts.ratings', ['ratings' => $product->averageFeedback(), 'count' => $product->feedbacks_count])

				              	<div class="product-info-price">
				              		{{-- @if() --}}
					              		<span class="old-price">{!! get_formated_price(200) !!}</span>
				              		{{-- @endif --}}
				              		{!! get_formated_price($product->inventories->min('sale_price')) !!}</div>

				              	<div class="product-info-availability">@lang('theme.availability'): <span>@lang('theme.in_stock')</span></div>

				              	<div class="space10"></div>

				              	<a href="{{ route('wishlist.add', $product) }}" class="btn btn-link"><i class="fa fa-heart-o"></i> @lang('theme.button.add_to_wishlist')</a>
				          	</div><!-- /.product-info -->

				          	@include('layouts.share_btns')

				          	<div class="space20"></div>

				          	<div class="sep"></div>

				          	<div class="product-info-options">
				              	<div class="color-option">
				                  	<p>Colors:</p>
				                  	<a class="black" href="#" style="background-color: #000000;" onclick="return false;"></a>
				                  	<a class="red" href="#" style="background-color: #a30014;" onclick="return false;"></a>
				                  	<a class="yellow" href="#" style="background-color: #c8c258;" onclick="return false;"></a>
				                  	<a class="darkgrey" href="#" style="background-color: #2f3c4d;" onclick="return false;"></a>
				                  	<a class="litebrown" href="#" style="background-color: #c3c2c0;" onclick="return false;"></a>
				              	</div>

				              	<div class="space10"></div>

				              	<dir class="product-qty-wrapper">
				                  <p>@lang('theme.quantity'):</p>
				                  <div class="product-info-qty-item">
				                      	<button class="product-info-qty product-info-qty-minus">-</button>
				                      	<input class="product-info-qty product-info-qty-input" data-name="product_quantity" type="text" value="1">
				                      	<button class="product-info-qty product-info-qty-plus">+</button>
					                </div>
				                  	<span class="available-qty-count">@lang('theme.stock_count', ['count' => 324])</span>
				              	</dir>

				              	<div class="space10"></div>

				              	<div class="row select-box-wrapper">
				                  	<div class="col-md-6">
				                      <p>Size:</p>
				                      <select class="selectBoxIt">
				                          <option>XL</option>
				                          <option>XXL</option>
				                          <option>XXXL</option>
				                      </select>
				                  	</div>
				                  	<div class="col-md-6">
				                      <p>Style:</p>
				                      <select class="selectBoxIt">
				                          <option>Modern</option>
				                          <option>Classic</option>
				                          <option>Vintage</option>
				                      </select>
				                  	</div>
				              	</div>
				          	</div><!-- /.product-option -->

				          	<div class="sep"></div>

 				          	<a href="{{ route('checkout') }}" class="btn btn-lg btn-warning flat"><i class="fa fa-rocket"></i> @lang('theme.button.buy_now')</a>
				          	<a href="{{ route('wishlist.add', $product) }}" class="btn btn-link"><i class="fa fa-heart-o"></i> @lang('theme.button.add_to_wishlist')</a>
				      	</div><!-- /.product-single -->
			  		</div>
				  	<div class="col-md-5 col-sm-6 nopadding-right">
				        <div class="seller-info">
				            <div class="">@lang('theme.sold_by')</div>
				            <img src="http://via.placeholder.com/30" alt="Logo" class="seller-info-logo img-sm img-circle">
				            <a href="{{ route('show.store', '$order->shop->slug') }}" class="seller-info-name">The Demo Shop</a>
				            <div class="space10"></div>
				        </div><!-- /.seller-info -->
				        <div class="space20"></div>
			          	<a href="#" class="btn btn-primary btn-lg btn-block flat sc-add-to-cart"><i class="fa fa-shopping-bag"></i> @lang('theme.button.add_to_cart')</a>
				        <div class="space20"></div>
				        <a href="#">@lang('theme.view_more_offers')</a>
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
                  <li role="presentation" class="active"><a href="#desc_tab" aria-controls="desc_tab" role="tab" data-toggle="tab" aria-expanded="true">@lang('theme.product_desc')</a></li>
                  <li role="presentation"><a href="#seller_desc_tab" aria-controls="seller_desc_tab" role="tab" data-toggle="tab" aria-expanded="false">@lang('theme.product_desc_seller')</a></li>
                  <li role="presentation"><a href="#reviews_tab" aria-controls="reviews_tab" role="tab" data-toggle="tab" aria-expanded="false">@lang('theme.customer_reviews')</a></li>
              </ul><!-- /.nav-tab -->

              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="desc_tab">
					{{ $product->description }}
                  </div>
                  {{-- @if() --}}
	                  <div role="tabpanel" class="tab-pane fade" id="seller_desc_tab">
	                  	Seller Specifications here!
	                  </div>
                  {{-- @endif --}}
                  <div role="tabpanel" class="tab-pane fade" id="reviews_tab">
                      	<div class="reviews-tab">
                      		@forelse($product->feedbacks as $feedback)
								<p>
									<b>{{ $feedback->customer->getName() }}</b>,
									{{ $feedback->created_at->diffForHumans() }}
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