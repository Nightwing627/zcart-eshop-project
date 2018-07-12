@extends('layouts.main')

@section('content')
    <!-- breadcrumb -->
    <section>
        <div class="container">
            <header class="page-header">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb nav-breadcrumb">
                          <li><a href="{{ url('/') }}">{{ trans('theme.home') }}</a></li>
                          <li><a href="{{ route('cart.index') }}">{{ trans('theme.shoping_cart') }}</a></li>
                          <li class="active">{{ trans('theme.checkout') }}</li>
                        </ol>
                    </div>
                </div>
            </header>
        </div>
    </section>

    <!-- CONTENT SECTION -->
    <section>
        <div class="container">
          <div class="row">
              <div class="col-md-3 bg-light">
                  <h3 class="widget-title">{{ trans('theme.order_info') }}</h3>
                  <ul class="shopping-cart-summary">
                      <li>
                        <span>{{ trans('theme.subtotal') }}</span>
                        <span>$2199</span>
                      </li>
                      <li>
                        <span>{{ trans('theme.shipping') }}</span>
                        <span>Free</span>
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

                  <div class="space20"></div>
                  <a href="#">
                      <img src="img/paypal.png" width="70%" alt="Image Alternative text" title="Image Title" />
                  </a>
                  <div class="space10"></div>
                  <p class="small text-muted">Important: You will be redirected to PayPal's website to securely complete your payment.</p>

                  <div class="space30"></div>
                  <div class="btn-group" role="group">
                    <a class="btn btn-black flat" href="{{ route('cart.index') }}">{{ trans('theme.button.update_cart') }}</a>
                    <a class="btn btn-black flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a>
                  </div>
              </div>
              <div class="col-md-6">
                <h3 class="widget-title">{{ trans('theme.billing_detail') }}</h3>
		        {!! Form::open(['route' => 'customer.login.submit', 'id' => 'loginForm', 'data-toggle' => 'validator', 'novalidate']) !!}
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
                              <input class="i-check" type="checkbox" id="create-account-checkbox" /> {{ trans('theme.order_info') }}Create Account
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
              </div>

              <div class="col-md-3">
                  <h3 class="widget-title">{{ trans('theme.payment') }}</h3>
                  <div class="cc-form">
                      <div class="clearfix"></div>
                      <div class="form-group form-group-cc-name">
                          <label>Cardholder Name</label>
                          <input class="form-control flat" type="text" />
                      </div>
                      <div class="form-group form-group-cc-number">
                          <label>Card Number</label>
                          <input class="form-control flat" placeholder="xxxx xxxx xxxx xxxx" type="text" /><span class="cc-card-icon"></span>
                      </div>
                      <div class="form-group form-group-cc-cvc">
                          <label>CVC</label>
                          <input class="form-control flat" placeholder="xxxx" type="text" />
                      </div>
                      <div class="form-group form-group-cc-date">
                          <label>Valid Till</label>
                          <input class="form-control flat" placeholder="mm/yy" type="text" />
                      </div>
                  </div>
                  <a class="btn btn-primary btn-lg btn-block flat"><i class="fa fa-money"></i> Proceed Payment</a>
              </div>
          </div>
        </div>
    </section>
    <!-- END CONTENT SECTION -->

    <div class="space30"></div>

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection