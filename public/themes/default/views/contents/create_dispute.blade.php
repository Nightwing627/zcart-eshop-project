<!-- CONTENT SECTION -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 bg-light">
                <p class="section-title"> How to Open Dispute </p>
                <div class="space20"></div>
                <dl>
                    <dt>First Step:</dt>
                    <dd>
                        <a href="{{ route('order.detail', $order) . '#message-section' }}">Contact the seller</a> to discuss about the issue. Most of the case seller will help to solve the issue.
                    </dd>
                    <br/>
                    <dt>Second Step:</dt>
                    <dd>
                        You can choose between two options: <br/>
                        Refund Only – this means that either you did not receive the item and you’re applying for a full refund or you did receive the item and you want a partial refund (without having to send the item back), or <br/>
                        Open a Dispute – this means that you want to return the item and apply for a full refund.
                    </dd>
                    <br/>
                    <dt>Third Step:</dt>
                    <dd>
                        If you and seller can’t come to an agreement, you can appeal the dispute to review. This point we will step in and help.
                    </dd>
                </dl>
            </div>

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
                  @if($order->refunds->count())
                    <button class="btn btn-default flat" disabled="disabled">@lang('theme.button.refund_request')</button>
                  @else
                    <a href="#" data-toggle="modal" data-target="#refundFormModal" class="btn btn-primary flat">@lang('theme.button.refund_request')</a>
                  @endif

                  @if($order->dispute)
                    <button class="btn btn-default flat" disabled="disabled">@lang('theme.button.open_dispute')</button>
                  @else
                    <a href="#" data-toggle="modal" data-target="#disputeOpenModal" class="btn btn-black flat">@lang('theme.button.open_dispute')</a>
                  @endif
                </p>

                <div class="sep"></div>

                <p class="text-muted">
                    <h5>@lang('theme.button.refund_request'):</h5>
                    <span>
                        - I haven't received my order and I would like to get my money back OR
                        <br/>
                        - The product is not as described and I would like a partial refund.
                        <br/>
                    </span>
                </p>
                <p class="text-muted">
                    <h5>@lang('theme.button.open_dispute'):</h5>
                    <span>
                        - I am not satisfied with the product I received and would like to return it for a full refund. <small>(You may have to pay the return shipping cost)</small>
                    </span>
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
            </div>
        </div>
    </div>
</section>
<!-- END CONTENT SECTION -->

<div class="space20"></div>