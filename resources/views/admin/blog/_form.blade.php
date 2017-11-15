<div class="form-group">
  {!! Form::label('title', trans('app.form.blog_title').'*') !!}
  {!! Form::text('title', null, ['class' => 'form-control makeSlug', 'placeholder' => 'Post title', 'required']) !!}
</div>
<div class="form-group">
  {!! Form::label('slug', trans('app.form.slug').'*') !!}
  {!! Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => 'SEO Friendly URL', 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('excerpt', trans('app.form.excerpt').'*') !!}
  {!! Form::textarea('excerpt', null, ['class' => 'form-control summernote-without-tootbar', 'placeholder' => trans('app.placeholder.excerpt'), 'rows' => '3', 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('content', trans('app.form.content').'*') !!}
  {!! Form::textarea('content', null, ['class' => 'form-control summernote-long', 'placeholder' => trans('app.placeholder.content'), 'required']) !!}
</div>
<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      {!! Form::label('published_at', trans('app.form.publish_at')) !!}
      {!! Form::text('published_at', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('app.placeholder.publish_at')]) !!}
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      {!! Form::label('status', trans('app.form.status').'*') !!}
      {!! Form::select('status', ['1' => trans('app.publish'), '0' => trans('app.draft')], null, ['class' => 'form-control select2-normal', 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>
<div class="form-group">
    {!! Form::label('tag_list[]', trans('app.form.tags')) !!}
    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control select2-tag', 'multiple' => 'multiple']) !!}
</div>

<p class="help-block">* {{ trans('app.form.required_fields') }}</p>