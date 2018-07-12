<div class="section-title">
    <h4>@lang('theme.manage_your_account')</h4>
</div>
<ul class="account-sidebar-nav">
    <li class="{{ $tab == 'dashboard' ? 'active' : '' }}">
    	<a href="{{ route('account', 'dashboard') }}"><i class="fa fa-dashboard"></i> @lang('theme.nav.dashboard')</a>
    </li>
    <li class="{{ $tab == 'orders' ? 'active' : '' }}">
    	<a href="{{ route('account', 'orders') }}"><i class="fa fa-shopping-cart"></i> @lang('theme.nav.my_orders')</a>
    </li>
    <li class="{{ $tab == 'wishlist' ? 'active' : '' }}">
    	<a href="{{ route('account', 'wishlist') }}"><i class="fa fa-heart-o"></i> @lang('theme.nav.my_wishlist')</a>
    </li>
    <li class="{{ $tab == 'disputes' ? 'active' : '' }}">
    	<a href="{{ route('account', 'disputes') }}"><i class="fa fa-rocket"></i> @lang('theme.nav.refunds_disputes')</a>
    </li>
    <li class="{{ $tab == 'feedbacks' ? 'active' : '' }}">
    	<a href="{{ route('account', 'feedbacks') }}"><i class="fa fa-comment-o"></i> @lang('theme.nav.manage_feedbacks')</a>
    </li>
    <li class="{{ $tab == 'coupons' ? 'active' : '' }}">
    	<a href="{{ route('account', 'coupons') }}"><i class="fa fa-tags"></i> @lang('theme.nav.my_coupons')</a>
    </li>
    <li class="{{ $tab == 'account' ? 'active' : '' }}">
    	<a href="{{ route('account', 'account') }}"><i class="fa fa-user"></i> @lang('theme.nav.my_account')</a>
    </li>
    <li class="{{ $tab == 'addresses' ? 'active' : '' }}">
    	<a href="{{ route('account', 'addresses') }}"><i class="fa fa-address-card-o"></i> @lang('theme.nav.addresses')</a>
    </li>
</ul>