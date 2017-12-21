<div class="form-group">
    {!! Form::label('customer', trans('app.form.search_customer') . '*') !!}
    <div class="input-group">
      {!! Form::text('customer', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.search_customer'), 'required']) !!}
      <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.search_customer') }}"><i class="fa fa-question-circle"></i></span>
    </div>
  <div class="help-block with-errors"></div>
</div>