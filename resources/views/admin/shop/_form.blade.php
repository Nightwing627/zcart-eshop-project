<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      {!! Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_name') }}"></i>
      {!! Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.shop_name'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('active', trans('app.form.status'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_status') }}"></i>
      {!! Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status')]) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('legal_name', trans('app.form.legal_name'). '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_legal_name') }}"></i>
      {!! Form::text('legal_name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.shop_legal_name'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('owner_id', trans('app.form.shop_owner'). '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ isset($shop) ? trans('help.shop_owner_cant_change') :trans('help.shop_owner_id') }}"></i>
      @if(isset($shop))
        {{ Form::text('owner', $shop->owner->name, ['class' => 'form-control', 'disabled']) }}
      @else
        {!! Form::select('owner_id', $merchants , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.shop_owner'), 'required']) !!}
        <div class="help-block with-errors"></div>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('email', trans('app.form.email_address'). '*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_email') }}"></i>
      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('external_url', trans('app.form.external_url'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_external_url') }}"></i>
      {!! Form::text('external_url', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.external_url')]) !!}
    </div>
  </div>
</div>

@unless(isset($shop))
  <div class="row">
    <div class="col-md-6 nopadding-right">
      <div class="form-group">
        {!! Form::label('slug', trans('app.form.slug').'*', ['class' => 'with-help']) !!}
        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_slug') }}"></i>
        {!! Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.slug'), 'required']) !!}
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-6 nopadding-left">
      <div class="form-group">
        {!! Form::label('timezone_id', trans('app.form.timezone'). '*', ['class' => 'with-help']) !!}
        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_timezone') }}"></i>
        {!! Form::select('timezone_id', $timezones , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.timezone'), 'required']) !!}
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>

  @include('address._form')
@endunless

<div class="form-group">
  {!! Form::label('description', trans('app.form.description'), ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shop_description') }}"></i>
  {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]) !!}
</div>

<div class="form-group">
	<label for="exampleInputFile">{{ trans('app.form.logo') }}</label>
  @if(isset($shop) && File::exists(image_path('shops') . $shop->id . 'medium.png'))
  <label>
    <img src="{{ get_image_src($shop->id, 'shops', 'medium') }}" width="80px" alt="{{ trans('app.image') }}">
    <span style="margin-left: 10px;">
      {!! Form::checkbox('delete_image', 1, null, ['class' => 'icheck']) !!} {{ trans('app.form.delete_image') }}
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