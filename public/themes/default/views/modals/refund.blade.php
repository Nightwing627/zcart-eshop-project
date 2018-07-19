<div class="modal fade" id="refundFormModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
        <div class="modal-header">
            <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            <span class="modal-title">{{ trans('theme.button.refund_request') }}</span>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => ['refund.request', $order], 'data-toggle' => 'validator']) !!}
                <div class="form-group">
                    <label for="amount">@lang('theme.refund_amount'):<sup>*</sup></label>
                    <div class="input-group">
                        <span class="input-group-addon flat">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
                        {!! Form::number('amount' , null, ['id' => 'amount', 'class' => 'form-control flat', 'step' => 'any', 'max' => $order->grand_total, 'placeholder' => trans('theme.placeholder.refund_amount'), 'required']) !!}
                    </div>
                    <div class="help-block with-errors">
                        @php
                          $refunded_amt = $order->refundedSum();
                        @endphp

                        @if($refunded_amt > 0)
                          <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4><i class="fa fa-warning"></i> {{ trans('app.alert') }}!</h4>
                            {!! trans('theme.help.order_refunded', ['amount' => get_formated_currency($refunded_amt), 'total' => get_formated_currency($order->grand_total)]) !!}
                          </div>
                        @else
                          <small>{!! trans('theme.help.customer_paid', ['amount' => get_formated_currency($order->grand_total)]) !!}</small>
                        @endif
                    </div>
                </div>

                <div class="row space10">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="goods_received">@lang('theme.goods_received')?<sup>*</sup></label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-xs-3">
                            <label>
                              <input name="goods_received" value="1" class="i-radio-blue" type="radio" required="required"/> {{ trans('theme.yes') }}
                            </label>
                        </div>
                        <div class="col-xs-3">
                            <label>
                              <input name="goods_received" value="0" class="i-radio-blue" type="radio" required="required"/> {{ trans('theme.no') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">@lang('theme.description'):<sup>*</sup></label>
                    {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control flat', 'rows' => 3, 'placeholder' => trans('app.placeholder.description'), 'required']) !!}
                    <div class="help-block with-errors"></div>
                </div>

                <div class="row">
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label>
                              <input name="return_goods" value="1" class="i-check-blue" type="checkbox"/> {{ trans('theme.return_goods') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <input class="btn btn-block flat btn-primary" type="submit" value="{{ trans('theme.button.refund_request') }}">
                    </div>
                </div>
            {!! Form::close() !!}
            <small class="help-block text-muted">* {{ trans('theme.help.required_fields') }}</small>
        </div><!-- /.modal-body -->
        <div class="modal-footer"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /#refundFormModal -->