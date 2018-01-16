@extends('admin.layouts.master')

@section('buttons')
	@can('index', $dispute)
		<a href="{{ route('admin.support.dispute.index') }}" class="btn btn-default btn-flat">{{ trans('app.back') }}</a>
	@endcan
	@can('response', $dispute)
		<a href="{{ route('admin.support.dispute.response', $dispute) }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.response') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.dispute') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
			<div class="row">
			  	<div class="col-md-2 nopadding-right">
					<div class="form-group">
					  	<label>{{ trans('app.merchant') }}</label>
						<p>
							@if(Gate::allows('view', $dispute->shop))
				            	<a href="{{ route('admin.vendor.shop.show', $dispute->shop_id) }}" class="ajax-modal-btn small"><span class="lead"> {{ $dispute->shop->name }} </span></a>
							@else
								<span class="lead">{{ $dispute->shop->name }}</span>
							@endif

							<img src="{{ get_image_src($dispute->shop_id, 'shops', '150x150') }}" class="thumbnail" width="100%" alt="{{ trans('app.image') }}">
						</p>
						<div>
							{{ trans('app.total_disputes') }}:
							<span class="label label-outline">{{ Statistics::dispute_count($dispute->shop_id) }}</span>
							<br>
							{{ trans('app.latest_days', ['days' => 30]) }}:
							<span class="label label-info"><strong>{{ Statistics::dispute_count($dispute->shop_id, 30) }}</strong></span>
						</div>
						<hr/>
						<div class="form-group">
						  	<label>{{ trans('app.owner') }}</label>
							<p>
								<img src="{{ get_image_src($dispute->shop->owner_id, 'users', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
								@if(Gate::allows('view', $dispute->shop->owner))
						            <a href="{{ route('admin.admin.user.show', $dispute->shop->owner_id) }}" class="ajax-modal-btn small"><span class="lead">{{ $dispute->shop->owner->getName() }}</span></a>
								@else
									<span class="small">{{ $dispute->shop->owner->getName() }}</span>
								@endif
					        </p>
						</div>
					</div>
			  	</div>

			  	<div class="col-md-7 nopadding-right">
					{!! $dispute->statusName() !!}
					<p class="lead">{{ $dispute->dispute_type->detail }}</p>

					@if(count($dispute->attachments))
						{{ trans('app.attachments') . ': ' }}
						@foreach($dispute->attachments as $attachment)
				            <a href="{{ route('attachment.download', $attachment->path) }}"><i class="fa fa-file"></i></a>
						@endforeach
					@endif

					@if($dispute->description)
					  <div class="well">
						{!! $dispute->description !!}
					  </div>
					@endif

			        @if($dispute->replies->count())
						<div class="form-group">
						  	<label>{{ trans('app.conversations') }}</label>
						</div>

				        @foreach($dispute->replies as $reply)
							@include('admin.partials._reply_conversations')
				        @endforeach
			        @endif
			  	</div>

			  	<div class="col-md-3">
					@if($dispute->product_id)
						<div class="form-group">
						  	<label>{{ trans('app.product') }}</label>
							<img src="{{ get_image_src($dispute->product_id, 'products', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">

							@if(Gate::allows('view', $dispute->product))
					            <a href="{{ route('admin.catalog.product.show', $dispute->product_id) }}" class="ajax-modal-btn small"><span class="lead">{{ $dispute->product->name }}</span></a>
							@else
								<span class="lead">{{ $dispute->product->name }}</span>
							@endif
						</div>
						<hr/>
					@endif
					<div class="form-group">
					  	<label>{{ trans('app.customer') }}</label>
						<p>
							<img src="{{ get_image_src($dispute->customer_id, 'customers', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
							@if(Gate::allows('view', $dispute->customer))
					            <a href="{{ route('admin.admin.customer.show', $dispute->customer_id) }}" class="ajax-modal-btn small"><span class="lead">{{ $dispute->customer->getName() }}</span></a>
							@else
								<span class="lead">{{ $dispute->customer->getName() }}</span>
							@endif
				        </p>
						<div>
							{{ trans('app.total_disputes') }}:
							<span class="label label-outline">{{ Statistics::disputes_by_customer_count($dispute->customer_id) }}</span>
							<br>
							{{ trans('app.latest_days', ['days' => 30]) }}:
							<span class="label label-info"><strong>{{ Statistics::disputes_by_customer_count($dispute->customer_id, 30) }}</strong></span>
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<p>
						  	<label>{{ trans('app.created_at') }}</label>
							{{ $dispute->created_at->diffForHumans() }}
						</p>
						<p>
						  	<label>{{ trans('app.updated_at') }}</label>
							{{ $dispute->updated_at->diffForHumans() }}
						</p>
					</div>
				</div>
			</div>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection
