<table class="table" id="buyer-order-table">
    <thead>
        <tr>
            <th width="60%">@lang('theme.products')</th>
            <th width="30%">@lang('theme.status')</th>
            <th width="10%">@lang('theme.actions')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
          <tr class="order-info-head">
              <td>
                <h5><span>@lang('theme.order_id'): </span>{{ $order->order_number }}</h5>
                <h5><span>@lang('theme.order_time_date'): </span>{{ $order->created_at->toDayDateTimeString() }}</h5>
              </td>
              <td class="store-info">
                <h5><span>@lang('theme.store'):</span> <a href="shope-page.html"> {{ $order->shop->name }}</a></h5>
                <a href="#">
                    @lang('theme.contact_seller') <span>(<strong>1</strong> unread)</span>
                </a>
              </td>
              <td class="order-amount">
                <h5><span>@lang('theme.order_amount'): </span>{{ get_formated_currency($order->grand_total) }}</h5>
              </td>
          </tr> <!-- /.order-info-head -->

          @foreach($order->inventories as $item)
              <tr class="order-body">
                  <td class="">
                      <div class="product-img-wrap">
                        <img src="http://via.placeholder.com/100" alt="Image Alternative text" title="Image Title" />
                      </div>
                      <div class="product-info">
                          <a href="product-page.html" class="product-info-title">Apple iPhone 4S 16GB Factory Unlocked Black and White Smartphone</a>
                          <div class="order-info-amount">
                              <span>$2.84 x 1</span>
                          </div>
                          <ul class="order-info-properties">
                              <li>Size: <span>L</span></li>
                              <li>Color: <span>RED</span></li>
                          </ul>
                          <p class="order-detail-buyer-note">
                            <span>Note: </span>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.
                          </p>
                      </div>
                  </td>
                  <td class="order-status">
                    <p>{{ optional($order->status)->name }}</p>
                    <a target="_blank" href="#"> View Detail</a>
                  </td>
                  <td class="order-action">
                      <a class="btn btn-default btn-sm btn-block flat">Track Order</a>
                      <a class="btn btn-primary btn-block flat" href="#">Confirm Good Received</a>
                      <a class="btn btn-link btn-block" href="#">Open Dispute</a>
                  </td>
              </tr> <!-- /.order-body -->
          @endforeach
      @endforeach
    </tbody>
</table>

<div class="sep"></div>

<div class="row pagenav-wrapper">
    {{-- {{ $orders->links('layouts.pagination') }} --}}
</div><!-- /.row .pagenav-wrapper -->

<div class="clearfix space20"></div>