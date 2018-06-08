<div class="form-group">
  {!! Form::label('body', trans('app.form.body').'*') !!}
  {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.body'), 'rows' => '2', 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('action_text', trans('app.form.action_text')) !!}
  {!! Form::text('action_text', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.action_text')]) !!}
</div>
<div class="form-group">
  {!! Form::label('action_url', trans('app.form.action_url')) !!}
  {!! Form::text('action_url', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.action_url')]) !!}
</div>

<p class="help-block">* {{ trans('app.form.required_fields') }}</p>