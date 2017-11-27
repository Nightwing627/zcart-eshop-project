@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('address.create', [$addressable_type, $addressable->id]) }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_address') }}</a>
@endsection

@section('content')

	<div class="admin-user-widget">
	    <span class="admin-user-widget-img">
	        <img src="{{ get_image_src($addressable->id, str_plural($addressable_type), '150x150') }}" class="thumbnail" alt="{{ trans('app.avatar') }}">
	    </span>

	    <div class="admin-user-widget-content">

	        <span class="admin-user-widget-title">
	            {{ trans('app.'. $addressable_type) . ': ' . $addressable->name }}
	        </span>
	        <span class="admin-user-widget-text text-muted">
	            {{ trans('app.email') . ': ' . $addressable->email }}
	        </span>
	        @if($addressable->primaryAddress)
		        <span class="admin-user-widget-text text-muted">
		            {{ trans('app.phone') . ': ' . $addressable->primaryAddress->phone }}
		        </span>
		        <span class="admin-user-widget-text text-muted">
		            {{ trans('app.zip_code') . ': ' . $addressable->primaryAddress->zip_code }}
		        </span>
	        @endif
	        <a href="{{ route('admin.admin.' . $addressable_type . '.show', $addressable->id) }}" data-target="myDynamicModal" data-toggle="modal" class="small">{{ trans('app.view_detail') }}</a>

	        <span class="pull-right" style="margin-top: -60px;margin-right: 30px;font-size: 40px; color: rgba(0, 0, 0, 0.2);">
	            <i class="fa fa-check-square-o"></i>
	        </span>
	    </div>            <!-- /.admin-user-widget-content -->
	</div>          <!-- /.admin-user-widget -->

	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.addresses') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	    	@foreach($addresses as $address)
		        <div class="row">
			        <div class="col-md-5">
				        {!! $address->toHtml() !!}
			        </div>
			        <div class="col-md-4">
	                    <iframe width="100%" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q={{ urlencode($address->toString()) }}&output=embed"></iframe>
			        </div>
			        <div class="col-md-3">
				        <div class="pull-right">
				    		<a href="{{ route('address.edit', $address->id) }}" data-toggle="modal" data-target="myDynamicModal" class="btn btn-default btn-sm btn-flat"><i class="fa fa-edit"></i> {{ trans('app.edit') }} </a>

				    		@unless($address->address_type == 'Primary')
							{!! Form::open(['route' => ['address.destroy', $address->id], 'method' => 'delete', 'class' => 'form-inline', 'style' => 'display: inline;']) !!}
							    {!! Form::button('<i class="fa fa-trash-o"></i> ' . trans('app.delete'), ['type' => 'submit', 'class' => 'confirm ajax-silent btn btn-danger btn-sm btn-flat']) !!}
							{!! Form::close() !!}
					        @endunless
				        </div>
			        </div>
		        </div>

	    		@unless($loop->last)
			        <hr/>
		        @endunless
	    	@endforeach
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection