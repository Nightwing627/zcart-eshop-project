<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            {{ trans('app.response') }}
        </div>
        <div class="modal-body" style="padding: 0px;">
            <div class="col-md-3 nopadding-right" style="margin-top: 10px;">
                <div class="form-group">
                    <label>{{ trans('app.customer') }}</label>
                    <img src="{{ get_image_src($refund->order->customer_id, 'customers', 'medium') }}" class="thumbnail" width="100%" style="margin-bottom: 0px;" alt="{{ trans('app.avatar') }}">
                    <p class="lead">{{ $refund->order->customer->getName() }}</p>
                </div>
            </div>
            <div class="col-md-7 nopadding-left">
                <table class="table no-border">
                    <tr>
                        <th class="text-right">{{ trans('app.order_number') }}: </th>
                        <td style="width: 60%;">{{ get_formated_order_number($refund->order_id) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">{{ trans('app.refund_amount') }}: </th>
                        <td style="width: 60%;"><span class="label label-primary">{{ get_formated_currency($refund->amount) }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-right">{{ trans('app.order_amount') }}: </th>
                        <td style="width: 60%;"><span class="label label-outline">{{ get_formated_currency($refund->order->total) }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-right">{{ trans('app.payment_status') }}: </th>
                        <td style="width: 60%;">{{ $refund->order->paymentStatus->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">{{ trans('app.order_received') }}: </th>
                        <td style="width: 60%;">{{ get_yes_or_no($refund->order_received) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">{{ trans('app.return_goods') }}: </th>
                        <td style="width: 60%;">{{ get_yes_or_no($refund->return_goods) }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">{{ trans('app.order_date') }}:</th>
                        <td style="width: 60%;">{{ $refund->order->created_at->toDayDateTimeString() }}</td>
                    </tr>
                </table>
            </div>

            <div class="spacer30"></div>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active no-border"><a href="#tab_1" data-toggle="tab">
                    {{ trans('app.description') }}
                  </a></li>
                </ul>
                <div class="tab-content nopadding">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body">
                            {!! $refund->description or trans('app.description_not_available') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            @can('approve', $refund)
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                  <div class="btn-group" role="group">
                    <a href="{{ route('admin.support.refund.approve', $refund) }}" class="btn btn-lg btn-danger confirm ajax-silent">{{ trans('app.approve') }}</a>
                  </div>
                  <div class="btn-group" role="group">
                    <a href="{{ route('admin.support.refund.decline', $refund) }}" class="btn btn-lg btn-default confirm ajax-silent">{{ trans('app.decline') }}</a>
                  </div>
                </div>
            @endcan
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->