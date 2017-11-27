@if(isset($product))
  {{ Form::hidden('product_id', $product->id) }}
@elseif($inventory)
  {{ Form::hidden('product_id', $inventory->product_id) }}
@endif

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
      {!! Form::label('available_from', trans('app.form.available_from'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.available_from') }}"></i>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('available_from', null, ['class' => 'form-control datepicker', 'style' => 'z-index: 900;', 'placeholder' => trans('app.placeholder.available_from')]) !!}
      </div>
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
      {!! Form::label('carrier_list[]', trans('app.form.carriers'), ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_carriers') }}"></i>
      {!! Form::select('carrier_list[]', $carriers , null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']) !!}
    </div>
  </div>
  <div class="col-lg-3 col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('tax_id', trans('app.form.tax').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_tax') }}"></i>
      {!! Form::select('tax_id', $taxes, config('shop_settings.default_tax_id_for_inventory'), ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']) !!}
      <div class="help-block with-errors"></div>
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

<div class="spacer30"></div>

<fieldset>
  <legend>{{ trans('app.variants') }}</legend>
  <table class="table table-default" id="variantsTable">
    <thead>
      <tr>
        <th>{{ trans('app.sl_number') }}</th>
        <th>{{ trans('app.form.variants') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.variants') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th>{{ trans('app.form.image') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.image') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th>{{ trans('app.form.sku') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.sku') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th>{{ trans('app.form.condition') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.seller_product_condition') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th>{{ trans('app.form.stock_quantity') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.stock_quantity') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th>{{ trans('app.form.purchase_price') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.purchase_price') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th>{{ trans('app.form.sale_price') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.sale_price') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th>{{ trans('app.form.offer_price') }}
          <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ trans('help.offer_price') }}"><sup><i class="fa fa-question"></i></sup></small>
        </th>
        <th><i class="fa fa-trash-o"></i></th>
      </tr>
    </thead>
    <tbody style="zoom: 0.80;">
      @php
        $i = 0;
      @endphp
      @foreach($combinations as $combination)
        <tr>
          <td><div class="form-group">{{ $i + 1 }}</div></td>
          <td>
            <div class="form-group">
            @foreach($combination as $attrId => $attrValue)
              {{ Form::hidden('variants['. $i .']['. $attrId .']', key($attrValue)) }}
              {{ $attributes[$attrId] .' : '. current($attrValue) }}
              {{ ($attrValue !== end($combination))?'; ':'' }}
            @endforeach
            </div>
          </td>
          <td>
            <div class="form-group">
              <label class="img-btn-sm">
                {{ Form::file('image['. $i .']') }}
                <span>{{ trans('app.placeholder.image') }}</span>
              </label>
            </div>
          </td>
          <td>
            <div class="form-group">
              {!! Form::text('sku['. $i .']', null, ['class' => 'form-control sku', 'placeholder' => trans('app.placeholder.sku'), 'required']) !!}
            </div>
          </td>
          <td>
            <div class="form-group">
              {!! Form::select('condition['. $i .']', ['New' => trans('app.new'), 'Used' => trans('app.used'), 'Refurbished' => trans('app.refurbished')], null, ['class' => 'form-control condition', 'required']) !!}
            </div>
          </td>
          <td>
            <div class="form-group">
              {!! Form::number('stock_quantity['. $i .']', null, ['class' => 'form-control quantity', 'placeholder' => trans('app.placeholder.stock_quantity'), 'required']) !!}
            </div>
          </td>
          <td>
            <div class="form-group">
              {!! Form::number('purchase_price['. $i .']', null, ['class' => 'form-control purchasePrice', 'step' => 'any', 'placeholder' => trans('app.placeholder.purchase_price'), 'required']) !!}
            </div>
          </td>
          <td>
            <div class="form-group">
              {!! Form::number('sale_price['. $i .']', null, ['class' => 'form-control salePrice', 'step' => 'any', 'placeholder' => trans('app.placeholder.sale_price'), 'required']) !!}
            </div>
          </td>
          <td>
            <div class="form-group">
              {!! Form::number('offer_price['. $i .']', null, ['class' => 'form-control offerPrice', 'step' => 'any', 'placeholder' => trans('app.placeholder.offer_price')]) !!}
            </div>
          </td>
          <td>
            <div class="form-group">
              <i class="fa fa-close deleteThisRow" data-toggle="tooltip" data-placement="left" title="{{ trans('help.delete_this_combination') }}"></i>
            </div>
          </td>
        </tr>
        <?php $i++; ?>
      @endforeach
    </tbody>
  </table>
</fieldset>

<fieldset id="offerDates" hidden>
  <legend>{{ trans('app.offer_dates') }}</legend>
  <div class="row">
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
</fieldset>

<div class="spacer30"></div>

<div class="form-group">
  {!! Form::label('description', trans('app.form.description'), ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.seller_description') }}"></i>
  {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]) !!}
</div>

@if($product->requires_shipping)
  <fieldset>
    <legend>{{ trans('app.shipping') }}</legend>
    <div class="row">
      <div class="col-md-4 col-sm-12 nopadding-right">
        <div class="form-group">
          {!! Form::label('packaging_id', trans('app.form.packaging'), ['class' => 'with-help']) !!}
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.select_packaging') }}"></i>
          {!! Form::select('packaging_id', $packagings, config('shop_settings.default_packaging_id'), ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.select')]) !!}
          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 nopadding-right">
        <div class="form-group">
            {!! Form::label('shipping_width', trans('app.form.shipping_width'), ['class' => 'with-help']) !!}
            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_width') }}"></i>
            <div class="input-group">
              {!! Form::number('shipping_width', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_width')]) !!}
              <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
            </div>
            <div class="help-block with-errors"></div>
        </div>
      </div>

      <div class="col-md-2 col-sm-6 nopadding">
        <div class="form-group">
          {!! Form::label('shipping_height', trans('app.form.shipping_height'), ['class' => 'with-help']) !!}
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_height') }}"></i>
          <div class="input-group">
            {!! Form::number('shipping_height', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_height')]) !!}
            <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>

      <div class="col-md-2 col-sm-6 nopadding-right">
        <div class="form-group">
          {!! Form::label('shipping_depth', trans('app.form.shipping_depth'), ['class' => 'with-help']) !!}
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_depth') }}"></i>
          <div class="input-group">
            {!! Form::number('shipping_depth', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_depth')]) !!}
            <span class="input-group-addon">{{ config('system_settings.length_unit') ?: 'cm' }}</span>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>

      <div class="col-md-2 col-sm-6 nopadding-left">
        <div class="form-group">
          {!! Form::label('shipping_weight', trans('app.form.shipping_weight'), ['class' => 'with-help']) !!}
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.shipping_weight') }}"></i>
          <div class="input-group">
            {!! Form::number('shipping_weight', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.shipping_weight')]) !!}
            <span class="input-group-addon">{{ config('system_settings.weight_unit') ?: 'gm' }}</span>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </div>
    </div>
  </fieldset>
@endif

<p class="help-block">* {{ trans('app.form.required_fields') }}</p>


