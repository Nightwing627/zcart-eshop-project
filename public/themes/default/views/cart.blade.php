@extends('layouts.main')

@section('content')
    <!-- breadcrumb -->
    <section>
        <div class="container">
            <header class="page-header">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb nav-breadcrumb">
                          @include('headers.lists.home')
                          <li class="active">{{ trans('theme.shoping_cart') }}</li>
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
                <div class="col-md-9 nopadding-right">
                    <form accept="{{ route('cart.update', 1) }}">
                        <table class="table table shopping-cart-item-table">
                            <thead>
                                <tr>
                                    <th>{{ trans('theme.image') }}</th>
                                    <th>{{ trans('theme.title') }}</th>
                                    <th>{{ trans('theme.attribute') }}</th>
                                    <th>{{ trans('theme.price') }}</th>
                                    <th>{{ trans('theme.quantity') }}</th>
                                    <th>{{ trans('theme.total') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="shopping-cart-item-img">
                                      <a href="product-page.html">
                                          <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                                      </a>
                                    </td>
                                    <td class="shopping-cart-item-title">
                                      <a href="product-page.html">Gucci Patent Leather Open Toe Platform</a>
                                    </td>
                                    <td>Green</td>
                                    <td>$499</td>
                                    <td>
                                      <div class="product-info-qty-item">
                                          <button class="product-info-qty product-info-qty-minus">-</button>
                                          <input class="product-info-qty product-info-qty-input" type="text" value="1">
                                          <button class="product-info-qty product-info-qty-plus">+</button>
                                      </div>
                                    </td>
                                    <td>$499</td>
                                    <td>
                                      <a class="cart-item-remove" href="#" data-toggle="tooltip" title="Remove Item">&times;</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shopping-cart-item-img">
                                      <a href="product-page.html">
                                          <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                                      </a>
                                    </td>
                                    <td class="shopping-cart-item-title">
                                      <a href="product-page.html">Gucci Patent Leather Open Toe Platform</a>
                                    </td>
                                    <td>Green</td>
                                    <td>$499</td>
                                    <td>
                                      <div class="product-info-qty-item">
                                          <button class="product-info-qty product-info-qty-minus">-</button>
                                          <input class="product-info-qty product-info-qty-input" type="text" value="1">
                                          <button class="product-info-qty product-info-qty-plus">+</button>
                                      </div>
                                    </td>
                                    <td>$499</td>
                                    <td>
                                      <a class="cart-item-remove" href="#" data-toggle="tooltip" title="Remove Item">&times;</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shopping-cart-item-img">
                                      <a href="product-page.html">
                                          <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                                      </a>
                                    </td>
                                    <td class="shopping-cart-item-title">
                                      <a href="product-page.html">Gucci Patent Leather Open Toe Platform</a>
                                    </td>
                                    <td>Green</td>
                                    <td>$499</td>
                                    <td>
                                      <div class="product-info-qty-item">
                                          <button class="product-info-qty product-info-qty-minus">-</button>
                                          <input class="product-info-qty product-info-qty-input" type="text" value="1">
                                          <button class="product-info-qty product-info-qty-plus">+</button>
                                      </div>
                                    </td>
                                    <td>$499</td>
                                    <td>
                                      <a class="cart-item-remove" href="#" data-toggle="tooltip" title="Remove Item">&times;</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shopping-cart-item-img">
                                      <a href="product-page.html">
                                          <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                                      </a>
                                    </td>
                                    <td class="shopping-cart-item-title">
                                      <a href="product-page.html">Gucci Patent Leather Open Toe Platform</a>
                                    </td>
                                    <td>Green</td>
                                    <td>$499</td>
                                    <td>
                                      <div class="product-info-qty-item">
                                          <button class="product-info-qty product-info-qty-minus">-</button>
                                          <input class="product-info-qty product-info-qty-input" type="text" value="1">
                                          <button class="product-info-qty product-info-qty-plus">+</button>
                                      </div>
                                    </td>
                                    <td>$499</td>
                                    <td>
                                      <a class="cart-item-remove" href="#" data-toggle="tooltip" title="Remove Item">&times;</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-black btn-lg flat pull-right" type="submit">{{ trans('theme.button.update_cart')}}</button>
                    </form>
                    <a class="btn btn-black btn-lg flat" href="{{ url('/') }}">{{ trans('theme.button.continue_shopping') }}</a>
                </div>

                <div class="col-md-3">
                    <div class="side-widget">
                        <h3><span>{{ trans('theme.cart_summary') }}</span></h3>
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
                    </div>
                    {!! Form::open(['route' => 'checkout']) !!}
                      <button class="btn btn-primary btn-block btn-lg flat" type="submit"><i class="fa fa-shopping-cart"></i> {{ trans('theme.button.proceed_to_checkout') }}</button>
                    {!! Form::close() !!}
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <div class="space30"></div>

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')
@endsection