@if(isset($product))
  {{ Form::hidden('product_id', $product->id) }}
@elseif($inventory)
  {{ Form::hidden('product_id', $inventory->product_id) }}
@endif

<div class="row">
  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('sku', trans('app.form.sku').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.sku') }}"></i>
      {!! Form::text('sku', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.sku'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('available_from', trans('app.form.available_from'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.available_from') }}"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('available_from', null, ['class' => 'form-control datepicker', 'placeholder' => trans('app.placeholder.available_from')]) !!}
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('condition', trans('app.form.condition').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.seller_product_condition') }}"></i>
      {!! Form::select('condition', ['New' => trans('app.new'), 'Used' => trans('app.used'), 'Refurbished' => trans('app.refurbished')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('active', trans('app.form.status').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.seller_inventory_status') }}"></i>
      {!! Form::select('active', ['1' => trans('app.active'), '0' => trans('app.inactive')], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('warehouse_id', trans('app.form.warehouse'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_warehouse') }}"></i>
      {!! Form::select('warehouse_id', $warehouses, null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]) !!}
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('supplier_id', trans('app.form.supplier'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_supplier') }}"></i>
      {!! Form::select('supplier_id', $suppliers, null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select')]) !!}
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('min_order_quantity', trans('app.form.min_order_quantity'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.min_order_quantity') }}"></i>
      {!! Form::number('min_order_quantity', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.min_order_quantity')]) !!}
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('alert_quantity', trans('app.form.alert_quantity'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.alert_quantity') }}"></i>
      {!! Form::number('alert_quantity', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.alert_quantity')]) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
        {!! Form::label('sale_price', trans('app.form.sale_price').'*', ['class' => 'with-help']) !!}
        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.sale_price') }}"></i>
        <div class="input-group">
          <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
          {!! Form::number('sale_price', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.sale_price'), 'required']) !!}
        </div>
        <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('purchase_price', trans('app.form.purchase_price').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.purchase_price') }}"></i>
      <div class="input-group">
        <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
        {!! Form::number('purchase_price', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.purchase_price'), 'required']) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('stock_quantity', trans('app.form.stock_quantity').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.stock_quantity') }}"></i>
      {!! Form::number('stock_quantity', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.stock_quantity'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('carrier_list[]', trans('app.form.carriers'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_carriers') }}"></i>
      {!! Form::select('carrier_list[]', $carriers , null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('tax_id', trans('app.form.tax').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_tax') }}"></i>
      {!! Form::select('tax_id', $taxes, isset($inventory) ? $inventory->tax_id : config('shop_settings.default_tax_id_for_inventory'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('offer_price', trans('app.form.offer_price'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.offer_price') }}"></i>
      <div class="input-group">
        <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
        {!! Form::number('offer_price', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.offer_price')]) !!}
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('offer_start', trans('app.form.offer_start'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.offer_start') }}"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('offer_start', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.offer_start')]) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('offer_end', trans('app.form.offer_end'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.offer_end') }}"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('offer_end', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.offer_end')]) !!}
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  {!! Form::label('description', trans('app.form.description'), ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.seller_description') }}"></i>
  {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]) !!}
</div>

@if(isset($inventory) && $inventory->product->requires_shipping || $product->requires_shipping)
<fieldset>
  <legend>{{ trans('app.shipping') }}</legend>
  <div class="row">
    <div class="col-md-4 col-sm-12 nopadding-right">
      <div class="form-group">
        {!! Form::label('packaging_id', trans('app.form.packaging').'*', ['class' => 'with-help']) !!}
        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_packaging') }}"></i>
        {!! Form::select('packaging_id', $packagings, isset($inventory) ? $inventory->packaging_id : config('shop_settings.default_packaging_id'), ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-2 col-sm-6 nopadding-right">
      <div class="form-group">
          {!! Form::label('shipping_width', trans('app.form.shipping_width').'*', ['class' => 'with-help']) !!}
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_width') }}"></i>
          <div class="input-group">
            {!! Form::number('shipping_width', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_width'), 'required']) !!}
            <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
          </div>
          <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="col-md-2 col-sm-6 nopadding">
      <div class="form-group">
        {!! Form::label('shipping_height', trans('app.form.shipping_height').'*', ['class' => 'with-help']) !!}
        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_height') }}"></i>
        <div class="input-group">
          {!! Form::number('shipping_height', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_height'), 'required']) !!}
          <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="col-md-2 col-sm-6 nopadding-right">
      <div class="form-group">
        {!! Form::label('shipping_depth', trans('app.form.shipping_depth').'*', ['class' => 'with-help']) !!}
        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_depth') }}"></i>
        <div class="input-group">
          {!! Form::number('shipping_depth', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_depth'), 'required']) !!}
          <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>

    <div class="col-md-2 col-sm-6 nopadding-left">
      <div class="form-group">
        {!! Form::label('shipping_weight', trans('app.form.shipping_weight').'*', ['class' => 'with-help']) !!}
        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_weight') }}"></i>
        <div class="input-group">
          {!! Form::number('shipping_weight', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_weight'), 'required']) !!}
          <span class="input-group-addon">{{ config('system_settings.weight_unit') ?: 'gm' }}</span>
        </div>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
</fieldset>
@endif

<?php
  $attrCount = count($attributes); ?>

@if($attrCount)
<fieldset>
  <legend>{{ trans('app.attributes') }}</legend>
  <?php
  if ($attrCount >= 4){
    $col = 3; $chunk = 4;
  }elseif ($attrCount == 3 ){
    $col = 4; $chunk = 3;
  }else{
    $col = 6; $chunk = 2;
  }
  ?>
    @foreach ($attributes->chunk($chunk) as $chunk)
      <div class="row">
        @foreach ($chunk as $attribute)
          <div class="col-md-{{ $col }}
            @if($loop->first)
             {{ 'nopadding-right' }}
            @elseif($loop->last && $loop->iteration != 3)
             {{ 'nopadding-left' }}
            @elseif($col == 4)
             {{ 'nopadding' }}
            @elseif($col == 3)
              @if($loop->iteration == 2)
                {{ 'nopadding-left' }}
              @elseif($loop->iteration == 3)
                {{ 'nopadding-right' }}
              @endif
            @endif
          ">
            <div class="form-group">
              {!! Form::label($attribute->name, $attribute->name, ['class' => 'with-help']) !!}

              <select class = "form-control select2" id="{{ $attribute->name }}" name="variants[{{ $attribute->id }}]" placeholder = {{ trans('app.placeholder.select') }}>

                <option value="">{{ trans('app.placeholder.select') }}</option>

                @foreach($attribute->attributeValues as $attributeValue)

                  <option value="{{ $attributeValue->id }}"
                    @if(isset($inventory) && count($inventory->attributes))
                      {{ in_array($attributeValue->id, $inventory->attributeValues->pluck('id')->toArray()) ? 'selected' : '' }}
                    @endif
                  >

                    {{ $attributeValue->value }}

                  </option>

                @endforeach

              </select>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
</fieldset>
@endif

<fieldset>
  <legend>{{ trans('app.images') }}</legend>
  <div class="form-group">
    <label for="exampleInputFile"> {{ trans('app.form.image') }}</label>
    @if(isset($inventory) && File::exists(image_path('inventories') . $inventory->id . '_150x150.png'))
    <label>
      <img src="{{ get_image_src($inventory->id, 'inventories', '150x150') }}" width="80px" alt="{{ trans('app.image') }}">
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
</fieldset>

<p class="help-block">* {{ trans('app.form.required_fields') }}</p>


