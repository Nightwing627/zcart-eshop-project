<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      {!! Form::label('name', trans('app.form.name') . '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_name') }}"></i>
      {!! Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.name'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('active', trans('app.form.status') . '*', ['class' => 'with-help']) !!}
      {!! Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('code', trans('app.form.code') . '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_code') }}"></i>
      <div class="input-group code-field">
        {!! Form::text('code', null, ['class' => 'form-control code', 'placeholder' => trans('app.placeholder.code'), 'required']) !!}
        <span class="input-group-btn">
          <button id="coupon" class="btn btn-lg btn-default generate-code" type="button" ><i class="fa fa-rocket"></i> Generate</button>
        </span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('value', trans('app.form.coupon_value') . '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_value') }}"></i>
      <div class="input-group">
        {!! Form::number('value' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.coupon_value'), 'required']) !!}
        {!! Form::select('type', ['amount' => config('system_settings.currency_symbol') ?: '$', 'percent' => trans('app.percent')], null, ['class' => 'selectpicker', 'required']) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
      {!! Form::label('quantity', trans('app.form.coupon_quantity') . '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_quantity') }}"></i>
      {!! Form::number('quantity' , null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.quantity'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-4 nopadding">
    <div class="form-group">
      {!! Form::label('min_order_amount', trans('app.form.coupon_min_order_amount'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_min_order_amount') }}"></i>
      <div class="input-group">
        <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
        {!! Form::number('min_order_amount' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.coupon_min_order_amount')]) !!}
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>

  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('quantity_per_customer', trans('app.form.coupon_quantity_per_customer'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_quantity_per_customer') }}"></i>
      {!! Form::number('quantity_per_customer' , !isset($coupon) ? 1 : null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.coupon_quantity_per_customer')]) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  {!! Form::label('description', trans('app.form.description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]) !!}
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('exclude_tax_n_shipping', 0) }}
        {!! Form::checkbox('exclude_tax_n_shipping', null, !isset($coupon) ? 1 : null, ['id' => 'exclude_tax_n_shipping', 'class' => 'icheckbox_line']) !!}
        {!! Form::label('exclude_tax_n_shipping', trans('app.form.exclude_tax_n_shipping')) !!}
        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.exclude_tax_n_shipping') }}"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('exclude_offer_items', 0) }}
        {!! Form::checkbox('exclude_offer_items', null, !isset($coupon) ? 1 : null, ['class' => 'icheckbox_line']) !!}
        {!! Form::label('exclude_offer_items', trans('app.form.exclude_offer_items')) !!}
        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.exclude_offer_items') }}"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('partial_use', 0) }}
        {!! Form::checkbox('partial_use', null, null, ['id' => 'partial_use', 'class' => 'icheckbox_line']) !!}
        {!! Form::label('partial_use', trans('app.form.coupon_partial_use')) !!}
        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_partial_use') }}"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('limited', 0) }}
        {!! Form::checkbox('limited', null, null, ['id' => 'limited', 'class' => 'icheckbox_line']) !!}
        {!! Form::label('limited', trans('app.form.coupon_limited')) !!}
        <span class="input-group-addon" id="">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_limited') }}"></i>
        </span>
      </div>
    </div>
  </div>
</div>

<div id="customers_field" class="
  {{
    (
      isset($coupon) &&
      $coupon->limited
    )
    ? 'show' : 'hidden'
  }}">
  <div class="form-group">
    {!! Form::label('customer_list', trans('app.form.coupon_limited_to').'*', ['class' => 'with-help']) !!}
    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.coupon_limited_to') }}"></i>
    {!! Form::select('customer_list[]', $customers , null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']) !!}
    <div class="help-block with-errors"></div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('starting_time', trans('app.form.starting_time') . '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.starting_time') }}"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('starting_time', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.starting_time'), 'required']) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('ending_time', trans('app.form.ending_time') . '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.ending_time') }}"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('ending_time', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.ending_time'), 'required']) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>


<p class="help-block">* {{ trans('app.form.required_fields') }}</p>