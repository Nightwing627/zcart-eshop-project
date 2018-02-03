<div class="form-group">
  {!! Form::label('sale_price', trans('app.form.sale_price').'*', ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.sale_price') }}"></i>
  <div class="input-group">
    <span class="input-group-addon">{{ config('system_settings.currency_symbol') ?: '$' }}</span>
    {!! Form::number('sale_price', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => trans('app.placeholder.sale_price'), 'required']) !!}
  </div>
  <div class="help-block with-errors"></div>
</div>