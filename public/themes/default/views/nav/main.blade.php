<?php
  //echo "<pre>"; print_r($categories_for_dropdown); echo "</pre>"; exit();
?>
<nav class="navbar navbar-default navbar-main navbar-light navbar-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="LOGO" title="LOGO" />
      </a>
    </div>
    <form class="navbar-left navbar-form navbar-search" role="search">
      <select name="search_in_category" class="search-category-select ">
        <option>{{ trans('theme.all_categories') }}</option>
        @foreach($search_category_list as $id => $category)
          <option value="{{ $id }}">{{ $category }}</option>
        @endforeach
      </select>
      <div class="form-group">
        <input name="search_for" class="form-control" type="text" placeholder="{{ trans('theme.main_searchbox_placeholder') }}" />
      </div>
      <a class="fa fa-search navbar-search-submit" href="#"></a>
    </form>
    <ul class="nav navbar-nav navbar-right navbar-mob-left">
      @auth('customer')
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <span>{{ trans('theme.hello') . ', ' . Auth::guard('customer')->user()->getName() }}</span> {{ trans('theme.manage_your_account') }}
          </a>
          <ul class="dropdown-menu nav-list">
            <li><a href="{{ route('account', 'dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> @lang('theme.nav.dashboard')</a></li>
            <li><a href="{{ route('account', 'orders') }}"><i class="fa fa-shopping-cart fa-fw"></i> @lang('theme.nav.my_orders')</a></li>
            <li><a href="{{ route('account', 'wishlist') }}"><i class="fa fa-heart-o fa-fw"></i> @lang('theme.nav.my_wishlist')</a></li>
            <li><a href="{{ route('account', 'disputes') }}"><i class="fa fa-rocket fa-fw"></i> @lang('theme.nav.refunds_disputes')</a></li>
            <li><a href="{{ route('account', 'coupons') }}"><i class="fa fa-tags fa-fw"></i> @lang('theme.nav.my_coupons')</a></li>
            <li><a href="{{ route('account', 'gift_cards') }}"><i class="fa fa-gift fa-fw"></i> @lang('theme.nav.gift_cards')</a></li>
            <li><a href="{{ route('account', 'account') }}"><i class="fa fa-user fa-fw"></i> @lang('theme.nav.my_account')</a></li>
            <li class="sep"></li>
            <li><a href="{{ route('customer.logout') }}"><i class="fa fa-power-off fa-fw"></i> {{ trans('theme.logout') }}</a></li>
          </ul>
        </li>
      @else
        <li><a href="#nav-login-dialog" data-toggle="modal" data-target="#loginModal"><span >{{ trans('theme.sing_in') }}</span>{{ trans('theme.your_account') }}</a></li>
      @endauth

      <li class="dropdown" id="smartcart">
        <a href="{{ route('cart.index') }}">
          <span >{{ trans('theme.your_cart') }}</span><i class="fa fa-shopping-bag"></i> <div class="sc-cart-count badge"></div>
        </a>
        <div class="dropdown-menu">
          <ul class="sc-cart-item-list nav-dropdown-cart">
            <li class="sc-cart-empty-msg">@lang('theme.empty_cart')</li>
          </ul>
          <div class="sc-toolbar">
            <div class="sc-cart-summary-subtotal nav-dropdown-cart-total">@lang('theme.total'):
              <span class="sc-cart-subtotal pull-right"></span>
            </div>
            <div class="space20"></div>
            <p>
              <button class="sc-cart-checkout btn flat btn-primary pull-right" type="button">{{ trans('theme.button.checkout') }}</button>
              <div class="btn-group">
                <a href="{{ route('cart.index') }}" class="btn nopadding-left btn-link"><i class="fa fa-external-link fa-fw" data-toggle="tooltip" title="{{ trans('theme.button.open') }}"></i></a>
                <button class="btn nopadding-left btn-link confirm sc-cart-clear"><i class="fa fa-trash fa-fw" data-toggle="tooltip" title="{{ trans('theme.button.clear') }}"></i></button>
              </div>
            </p>
            <div class="space20"></div>
          </div><!-- /.sc-toolbar -->

          {!! Form::open(['route' => 'checkout', 'id' => 'checkoutForm']) !!}
              {{-- Data will be appended automatically via js --}}
          {!! Form::close() !!}
        </div><!-- /.dropdown-manu -->
      </li><!-- /#smartcart -->

      <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">{{ trans('theme.nav.menu') }}</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
      </div>
    </ul>
  </div>
</nav>

<nav class="navbar-default navbar-main navbar-light navbar-main border-bottom">
  <div class="container">
    <div class="collapse navbar-collapse" id="main-nav-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>{{ trans('theme.shop_by') }}</span>{{ trans('theme.category') }}<i class="dropdown-caret"></i>
          </a>
          <ul class="dropdown-menu menu-category-dropdown" aria-labelledby="dLabel">
            @foreach($all_categories as $catGroup)
              <li><a href="#"><i class="fa {{ $catGroup->icon or 'fa-cube' }} fa-fw category-icon"></i>{{ $catGroup->name }}</a>
                <div class="category-section">
                  <div class="category-section-inner">
                    <div class="category-section-content">
                      <div class="row">
                        @foreach($catGroup->subGroups as $subGroup)
                          <div class="col-md-6">
                            <h5 class="nav-category-inner-title">{{ $subGroup->name }}</h5>
                            <ul class="nav-category-inner-list">
                              @foreach($subGroup->categories as $cat)
                                <li><a href="{{ route('category.browse', $cat->slug) }}">{{ $cat->name }}</a>
                                  @if($cat->description)
                                    <p>{{ $cat->description }}</p>
                                  @endif
                                </li>
                              @endforeach
                            </ul>
                          </div><!-- /.col-md-6 -->
                          @if($loop->iteration % 2 == 0)
                            <div class="clearfix"></div>
                          @endif
                        @endforeach
                      </div><!-- /.row -->
                    </div><!-- /.category-section-content -->
                    @if($catGroup->image && Storage::exists($catGroup->image->path))
                      <img class="nav-category-section-bg-img" src="{{ asset('storage/' . optional($catGroup->image)->path) }}" alt="{{ $catGroup->name }}" title="{{ $catGroup->name }}"/>
                    @endif
                  </div><!-- /.category-section-inner -->
                </div><!-- /.category-section -->
              </li>
            @endforeach
          </ul><!-- /.menu-category-dropdown -->
        </li>
        @foreach($hot_categories as $id => $hotcat)
          <li class="dropdown">
            <a class="navbar-item-mergin-top" href="#">{{ $hotcat }}</a>
          </li>
        @endforeach
        <li class="dropdown"><a class="navbar-item-mergin-top" href="#">{{ trans('theme.gift_cards') }}</a>
        </li>
        <li class="dropdown"><a class="navbar-item-mergin-top" href="{{ url('/selling') }}">{{ trans('theme.nav.sell_on', ['platform' => get_platform_title()]) }}</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('account', 'wishlist') }}" class="navbar-item-mergin-top"><i class="fa fa-heart-o hidden-xs"></i> {{ trans('theme.nav.wishlist') }}</a>
        </li>
        <li><a href="{{ route('support.contact_us') }}" class="navbar-item-mergin-top">{{ trans('theme.nav.support') }}</a>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <span>{{ trans('theme.nav.lang') }}</span><i class="fa fa-globe"></i> EN
          </a>
            <ul class="dropdown-menu">
                <li><a href="#">English</a></li>
                <li><a href="#">Frence</a></li>
                <li><a href="#">Español</a></li>
                <li><a href="#">Bengali</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>