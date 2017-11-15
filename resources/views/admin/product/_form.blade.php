<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      {!! Form::label('name', trans('app.form.name').'*') !!}
      {!! Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.name'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('active', trans('app.form.status').'*') !!}
      {!! Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  {!! Form::label('category_list[]', trans('app.form.categories').'*') !!}
  {!! Form::select('category_list[]', $categories , null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple', 'required']) !!}
  <div class="help-block with-errors"></div>
</div>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('has_variant', 0) }}
        {!! Form::checkbox('has_variant', null, !isset($product) ? 1 : null, ['id' => 'has_variant', 'class' => 'icheckbox_line']) !!}
        {!! Form::label('has_variant', trans('app.form.has_variant')) !!}
        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.has_variant') }}"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('requires_shipping', 0) }}
        {!! Form::checkbox('requires_shipping', null, !isset($product) ? 1 : null, ['id' => 'requires_shipping', 'class' => 'icheckbox_line']) !!}
        {!! Form::label('requires_shipping', trans('app.form.requires_shipping')) !!}
        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.requires_shipping') }}"></i>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <div class="input-group">
        {{ Form::hidden('downloadable', 0) }}
        {!! Form::checkbox('downloadable', null, null, ['class' => 'icheckbox_line']) !!}
        {!! Form::label('downloadable', trans('app.form.downloadable')) !!}
        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.downloadable') }}"></i>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
      {!! Form::label('mpn', trans('app.form.mpn')) !!}
      <div class="input-group">
        {!! Form::text('mpn', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.mpn')]) !!}
        <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.mpn') }}"><i class="fa fa-question-circle"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding">
    <div class="form-group">
      {!! Form::label('gtin', trans('app.form.gtin')) !!}
      <div class="input-group">
        {!! Form::text('gtin', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.gtin')]) !!}
        <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.gtin') }}"><i class="fa fa-question-circle"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('gtin_type', trans('app.form.gtin_type')) !!}
      {!! Form::select('gtin_type', $gtin_types , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.gtin_type')]) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
      {!! Form::label('brand', trans('app.form.brand')) !!}
      <div class="input-group">
        {!! Form::text('brand', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.brand')]) !!}
        <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.brand') }}"><i class="fa fa-question-circle"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding">
    <div class="form-group">
      {!! Form::label('model_number', trans('app.form.model_number')) !!}
      <div class="input-group">
        {!! Form::text('model_number', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.model_number')]) !!}
        <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.model_number') }}"><i class="fa fa-question-circle"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('manufacturer_id', trans('app.form.manufacturer')) !!}
      {!! Form::select('manufacturer_id', $manufacturers , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.manufacturer')]) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 nopadding-right">
    <div class="form-group">
        {!! Form::label('origin_country', trans('app.form.origin')) !!}
        {!! Form::select('origin_country', $countries , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.origin')]) !!}
        <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding">
    <div class="form-group">
        {!! Form::label('min_price', trans('app.form.catalog_min_price')) !!}
        <div class="input-group">
          <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
          {!! Form::number('min_price' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.catalog_min_price')]) !!}
          <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.catalog_min_price') }}"><i class="fa fa-question-circle"></i></span>
        </div>
        <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
        {!! Form::label('max_price', trans('app.form.catalog_max_price')) !!}
        <div class="input-group">
          <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
          {!! Form::number('max_price' , null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.catalog_max_price')]) !!}
          <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.catalog_max_price') }}"><i class="fa fa-question-circle"></i></span>
        </div>
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
      {!! Form::label('slug', trans('app.form.slug').'*') !!}
      <div class="input-group">
        {!! Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => 'SEO Friendly URL', 'required']) !!}
        <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.slug') }}"><i class="fa fa-question-circle"></i></span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
        {!! Form::label('tag_list[]', trans('app.form.tags')) !!}
        {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control select2-tag', 'multiple' => 'multiple']) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('meta_title', trans('app.form.meta_title')) !!}
      <div class="input-group">
        {!! Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.meta_title')]) !!}
        <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.meta_title') }}"><i class="fa fa-question-circle"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('meta_description', trans('app.form.meta_description')) !!}
      <div class="input-group">
        {!! Form::text('meta_description', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.meta_description')]) !!}
        <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.meta_description') }}"><i class="fa fa-question-circle"></i></span>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label for="exampleInputFile"> {{ trans('app.form.image') }}</label>
  @if(isset($product) && File::exists(image_path('products') . $product->id . '_150x150.png'))
  <label>
    <img src="{{ get_image_src($product->id, 'products', '150x150') }}" width="80px" alt="{{ trans('app.image') }}">
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
          <span>{{ trans('app.form.upload') }} </span>
          <input type="file" name="image" id="uploadBtn" class="upload" />
      </div>
      </div>
    </div>
</div>

<p class="help-block">* {{ trans('app.form.required_fields') }}</p>