<div class="form-group">
  {!! Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.order_status_name') }}"></i>
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.status_name'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('color', trans('app.form.color'), ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.order_status_color') }}"></i>
  <div class="input-group my-colorpicker2 colorpicker-element">
      {!! Form::text('label_color', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.color')]) !!}
    <div class="input-group-addon">
      <i style="background-color: rgb(135, 60, 60);"></i>
    </div>
  </div>
</div>
<div class="form-group">
  {!! Form::label('send_email_to_customer', trans('app.form.send_email_to_customer').'*', ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.order_status_send_email') }}"></i>
  {!! Form::select('send_email_to_customer', ['1' => trans('app.yes'), '0' => trans('app.no')], null, ['class' => 'form-control select2-normal', 'id' => 'send_email', 'placeholder' => trans('app.placeholder.send_email_to_customer')]) !!}
</div>
<div id="option_email_template"  class="form-group
  {{ (
      (!isset($status)) ||
      ($status->send_email_to_customer != 1)
    )
    ? 'hidden' : 'show'
  }}">

  {!! Form::label('email_template_id', trans('app.form.email_template').'*', ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.order_status_email_template') }}"></i>
  {!! Form::select('email_template_id', $email_templates , null, ['class' => 'form-control select2', 'id' => 'email_template', 'placeholder' => trans('app.placeholder.email_template')]) !!}
  <div class="help-block with-errors"></div>
</div>
<p class="help-block">* {{ trans('app.form.required_fields') }}</p>

<script type="text/javascript">
  ;(function($, window, document) {
    var template = $("#option_email_template");

    if(template.hasClass('show')) $("#email_template").attr('required', 'required');

    $("#send_email").change(
      function(){
        var ID = $("#send_email").select2('data')[0].id;
        if (ID == 1) {
          template.removeClass('hidden');
          template.addClass('show');
          $("#email_template").attr('required', 'required');
        }else{
          template.removeClass('show');
          template.addClass('hidden');
          $("#email_template").removeAttr('required');
        }
      }
    );

  }(window.jQuery, window, document));


</script>

