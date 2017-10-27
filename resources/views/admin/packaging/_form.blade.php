<div class="form-group">
  {!! Form::label('name', trans('app.form.packaging_name').'*', ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.packaging_name') }}"></i>
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.packaging_name'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>

<div class="form-group">
  {!! Form::label('cost', trans('app.form.cost'), ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.packaging_cost') }}"></i>
  <div class="input-group">
    <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
    {!! Form::number('cost', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.packaging_cost')]) !!}
  </div>
</div>

<div class="form-group">
  <div class="input-group">
    {{ Form::hidden('charge_customer', 0) }}
    {!! Form::checkbox('charge_customer', null, null, ['id' => 'charge_customer', 'class' => 'icheckbox_line']) !!}
    {!! Form::label('charge_customer', trans('app.form.packaging_charge_customer')) !!}
    <span class="input-group-addon" id="basic-addon1">
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.packaging_charge_customer') }}"></i>
    </span>
  </div>
</div>

<div class="form-group">
	<label for="exampleInputFile">{{ trans('app.form.image') }}</label>
  @if(isset($packaging) && File::exists(image_path('packagings') . $packaging->id . '_150x150.png'))
  <label>
    <img src="{{ get_image_src($packaging->id, 'packagings', '150x150') }}" width="80px" alt="{{ trans('app.image') }}">
    <span style="margin-left: 10px;">
      {!! Form::checkbox('delete_image', 1, null, ['class' => 'icheck']) !!} {{ trans('app.form.delete_image') }}
    </span>
  </label>
  @endif
	<div class="row">
    <div class="col-md-9 nopadding-right">
			<input id="uploadFile" placeholder="{{ trans('app.placeholder.image') }}" class="form-control" disabled="disabled" style="height: 28px;" />
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