@extends('admin.layouts.master')

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.profile') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
			<div class="row">
			  	<div class="col-md-3">
					<div class="form-group">
					  	<label>{{ trans('app.form.avatar') }}</label>

						<img src="{{ get_image_src($profile->id, 'users', '150x150') }}" class="thumbnail" width="100%" alt="{{ trans('app.image') }}">

					  	@if(File::exists(image_path('users') . $profile->id . '_150x150.png'))
							<a class="btn btn-xs btn-default confirm ajax-silent" type="submit" href="{{ route('admin.profile.deletePhoto') }}"><i class="fa fa-trash-o"></i> {{ trans('app.form.delete_avatar') }}</a>
					  	@endif
					</div>

					<div class="form-group">
			    		{!! Form::open(['route' => 'admin.profile.updatePhoto', 'files' => true, 'data-toggle' => 'validator']) !!}
							<div class="row">
							    <div class="col-md-8 nopadding-right">
						          <input type="file" name="image" required />
							      <div class="help-block with-errors"></div>
						        </div>
							    <div class="col-md-4 nopadding-left">
							        <button type="submit" class="btn btn-info btn-block">{{ trans('app.form.upload') }}</button>
					    		</div>
							</div>
        				{!! Form::close() !!}
				    </div>
			  	</div>

			  	<div class="col-md-6">
			        {!! Form::model($profile, ['method' => 'PUT', 'route' => ['admin.profile.update'], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']) !!}

					    <div class="form-group">
					      {!! Form::label('name', trans('app.form.full_name').'*') !!}
					      {!! Form::text('name', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.full_name'), 'required']) !!}
					      <div class="help-block with-errors"></div>
					    </div>
					    <div class="form-group">
					      {!! Form::label('nice_name', trans('app.form.nice_name') ) !!}
					      {!! Form::text('nice_name', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.nice_name')]) !!}
					    </div>
					    <div class="form-group">
					      {!! Form::label('role', trans('app.form.role')) !!}
					      {!! Form::text('role', $profile->role->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
					    </div>
					    <div class="form-group">
					      {!! Form::label('email', trans('app.form.email_address').'*' ) !!}
					      {!! Form::email('email', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.valid_email'), 'required']) !!}
					      <div class="help-block with-errors"></div>
					    </div>

					    <div class="form-group">
					      {!! Form::label('dob', trans('app.form.dob')) !!}
					      <div class="input-group">
					        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					        {!! Form::text('dob', Null, ['class' => 'form-control datepicker', 'placeholder' => trans('app.placeholder.dob')]) !!}
					      </div>
					    </div>
					    <div class="form-group">
					      {!! Form::label('sex', trans('app.form.sex')) !!}
					      {!! Form::select('sex', ['app.male' => trans('app.male'), 'app.female' => trans('app.female'), 'app.other' => trans('app.other')], null, ['class' => 'form-control select2-normal', 'placeholder' =>trans('app.placeholder.sex')]) !!}
					    </div>

						<div class="form-group">
						  {!! Form::label('description', trans('app.form.description')) !!}
						  {!! Form::textarea('description', Null, ['class' => 'form-control summernote-without-tootbar', 'rows' => '2', 'placeholder' => trans('app.placeholder.description')]) !!}
						</div>

			            {!! Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']) !!}

			        {!! Form::close() !!}
			  	</div>
			  	<div class="col-md-3">
					<div class="form-group">
					  	<label>{{ trans('app.form.address') }}</label>
						@if($profile->primaryAddress)

		        			{!! $profile->primaryAddress->toHtml() !!}

							<a class="btn btn-default" href="{{ route('address.edit', $profile->primaryAddress->id) }}" data-target="myDynamicModal" data-toggle="modal"><i class="fa fa-map-marker"></i> {{ trans('app.update_address') }}</a>
						@else
							<a class="btn btn-default" href="{{ route('address.create', ['user', $profile->id]) }}" data-target="myDynamicModal" data-toggle="modal"><i class="fa fa-plus-square-o"></i> {{ trans('app.add_address') }}</a>
						@endif
				  	</div>

					<div class="form-group">
						<a class="btn btn-default" href="{{ route('admin.profile.showChangePasswordForm') }}" data-target="myDynamicModal" data-toggle="modal"><i class="fa fa-lock"></i> {{ trans('app.change_password') }}</a>
					</div>

				    @unless($profile->isFromPlatform())
					    <hr/>
						<div class="form-group">
						  	<label>{{ trans('app.merchant') }}</label>
						  	<p class="lead">{{ $profile->shop->name }}</p>

						  	<label>{{ trans('app.form.logo') }}</label>
					        <img src="{{ get_image_src($profile->merchantId(), 'shops', '150x150') }}" class="thumbnail" width="100%" alt="{{ trans('app.image') }}">
					  	</div>
				    @endunless
			  	</div>
			</div>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection
