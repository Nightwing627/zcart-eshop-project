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
        @if(Gate::allows('index', App\Category::class) || Gate::allows('index', App\Attribute::class) || Gate::allows('index', App\Product::class) || Gate::allows('index', App\Manufacturer::class) || Gate::allows('index', App\CategoryGroup::class) || Gate::allows('index', App\CategorySubGroup::class))
          <li class="treeview {{ Request::is('admin/catalog*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-tags"></i>
              <span>{{ trans('nav.catalog') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @if(Gate::allows('index', App\Category::class) || Gate::allows('index', App\CategoryGroup::class) || Gate::allows('index', App\CategorySubGroup::class))
                <li class="{{ Request::is('admin/catalog/category*') ? 'active' : '' }} ">
                  <a href="#">
                    <i class="fa fa-angle-double-right"></i>
                    {{ trans('nav.categories') }}
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    @can('index', App\CategoryGroup::class)
                      <li class="{{ Request::is('admin/catalog/categoryGroup*') ? 'active' : '' }} "><a href="{{ route('admin.catalog.categoryGroup.index') }}"><i class="fa fa-angle-right"></i>{{ trans('nav.groups') }}</a></li>
                    @endcan

                    @can('index', App\CategorySubGroup::class)
                      <li class="{{ Request::is('admin/catalog/categorySubGroup*') ? 'active' : '' }} "><a href="{{ route('admin.catalog.categorySubGroup.index') }}"><i class="fa fa-angle-right"></i>{{ trans('nav.sub-groups') }}</a></li>
                    @endcan

                    @can('index', App\Category::class)
                      <li class="{{ Request::is('admin/catalog/category') ? 'active' : '' }} "><a href="{{ url('admin/catalog/category') }}"><i class="fa fa-angle-right"></i>{{ trans('nav.categories') }}</a></li>
                    @endcan
                  </ul>
                </li>
              @endif

              @can('index', App\Attribute::class)
                <li class=" {{ Request::is('admin/catalog/attribute*') ? 'active' : '' }} "><a href="{{ url('admin/catalog/attribute') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.attributes') }}</a></li>
              @endcan

              @can('index', App\Product::class)
                <li class=" {{ Request::is('admin/catalog/product*') ? 'active' : '' }} "><a href="{{ url('admin/catalog/product') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.products') }}</a></li>
              @endcan

              @can('index', App\Manufacturer::class)
                <li class=" {{ Request::is('admin/catalog/manufacturer*') ? 'active' : '' }} "><a href="{{ url('admin/catalog/manufacturer') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.manufacturers') }}</a></li>
              @endcan
            </ul>
          </li>
        @endif

        @if(Gate::allows('index', App\Inventory::class) || Gate::allows('index', App\Warehouse::class) || Gate::allows('index', App\Supplier::class))
          <li class="treeview {{ Request::is('admin/stock*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-cubes"></i>
              <span>{{ trans('nav.stock') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @can('index', App\Inventory::class)
                <li class=" {{ Request::is('admin/stock/inventory*') ? 'active' : '' }} "><a href="{{ url('admin/stock/inventory') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.inventories') }}</a></li>
              @endcan

              @can('index', App\Warehouse::class)
                <li class=" {{ Request::is('admin/stock/warehouse*') ? 'active' : '' }} "><a href="{{ url('admin/stock/warehouse') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.warehouses') }}</a></li>
              @endcan

              @can('index', App\Supplier::class)
                <li class=" {{ Request::is('admin/stock/supplier*') ? 'active' : '' }} "><a href="{{ url('admin/stock/supplier') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.suppliers') }}</a></li>
              @endcan
            </ul>
          </li>
        @endif

        @if(Gate::allows('index', App\Order::class) || Gate::allows('index', App\Cart::class))
          <li class="treeview {{ Request::is('admin/order*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-cart-plus"></i>
              <span>{{ trans('nav.orders') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @can('index', App\Order::class)
                <li class=" {{ Request::is('admin/order/order*') ? 'active' : '' }} "><a href="{{ url('admin/order/order') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.orders') }}</a></li>
              @endcan

              @can('index', App\Cart::class)
                <li class=" {{ Request::is('admin/order/cart*') ? 'active' : '' }} "><a href="{{ url('admin/order/cart') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.carts') }}</a></li>
              @endcan

              {{-- @can('index', App\Payment::class) --}}
                {{-- <li class=" {{ Request::is('admin/order/payment*') ? 'active' : '' }} "><a href="{{ url('admin/order/payments') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.payments') }}</a></li> --}}
              {{-- @endcan --}}
            </ul>
          </li>
        @endif

        @if(Gate::allows('index', App\User::class) || Gate::allows('index', App\Customer::class))
          <li class="treeview {{ Request::is('admin/admin*') || Request::is('address/addresses/customer*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-user-secret"></i>
              <span>{{ trans('nav.admin') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @can('index', App\User::class)
                <li class=" {{ Request::is('admin/admin/user*') ? 'active' : '' }} "><a href="{{ url('admin/admin/user') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.users') }}</a></li>
              @endcan

              @can('index', App\Customer::class)
                <li class=" {{ Request::is('admin/admin/customer*') || Request::is('address/addresses/customer*') ? 'active' : '' }} "><a href="{{ url('admin/admin/customer') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.customers') }}</a></li>
              @endcan
            </ul>
          </li>
        @endif

        @if(Gate::allows('index', App\Shop::class))
          <li class="treeview {{ Request::is('admin/merchant*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-map-marker"></i>
              <span>{{ trans('nav.merchants') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @can('index', App\Shop::class)
                <li class=" {{ Request::is('admin/merchant/shop*') ? 'active' : '' }} "><a href="{{ url('admin/merchant/shop') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.shops') }}</a></li>
              @endcan
            </ul>
          </li>
        @endif

        @if(Gate::allows('index', App\Carrier::class) || Gate::allows('index', App\Packaging::class))
          <li class="treeview {{ Request::is('admin/shipping*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-truck"></i>
              <span>{{ trans('nav.shipping') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @can('index', App\Carrier::class)
                <li class=" {{ Request::is('admin/shipping/carrier*') ? 'active' : '' }} "><a href="{{ url('admin/shipping/carrier') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.carriers') }}</a></li>
              @endcan

              @can('index', App\Packaging::class)
                <li class=" {{ Request::is('admin/shipping/packaging*') ? 'active' : '' }} "><a href="{{ url('admin/shipping/packaging') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.packaging') }}</a></li>
              @endcan
            </ul>
          </li>
        @endif

        @if(Gate::allows('index', App\Coupon::class) || Gate::allows('index', App\GiftCard::class))
          <li class="treeview {{ Request::is('admin/promotion*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-paper-plane"></i>
              <span>{{ trans('nav.promotions') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @can('index', App\Coupon::class)
                <li class=" {{ Request::is('admin/promotion/coupon*') ? 'active' : '' }} "><a href="{{ url('admin/promotion/coupon') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.coupons') }}</a></li>
              @endcan
              @can('index', App\GiftCard::class)
                <li class=" {{ Request::is('admin/promotion/giftCard*') ? 'active' : '' }} "><a href="{{ url('admin/promotion/giftCard') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.gift_cards') }}</a></li>
              @endcan
            </ul>
          </li>
        @endif

        @if(Gate::allows('index', App\OrderStatus::class) || Gate::allows('index', App\PaymentStatus::class))
          <li class="treeview {{ Request::is('admin/utility*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-asterisk"></i>
              <span>{{ trans('nav.utilities') }}</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              @can('index', App\OrderStatus::class)
                <li class=" {{ Request::is('admin/utility/orderStatus*') ? 'active' : '' }} "><a href="{{ url('admin/utility/orderStatus') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.order_statuses') }}</a></li>
              @endcan

              @can('index', App\PaymentStatus::class)
                <li class=" {{ Request::is('admin/utility/paymentStatus*') ? 'active' : '' }} "><a href="{{ url('admin/utility/paymentStatus') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.payment_statuses') }}</a></li>
              @endcan
            </ul>
          </li>
        @endif

        @can('index', App\Blog::class)
          <li class=" {{ Request::is('admin/blog*') ? 'active' : '' }}">
            <a href="{{ url('admin/blog') }}">
              <i class="fa fa-rss"></i> <span>{{ trans('nav.blogs') }}</span>
            </a>
          </li>
        @endcan

        <li class="treeview {{ Request::is('admin/setting*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>{{ trans('nav.settings') }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @can('index', App\Role::class)
              <li class=" {{ Request::is('admin/setting/role*') ? 'active' : '' }} "><a href="{{ url('admin/setting/role') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.user_roles') }}</a></li>
            @endcan

            @can('index', App\Tax::class)
              <li class=" {{ Request::is('admin/setting/tax*') ? 'active' : '' }} "><a href="{{ url('admin/setting/tax') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.taxes') }}</a></li>
            @endcan

            @can('index', App\PaymentMethod::class)
              <li class=" {{ Request::is('admin/setting/paymentMethod*') ? 'active' : '' }} "><a href="{{ url('admin/setting/paymentMethod') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.payment_methods') }}</a></li>
            @endcan

            @can('index', App\EmailTemplate::class)
              <li class=" {{ Request::is('admin/setting/emailTemplate*') ? 'active' : '' }} "><a href="{{ url('admin/setting/emailTemplate') }}"><i class="fa fa-angle-double-right"></i> {{ trans('nav.email_templates') }}</a></li>
            @endcan

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
