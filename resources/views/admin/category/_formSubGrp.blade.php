<div class="form-group">
  {!! Form::label('category_group_id', trans('app.form.category_group').'*') !!}
  {!! Form::select('category_group_id', $catGroups , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.category_group'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('name', trans('app.form.category_name').'*') !!}
  {!! Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.category_name'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('description', trans('app.form.description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control summernote-min', 'placeholder' => trans('app.placeholder.description'), 'rows' => '3']) !!}
</div>
<div class="form-group">
  {!! Form::label('active', trans('app.form.status').'*') !!}
  {!! Form::select('active', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>

<p class="help-block">* {{ trans('app.form.required_fields') }}</p>