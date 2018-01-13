@extends('admin.layouts.master')

@section('buttons')
	@can('index', $ticket)
		<a href="{{ route('admin.support.ticket.index') }}" class="btn btn-default btn-flat">{{ trans('app.back') }}</a>
	@endcan
	@can('reply', $ticket)
		<a href="{{ route('admin.support.ticket.reply', $ticket) }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.reply') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.ticket') }}</h3>
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
							<span class="lead"> {{ $ticket->shop->name }} </span>
							<br/>
							@can('view', $ticket->shop)
				            	<a href="{{ route('admin.merchant.shop.show', $ticket->shop_id) }}" class="ajax-modal-btn small">{{ trans('app.view_detail') }}</a>
							@endcan

							<img src="{{ get_image_src($ticket->shop_id, 'shops', '150x150') }}" class="thumbnail" width="100%" alt="{{ trans('app.image') }}">
						</p>

						<p>
							<img src="{{ get_image_src($ticket->user_id, 'users', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">

							<span class="lead">{{ $ticket->user->getName() }}</span>
							<br/>
							@can('view', $ticket->user)
					            <a href="{{ route('admin.admin.user.show', $ticket->user_id) }}" class="ajax-modal-btn small">{{ trans('app.view_detail') }}</a>
							@endcan
				        </p>

						<hr/>

						<p>
						  	<label>{{ trans('app.created_at') }}</label>
							{{ $ticket->created_at->diffForHumans() }}
						</p>
						<p>
						  	<label>{{ trans('app.updated_at') }}</label>
							{{ $ticket->updated_at->diffForHumans() }}
						</p>
					</div>
			  	</div>

			  	<div class="col-md-7 nopadding-right">
					<span class="label label-outline"> {{ $ticket->category->name }} </span> &nbsp;
					{!! $ticket->priorityLevel() !!}
					{!! $ticket->statusName() !!}
					<p class="lead">{{ $ticket->subject }}</p>

					@if(count($ticket->attachments))
						{{ trans('app.attachments') . ': ' }}
						@foreach($ticket->attachments as $attachment)
				            <a href="{{ route('attachment.download', $attachment->path) }}"><i class="fa fa-file"></i></a>
						@endforeach
					@endif

					@if($ticket->message)
					  <div class="well">
						{!! $ticket->message !!}
					  </div>
					@endif

			        @if($ticket->replies->count())
						<div class="form-group">
						  	<label>{{ trans('app.conversations') }}</label>
						</div>

				        @foreach($ticket->replies as $reply)
							@include('admin.partials._reply_conversations')
				        @endforeach
			        @endif
			  	</div>

			  	<div class="col-md-3">
					<div class="form-group">
						@if($ticket->assignedTo)
						  	<label>{{ trans('app.assigned_to') }}</label>
							<img src="{{ get_image_src($ticket->assigned_to, 'users', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
							<p>
								<span class="lead">
									{{ $ticket->assignedTo->getName() }}
								</span>
								<br/>
								@can('view', $ticket->assignedTo)
					            	<a href="{{ route('admin.admin.user.show', $ticket->assigned_to) }}" class="ajax-modal-btn small">{{ trans('app.view_detail') }}</a>
								@endcan
							</p>
						@endif

						@can('assign', $ticket)
							<a class="btn btn-default" href="{{ route('admin.support.ticket.showAssignForm', $ticket) }}" class="ajax-modal-btn"><i class="fa fa-hashtag"></i> {{ trans('app.assign') }}</a>
						@endcan
				  	</div>

					@if($ticket->shop->tickets)
						<div class="form-group">
							<label>{{ trans('app.other_conversations') }}</label>
							<ul class="list-unstyled">
								@foreach($ticket->shop->tickets as $old_ticket)
									@continue($old_ticket->id == $ticket->id)
									<li>
										<a href="{{ route('admin.support.ticket.show', $old_ticket->id) }}">{{ $old_ticket->subject }}</a>
										{!! $old_ticket->statusName() !!}
									</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection
