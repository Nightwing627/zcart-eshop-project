<div class="modal-dialog modal-md">
    <div class="modal-content">
    	{!! Form::open(['route' => 'admin.support.refund.initiate', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']) !!}
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	{{ trans('app.form.form') }}
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8 nopadding-right">
                    <div class="form-group">
                        {!! Form::label('order_id', trans('app.form.select_refund_order').'*', ['class' => 'with-help']) !!}
                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.refund_select_order') }}"></i>
                        {!! Form::select('order_id', $orders , 1, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-4 nopadding-left">
                    <div class="form-group">
                      {!! Form::label('status', trans('app.form.status').'*', ['class' => 'with-help']) !!}
                      {!! Form::select('status', $statuses , 1, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('amount', trans('app.form.refund_amount') . '*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        {{ config('system_settings.currency_symbol') ?: '$' }}
                    </span>
                    {!! Form::number('amount' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.refund_amount'), 'required']) !!}
                </div>
                <div class="help-block with-errors"></div>
            </div>

            <div class="row">
              <div class="col-md-6 nopadding-right">
                <div class="form-group">
                  <div class="input-group">
                    {{ Form::hidden('return_goods', 0) }}
                    {!! Form::checkbox('return_goods', null, null, ['class' => 'icheckbox_line']) !!}
                    {!! Form::label('return_goods', trans('app.form.return_goods')) !!}
                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.refund_return_goods') }}"></i>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-6 nopadding-left">
                <div class="form-group">
                  <div class="input-group">
                    {{ Form::hidden('order_received', 0) }}
                    {!! Form::checkbox('order_received', null, null, ['class' => 'icheckbox_line']) !!}
                    {!! Form::label('order_received', trans('app.form.order_received')) !!}
                    <span class="input-group-addon" id="">
                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.refund_order_received') }}"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('description', trans('app.form.description')) !!}
              {!! Form::textarea('description', null, ['class' => 'form-control summernote-without-toolbar', 'placeholder' => trans('app.placeholder.description')]) !!}
              <div class="help-block with-errors"></div>
            </div>

            <p class="help-block">* {{ trans('app.form.required_fields') }}</p>
        </div>
        <div class="modal-footer">
            {!! Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-new']) !!}
        </div>
        {!! Form::close() !!}
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->

