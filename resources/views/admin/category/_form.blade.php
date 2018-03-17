<div class="form-group">
  {!! Form::label('cat_sub_grps[]', trans('app.form.category_sub_groups').'*') !!}
  {!! Form::select('cat_sub_grps[]', $catList , null, ['class' => 'form-control select2-categories', 'multiple' => 'multiple', 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('name', trans('app.form.category_name').'*') !!}
  {!! Form::text('name', null, ['class' => 'form-control makeSlug', 'placeholder' => trans('app.placeholder.category_name'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('active', trans('app.form.status').'*') !!}
  {!! Form::select('active', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('slug', trans('app.form.slug').'*', ['class' => 'with-help']) !!}
  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.slug') }}"></i>
  {!! Form::text('slug', null, ['class' => 'form-control slug', 'placeholder' => trans('app.placeholder.slug'), 'required']) !!}
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  {!! Form::label('description', trans('app.form.description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control summernote-min', 'placeholder' => trans('app.placeholder.description'), 'rows' => '3']) !!}
</div>
<div class="form-group">
	<label for="exampleInputFile"> {{ trans('app.form.image') }}</label>
  @if(isset($category) && Storage::exists(image_path("categories/{$category->id}") . 'category_banner.png'))
    <img src="{{ get_image_src($category->id, 'categories', 'category_banner') }}" class="card-bkimg" width="100%" alt="{{ trans('app.image') }}">

    <label style="padding-top: 5px;">
      {!! Form::checkbox('delete_image', 1, null, ['class' => 'icheck']) !!} {{ trans('app.form.delete_image') }}
    </label>
  @endif
	<div class="row">
      <div class="col-md-9 nopadding-right">
			 <input id="uploadFile" placeholder="{{ trans('app.placeholder.category_image') }}" class="form-control" disabled="disabled" style="height: 28px;" />
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