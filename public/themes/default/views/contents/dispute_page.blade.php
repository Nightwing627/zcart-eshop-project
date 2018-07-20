<!-- CONTENT SECTION -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-4 bg-light">
        <p class="section-title lead space20">@lang('theme.section_headings.how_to_open_a_dispute')</p>
        <dl>
          <dt>@lang('theme.help.first_step'):</dt>
          <dd>@lang('theme.help.how_to_open_a_dispute_first_step')</dd>
          <br/>
          <dt>@lang('theme.help.second_step'):</dt>
          <dd>@lang('theme.help.how_to_open_a_dispute_second_step')</dd>
          <br/>
          <dt>@lang('theme.help.third_step'):</dt>
          <dd>@lang('theme.help.how_to_open_a_dispute_third_step')</dd>
        </dl>
      </div><!-- /.col-md-4 .bg-light -->

      <div class="col-md-8">
        <div class="step-wizard-wrapper">
          <div class="step-wizard">
              <div class="progress">
                <div class="progressbar empty"></div>
                <div id="prog" class="progressbar" style=""></div>
                {{-- <div id="prog" class="progressbar" style="width: 33.3333%;"></div> --}}
              </div>
              <ul>
                <li class="active">
                  <a href="#" id="step1">
                    <span class="step">1</span>
                    <span class="title">@lang('theme.open_a_dispute')</span>
                  </a>
                </li>
                {{-- <li class="done"> --}}
                <li class="">
                  <a href="#" id="step2">
                    <span class="step">2</span>
                    <span class="title">@lang('theme.seller_helps_you')</span>
                  </a>
                </li>
                <li class="">
                  <a href="#" id="step3">
                      <span class="step">3</span>
                      <span class="title">@lang('theme.marketplace_steps_in', ['marketplace' => get_platform_title()])<br/>
                          <i class="small hidden-xs">@lang('theme.help.when_marketplace_steps_in')</i>
                      </span>
                  </a>
                </li>
                <li class="">
                  <a href="#" id="step4">
                    <span class="step">4</span>
                    <span class="title">@lang('theme.dispute_finished')</span>
                  </a>
                </li>
              </ul>
          </div>
        </div><!-- /.step-wizard-wrapper -->

        <div class="space20"></div>

        <p class="text-center">
            <a href="{{ route('order.detail', $order) . '#message-section' }}" class="btn btn-primary flat">@lang('theme.button.contact_seller')</a>

            @if($order->dispute)
              <button class="btn btn-default flat" disabled="disabled">@lang('theme.button.open_dispute')</button>
            @else
              <a href="#" data-toggle="modal" data-target="#disputeOpenModal" class="btn btn-black flat">@lang('theme.button.open_dispute')</a>
            @endif
        </p>

        <div class="sep"></div>

        <p class="text-muted">
            <h5>@lang('theme.button.refund_request'):</h5>
            <span>@lang('theme.help.reason_to_refund_request')</span>
        </p>
        <p class="text-muted">
            <h5>@lang('theme.button.return_goods'):</h5>
            <span>@lang('theme.help.reason_to_return_goods')</span>
        </p>

        <div class="space50"></div>

        <table class="table" id="buyer-payment-detail-table">
          <thead>
              <tr>
                  <th colspan="6">@lang('theme.payment_detail')</th>
              </tr>
          </thead>
          <tbody>
              <tr class="buyer-payment-info-head">
                  <td colspan="2">@lang('theme.amount')</td>
                  <td colspan="2">@lang('theme.payment_method')</td>
                  <td colspan="2">@lang('theme.status')</td>
              </tr>

              <tr class="buyer-payment-info-body">
                  <td colspan="2">{{ get_formated_currency($order->grand_total) }}</td>
                  <td colspan="2">{{ $order->paymentMethod->name }}</td>
                  <td colspan="2">{!! $order->paymentStatusName() !!}</td>
              </tr>
          </tbody>
        </table>

        <table class="table" id="buyer-order-table" name="buyer-order-table">
          <tbody>
              <tr class="order-info-head">
                  <td width="55%">
                    <h5><span>@lang('theme.order_id'): </span>{{ $order->order_number }}</h5>
                    <h5><span>@lang('theme.order_time_date'): </span>{{ $order->created_at->toDayDateTimeString() }}</h5>
                  </td>
                  <td width="25%" class="store-info">
                    <h5>
                      <span>@lang('theme.store'):</span>
                      @if($order->shop)
                        <a href="{{ route('show.store', $order->shop->slug) }}"> {{ $order->shop->name }}</a>
                      @else
                        @land('theme.shop_not_available')
                      @endif
                    </h5>
                    <h5>
                      <span>@lang('theme.status')</span>
                      {{ optional($order->status)->name }}
                    </h5>
                  </td>
                  <td width="20%" class="order-amount">
                      <h5><span>@lang('theme.order_amount'): </span>{{ get_formated_currency($order->grand_total) }}</h5>
                  </td>
              </tr> <!-- /.order-info-head -->
              <tr class="buyer-payment-info-head">
                  <td>@lang('theme.shipping_address'):</td>
                  <td colspan="2">@lang('theme.billing_address'):</td>
              </tr>
              <tr>
                  <td>{!! $order->shipping_address !!}</td>
                  <td colspan="2">{!! $order->billing_address !!}</td>
              </tr>
              @if($order->message_to_customer)
                <tr class="message_from_seller">
                  <td colspan="3">
                    <p>
                      <strong>@lang('theme.message_from_seller'): </strong> {{ $order->message_to_customer }}
                    </p>
                  </td>
                </tr>
              @endif
              @if($order->buyer_note)
                <tr class="order-info-footer">
                  <td colspan="3">
                    <p class="order-detail-buyer-note">
                      <strong>@lang('theme.note'): </strong> {{ $order->buyer_note }}
                    </p>
                  </td>
                </tr>
              @endif
          </tbody>
        </table>
      </div><!-- /.col-md-8 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>
<!-- END CONTENT SECTION -->

<div class="space20"></div>