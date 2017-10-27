<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      {!! Form::label('name', trans('app.form.shipping_carrier_name').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_carrier_name') }}"></i>
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.carrier_name'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']) !!}
      {!! Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('phone', trans('app.form.phone')) !!}
      {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.phone_number')]) !!}
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('email', trans('app.form.email_address')) !!}
      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email')]) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('std_delivery_time', trans('app.form.standard_delivery_time').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_standard_delivery_time') }}"></i>
      <div class="input-group">
        {!! Form::number('std_delivery_time', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.standard_delivery_time'), 'required']) !!}
        {!! Form::select('time_unit', ['Days' => trans_choice('app.days', 19), 'Hours' => trans_choice('app.hours',2)], null, ['class' => 'selectpicker', 'required']) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('tracking_url', trans('app.form.shipping_tracking_url'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_tracking_url') }}"></i>
      {!! Form::text('tracking_url', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shipping_tracking_url')]) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('is_free', 0) }}
        {!! Form::checkbox('is_free', null, null, ['id' => 'is_free', 'class' => 'icheckbox_line']) !!}
        {!! Form::label('is_free', trans('app.form.free_shipping')) !!}
        <span class="input-group-addon" >
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_is_free') }}"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('handling_cost', 0) }}
        {!! Form::checkbox('handling_cost', null, null, ['class' => 'icheckbox_line']) !!}
        {!! Form::label('handling_cost', trans('app.form.apply_handling_cost')) !!}
        <span class="input-group-addon" >
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_handling_cost') }}"></i>
        </span>
      </div>
    </div>
  </div>
</div>
<div id="flat_shipping_cost_field" class="row
  {{ (
      (isset($carrier)) &&
      ($carrier->is_free == 1)
    )
    ? 'hidden' : 'show'
  }}">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('flat_shipping_cost', trans('app.form.flat_shipping_cost').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.flat_shipping_cost') }}"></i>
      <div class="input-group">
        <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
        {!! Form::number('flat_shipping_cost', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.flat_shipping_cost')]) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('tax_id', trans('app.form.tax'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_tax') }}"></i>
      {!! Form::select('tax_id', $taxes, isset($carrier) ? $carrier->tax_id : config('shop_settings.default_tax_id_for_order'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3 nopadding-right">
    <div class="form-group">
      {!! Form::label('max_width', trans('app.form.shipping_max_width'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_max_width') }}"></i>
      <div class="input-group">
        {!! Form::number('max_width', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_max_width')]) !!}
        <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
      </div>
    </div>
  </div>
  <div class="col-md-3 sm-padding">
    <div class="form-group">
      {!! Form::label('max_height', trans('app.form.shipping_max_height'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_max_height') }}"></i>
      <div class="input-group">
        {!! Form::number('max_height', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_max_height')]) !!}
        <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
      </div>
    </div>
  </div>
  <div class="col-md-3 sm-padding">
    <div class="form-group">
      {!! Form::label('max_depth', trans('app.form.shipping_max_depth'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_max_depth') }}"></i>
      <div class="input-group">
        {!! Form::number('max_depth', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_max_depth')]) !!}
        <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
      </div>
    </div>
  </div>
  <div class="col-md-3 nopadding-left">
    <div class="form-group">
      {!! Form::label('max_weight', trans('app.form.shipping_max_weight'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_max_weight') }}"></i>
      <div class="input-group">
        {!! Form::number('max_weight', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_max_weight')]) !!}
        <span class="input-group-addon">{{ config('system_settings.weight_unit') ?: 'gm' }}</span>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
	<label for="exampleInputFile">{{ trans('app.form.logo') }}</label>
  @if(isset($carrier) && File::exists(image_path('carriers') . $carrier->id . '_150x150.png'))
  <label>
    <img src="{{ get_image_src($carrier->id, 'carriers', '150x150') }}" width="80px" alt="{{ trans('app.image') }}">
    <span style="margin-left: 10px;">
      {!! Form::checkbox('delete_image', 1, null, ['class' => 'icheck']) !!} {{ trans('app.form.delete_logo') }}
    </span>
  </label>
  @endif
	<div class="row">
    <div class="col-md-9 nopadding-right">
			<input id="uploadFile" placeholder="{{ trans('app.placeholder.logo') }}" class="form-control" disabled="disabled" style="height: 28px;" />
    </div>
    <div class="col-md-3 nopadding-left">
			<div class="fileUpload btn btn-primary btn-block btn-flat">
			    <span>{{ trans('app.form.upload') }}</span>
			    <input type="file" name="image" id="uploadBtn" class="upload" />
			</div>
    </div>
  </div>
</div>
<p class="help-block">* {{ trans('app.form.required_fields') }}</p>