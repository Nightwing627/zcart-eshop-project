<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
      <ul class="sidebar-menu">
        <li class=" {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>{{ trans('nav.dashboard') }}</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('admin/catalog*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>{{ trans('nav.catalog') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/catalog/category*') ? 'active' : '' }} ">
              <a href="#">
                <i class="fa fa-angle-double-right"></i>
                {{ trans('nav.categories') }}
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('admin/catalog/categoryGroup*') ? 'active' : '' }} "><a href="{{ route('admin.catalog.categoryGroup.index') }}"><i class="fa fa-angle-right"></i>{{ trans('nav.groups') }}</a></li>
                <li class="{{ Request::is('admin/catalog/categorySubGroup*') ? 'active' : '' }} "><a href="{{ route('admin.catalog.categorySubGroup.index') }}"><i class="fa fa-angle-right"></i>{{ trans('nav.sub-groups') }}</a></li>
                <li class="{{ Request::is('admin/catalog/category') ? 'active' : '' }} "><a href="{{ url('admin/catalog/category') }}"><i class="fa fa-angle-right"></i>{{ trans('nav.categories') }}</a></li>
              </ul>
            </li>

            <li class=" {{ Request::is('admin/catalog/attribute*') ? 'active' : '' }} "><a href="{{ url('admin/catalog/attribute') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.attributes') }}</a></li>

            <li class=" {{ Request::is('admin/catalog/product*') ? 'active' : '' }} "><a href="{{ url('admin/catalog/product') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.products') }}</a></li>

            <li class=" {{ Request::is('admin/catalog/manufacturer*') ? 'active' : '' }} "><a href="{{ url('admin/catalog/manufacturer') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.manufacturers') }}</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/stock*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>{{ trans('nav.stock') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class=" {{ Request::is('admin/stock/inventory*') ? 'active' : '' }} "><a href="{{ url('admin/stock/inventory') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.inventories') }}</a></li>
            <li class=" {{ Request::is('admin/stock/warehouse*') ? 'active' : '' }} "><a href="{{ url('admin/stock/warehouse') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.warehouses') }}</a></li>
            <li class=" {{ Request::is('admin/stock/supplier*') ? 'active' : '' }} "><a href="{{ url('admin/stock/supplier') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.suppliers') }}</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/order*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-cart-plus"></i>
            <span>{{ trans('nav.orders') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class=" {{ Request::is('admin/order/order*') ? 'active' : '' }} "><a href="{{ url('admin/order/order') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.orders') }}</a></li>
            <li class=" {{ Request::is('admin/order/cart*') ? 'active' : '' }} "><a href="{{ url('admin/order/cart') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.carts') }}</a></li>
            {{-- <li class=" {{ Request::is('admin/order/payment*') ? 'active' : '' }} "><a href="{{ url('admin/order/payments') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.payments') }}</a></li> --}}
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/admin*') || Request::is('address/addresses/customer*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>{{ trans('nav.admin') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class=" {{ Request::is('admin/admin/user*') ? 'active' : '' }} "><a href="{{ url('admin/admin/user') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.users') }}</a></li>
            <li class=" {{ Request::is('admin/admin/customer*') || Request::is('address/addresses/customer*') ? 'active' : '' }} "><a href="{{ url('admin/admin/customer') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.customers') }}</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/merchant*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>{{ trans('nav.merchants') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class=" {{ Request::is('admin/merchant/shop*') ? 'active' : '' }} "><a href="{{ url('admin/merchant/shop') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.shops') }}</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/shipping*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>{{ trans('nav.shipping') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">

            <li class=" {{ Request::is('admin/shipping/carrier*') ? 'active' : '' }} "><a href="{{ url('admin/shipping/carrier') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.carriers') }}</a></li>

            <li class=" {{ Request::is('admin/shipping/packaging*') ? 'active' : '' }} "><a href="{{ url('admin/shipping/packaging') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.packaging') }}</a></li>

          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/utility*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-asterisk"></i>
            <span>{{ trans('nav.utilities') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class=" {{ Request::is('admin/utility/tax*') ? 'active' : '' }} "><a href="{{ url('admin/utility/tax') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.taxes') }}</a></li>

            <li class=" {{ Request::is('admin/utility/role*') ? 'active' : '' }} "><a href="{{ url('admin/utility/role') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.user_roles') }}</a></li>

            <li class=" {{ Request::is('admin/utility/orderStatus*') ? 'active' : '' }} "><a href="{{ url('admin/utility/orderStatus') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.order_statuses') }}</a></li>

            <li class=" {{ Request::is('admin/utility/paymentMethod*') ? 'active' : '' }} "><a href="{{ url('admin/utility/paymentMethod') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.payment_methods') }}</a></li>

            <li class=" {{ Request::is('admin/utility/paymentStatus*') ? 'active' : '' }} "><a href="{{ url('admin/utility/paymentStatus') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.payment_statuses') }}</a></li>

            <li class=" {{ Request::is('admin/utility/emailTemplate*') ? 'active' : '' }} "><a href="{{ url('admin/utility/emailTemplate') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.email_templates') }}</a></li>

          </ul>
        </li>
        <li class="treeview {{ Request::is('admin/promotion*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-paper-plane"></i>
            <span>{{ trans('nav.promotions') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">

            <li class=" {{ Request::is('admin/promotion/coupon*') ? 'active' : '' }} "><a href="{{ url('admin/promotion/coupon') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.coupons') }}</a></li>

            <li class=" {{ Request::is('admin/promotion/giftCard*') ? 'active' : '' }} "><a href="{{ url('admin/promotion/giftCard') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.gift_cards') }}</a></li>

          </ul>
        </li>
        <li class=" {{ Request::is('admin/blog*') ? 'active' : '' }}">
          <a href="{{ url('admin/blog') }}">
            <i class="fa fa-rss"></i> <span>{{ trans('nav.blogs') }}</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('admin/settings*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>{{ trans('nav.settings') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/settings/profile') }}"> Profile</a></li>

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/user') }}"> System settings</a></li>

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/user') }}"> Checkout</a></li>

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/user') }}"> Configurations</a></li>

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/user') }}"> Notifications</a></li>

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/user') }}"> Email settings</a></li>

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/user') }}"> Backup</a></li>

            <li class=" {{ Request::is('settings*') ? 'active' : '' }} "><a href="{{ url('admin/user') }}"> Account</a></li>

          </ul>
        </li>
        <li class="treeview {{ Request::is('reports*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-map"></i>
            <span>{{ trans('nav.reports') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class=" {{ Request::is('admin/report/sales*') ? 'active' : '' }} "><a href="{{ url('admin/report/sales') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.sales_report') }}</a></li>
          </ul>
        </li>

        <!--
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        -->
      </ul>
  </section>
  <!-- /.sidebar -->
</aside>
