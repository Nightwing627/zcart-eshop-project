<div class="modal fade" id="quickViewModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content flat">
        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
          <div class="row">
            <div class="col-md-5 col-sm-6">
                <div class="clearfix">
                    <a href="http://via.placeholder.com/500" id="jqzoom" data-rel="gal-1">
                        <img class="product-img" src="http://via.placeholder.com/300" alt="Image Alternative text" title="Image Title" />
                    </a>
                </div>

                <ul class="jqzoom-thumbs">
                    <li>
                        <a class="zoomThumbActive" href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: 'http://via.placeholder.com/500', largeimage: 'http://via.placeholder.com/1000'}">
                            <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: 'http://via.placeholder.com/500', largeimage: 'http://via.placeholder.com/1000'}">
                            <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: 'http://via.placeholder.com/500', largeimage: 'http://via.placeholder.com/1000'}">
                            <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: 'http://via.placeholder.com/500', largeimage: 'http://via.placeholder.com/1000'}">
                            <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-rel="{gallery:'gal-1', smallimage: 'http://via.placeholder.com/500', largeimage: 'http://via.placeholder.com/1000'}">
                            <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                        </a>
                    </li>
                </ul> <!-- /.jqzoom-thumbs -->
            </div>
            <div class="col-md-7 col-sm-6">
                <div class="product-single">
                    <div class="product-info">
                        <a href="shop-page.html" class="product-info-seller-name">The Demo Shop</a>
                        <h5 class="product-info-title">Dooney & Bourke Pebble Grain Hobo Dooney & Bourke Pebble Grain Hobo Dooney & Bourke Pebble Grain Hobo</h5>

                        @include('layouts.ratings', ['ratings' => 4.5, 'count' => true])

                        <div class="product-info-price"><span class="old-price">$200.00</span>$106</div>

                        <div class="product-info-availability">@lang('theme.availability'): <span>@lang('theme.in_stock')</span></div>

                        <div class="space10"></div>
                        <a href="#" class="btn btn-link"><i class="fa fa-heart-o"></i> @lang('theme.button.add_to_wishlist')</a>
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
                                <input class="product-info-qty product-info-qty-input" type="text" value="1">
                                <button class="product-info-qty product-info-qty-plus">+</button>
                            </div>
                            <span class="available-qty-count">@lang('theme.stock_count', ['count' => 13])</span>
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
                    <a href="#" class="btn btn-primary flat btn-color add-cart-btn" data-id="1" data-name="product 1" data-summary="summary 1" data-price="10" data-quantity="1" data-image="http://via.placeholder.com/100"><i class="fa fa-shopping-bag"></i> @lang('theme.button.add_to_cart')</a>
                    <a href="product-page.html" class="btn btn-default flat btn-black"> @lang('theme.button.view_product_details')</a>
                    <a href="#" class="btn btn-link"><i class="fa fa-heart-o"></i> @lang('theme.button.add_to_wishlist')</a>
                </div><!-- /.product-single -->
                <div class="space20"></div>
            </div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#quickViewModal -->
