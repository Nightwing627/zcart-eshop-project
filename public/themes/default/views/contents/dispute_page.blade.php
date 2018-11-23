<!-- CONTENT SECTION -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-4 bg-light">
        <p class="section-title lead space20">{!! trans('theme.section_headings.how_to_open_a_dispute') !!}</p>
        <dl>
          <dt>{!! trans('theme.help.first_step') !!}:</dt>
          <dd>{!! trans('theme.help.how_to_open_a_dispute_first_step') !!}</dd>
          <br/>
          <dt>{!! trans('theme.help.second_step') !!}:</dt>
          <dd>{!! trans('theme.help.how_to_open_a_dispute_second_step') !!}</dd>
          <br/>
          <dt>{!! trans('theme.help.third_step') !!}:</dt>
          <dd>{!! trans('theme.help.how_to_open_a_dispute_third_step') !!}</dd>
        </dl>
      </div><!-- /.col-md-4 .bg-light -->

      <div class="col-md-8">
        @php
          $progress = 0;

          if($order->dispute){
            $dispute_status = $order->dispute->status;
            $apealed = \App\Dispute::STATUS_APPEALED;

            if($dispute_status == \App\Dispute::STATUS_NEW)
                $progress = 0;
            else if($dispute_status < $apealed)
                $progress = 33.3333;
            else if($dispute_status == $apealed)
                $progress = 66.6666;
            else if($dispute_status > $apealed)
                $progress = 100;
          }
        @endphp
        <div class="step-wizard-wrapper">
          <div class="step-wizard">
              <div class="progress">
                <div class="progressbar empty"></div>
                <div id="prog" class="progressbar" style=""></div>
                <div id="prog" class="progressbar" style="width: {{$progress}}%;"></div>
              </div>
              <ul>
                <li class="{{ $progress > 33 ? 'done' : 'active' }}">
                  <a id="step1">
                    <span class="step">1</span>
                    <span class="title">{!! trans('theme.open_a_dispute') !!}</span>
                  </a>
                </li>
                <li class="
                  @if($progress > 66)
                    done
                  @elseif($progress > 33)
                    active
                  @endif
                ">
                  <a id="step2">
                    <span class="step">2</span>
                    <span class="title">{!! trans('theme.seller_helps_you') !!}</span>
                  </a>
                </li>
                <li class="
                  @if($progress == 100)
                    done
                  @elseif($progress > 66)
                    active
                  @endif
                ">
                  <a id="step3">
                      <span class="step">3</span>
                      <span class="title">{!! trans('theme.marketplace_steps_in', ['marketplace' => get_platform_title()]) !!}<br/>
                          <i class="small hidden-xs">{!! trans('theme.help.when_marketplace_steps_in') !!}</i>
                      </span>
                  </a>
                </li>
                <li class="{{ $progress == 100 ? 'done' : '' }}">
                  <a id="step4">
                    <span class="step">4</span>
                    <span class="title">{!! trans('theme.dispute_finished') !!}</span>
                  </a>
                </li>
              </ul>
          </div>
        </div><!-- /.step-wizard-wrapper -->

        <div class="space20"></div>

        @if($order->dispute)
          <table class="table" id="buyer-order-table">
              <thead>
                  <tr><th colspan="3">{!! trans('theme.dispute_detail') !!}</th></tr>
              </thead>
              <tbody>
                  <tr class="order-info-head">
                      <td width="50%">
                        <h5><span>{!! trans('theme.order_id') !!}: </span>{{ $order->order_number }}</h5>
                        <h5><span>{!! trans('theme.order_time_date') !!}: </span>{{ $order->created_at->toDayDateTimeString() }}</h5>
                      </td>
                      <td width="25%" class="store-info">
                        <h5>
                          <span>{!! trans('theme.store') !!}:</span>
                          @if($order->shop)
                            <a href="{{ route('show.store', $order->shop->slug) }}"> {{ $order->shop->name }}</a>
                          @else
                            {!! trans('theme.seller') !!}
                          @endif
                        </h5>
                        <h5>
                            <span>{!! trans('theme.status') !!}</span>
                            {{ optional($order->status)->name }}
                        </h5>
                      </td>
                      <td width="25%" class="order-amount">
                        <h5><span>{!! trans('theme.order_amount') !!}: </span>{{ get_formated_currency($order->grand_total) }}</h5>
                        <div class="btn-group" role="group">
                          <a class="btn btn-xs btn-default flat" href="{{ route('order.detail', $order) }}">{!! trans('theme.button.order_detail') !!}</a>
                          <a class="btn btn-xs btn-default flat" href="{{ route('order.detail', $order) . '#message-section' }}">{!! trans('theme.button.contact_seller') !!}</a>
                        </div>
                      </td>
                  </tr> <!-- /.order-info-head -->
                  @foreach($order->inventories as $item)
                    <tr class="order-body">
                      <td colspan="2">
                          <div class="product-img-wrap">
                            <img src="{{ get_storage_file_url(optional($item->image)->path, 'small') }}" alt="{{ $item->slug }}" title="{{ $item->slug }}" />
                          </div>
                          <div class="product-info">
                              {{-- <a href="{{ route('show.product', $item->slug) }}" class="product-info-title">{{ $item->pivot->item_description }}</a> --}}
                              <div class="order-info-amount">
                                  <span>{{ get_formated_currency($item->pivot->unit_price) }} x {{ $item->pivot->quantity }}</span>
                              </div>
                              {{--
                              <ul class="order-info-properties">
                                  <li>Size: <span>L</span></li>
                                  <li>Color: <span>RED</span></li>
                              </ul> --}}
                              @if($order->dispute->product_id == $item->product_id)
                                <span class="label label-danger">{!! trans('theme.disputed') !!}</span>
                              @endif
                          </div>
                      </td>
                      @if($loop->first)
                        <td rowspan="{{ $loop->count }}" class="order-actions text-center">
                          {!! $order->dispute->statusName() !!}
                        </td>
                      @endif
                    </tr> <!-- /.order-body -->
                  @endforeach

                  @if($order->message_to_customer)
                    <tr class="message_from_seller">
                      <td colspan="3">
                        <p>
                          <strong>{!! trans('theme.message_from_seller') !!}: </strong> {{ $order->message_to_customer }}
                        </p>
                      </td>
                    </tr>
                  @endif

                  @if($order->buyer_note)
                    <tr class="order-info-footer">
                      <td colspan="3">
                        <p class="order-detail-buyer-note">
                          <span>{!! trans('theme.note') !!}: </span> {{ $order->buyer_note }}
                        </p>
                      </td>
                    </tr>
                  @endif
              </tbody>
          </table>
        @else
          <p class="text-center">
              <a href="{{ route('order.detail', $order) . '#message-section' }}" class="btn btn-primary flat">{!! trans('theme.button.contact_seller') !!}</a>

              @unless($order->dispute)
                <a href="#" data-toggle="modal" data-target="#disputeOpenModal" class="btn btn-black flat">{!! trans('theme.button.open_dispute') !!}</a>
              @endunless
          </p>
          <div class="sep"></div>
          <p class="text-muted">
              <h5>{!! trans('theme.button.refund_request') !!}:</h5>
              <span>{!! trans('theme.help.reason_to_refund_request') !!}</span>
          </p>
          <p class="text-muted">
              <h5>{!! trans('theme.button.return_goods') !!}:</h5>
              <span>{!! trans('theme.help.reason_to_return_goods') !!}</span>
          </p>
        @endif
      </div><!-- /.col-md-8 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>
<div class="clearfix space50"></div>
<!-- END CONTENT SECTION -->

<div class="space20"></div>