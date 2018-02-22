<div class="row">
  <div class="col-md-8 nopadding-right">
	<div class="form-group">
	  	{!! Form::label('name', trans('app.form.name').'*') !!}
      	<div class="input-group">
		 	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.payment_method_name'), 'required']) !!}
	        <span class="input-group-addon" id="basic-addon1">
	          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.payment_method_name') }}"></i>
	        </span>
		</div>
	  	<div class="help-block with-errors"></div>
	</div>
  </div>
  <div class="col-md-4 nopadding-left">
	<div class="form-group">
	  {!! Form::label('active', trans('app.form.status').'*') !!}
	  {!! Form::select('active', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
	  <div class="help-block with-errors"></div>
	</div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
	<div class="form-group">
	  	{!! Form::label('company_name', trans('app.form.company_name')) !!}
	  	<div class="input-group">
		 	{!! Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.company_name')]) !!}
	        <span class="input-group-addon" id="basic-addon1">
	          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.payment_method_company_name') }}"></i>
	        </span>
		</div>
	</div>
  </div>
  <div class="col-md-6 nopadding-left">
	<div class="form-group">
	  	{!! Form::label('type', trans('app.form.payment_method_type') . '*') !!}
	  	{!! Form::select('type', $types, null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
		 <div class="help-block with-errors"></div>
	</div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
	<div class="form-group">
	  	{!! Form::label('website', trans('app.form.website').'*') !!}
      	<div class="input-group">
		 	{!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.website'), 'required']) !!}
	        <span class="input-group-addon" id="basic-addon1">
	          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.website') }}"></i>
	        </span>
		</div>
	  	<div class="help-block with-errors"></div>
	</div>
  </div>
  <div class="col-md-6 nopadding-left">
	<div class="form-group">
	  	{!! Form::label('help_doc_link', trans('app.form.help_doc_link')) !!}
      	<div class="input-group">
		 	{!! Form::text('help_doc_link', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.help_doc_link')]) !!}
	        <span class="input-group-addon" id="basic-addon1">
	          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.help_doc_link') }}"></i>
	        </span>
		</div>
	</div>
  </div>
</div>

<div class="form-group">
  {!! Form::label('description', trans('app.form.description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control summernote-min', 'placeholder' => trans('app.placeholder.description'), 'rows' => '3']) !!}
</div>
<div class="form-group">
	<label for="exampleInputFile"> {{ trans('app.form.logo') }}</label>
	@if(isset($paymentMethod) && File::exists(image_path('payment-methods') . $paymentMethod->id . '_150x150.png'))
	<label>
		<img src="{{ get_image_src($paymentMethod->id, 'payment-methods', '150x150') }}" width="80px" alt="{{ trans('app.image') }}">
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
			    <span>{{ trans('app.form.upload') }} </span>
			    <input type="file" name="image" id="uploadBtn" class="upload" />
			</div>
      </div>
    </div>
</div>
<p class="help-block">* {{ trans('app.form.required_fields') }}</p>
