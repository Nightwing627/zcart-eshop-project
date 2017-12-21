<div class="row">
	<div class="col-md-1 no-print">
		<img src="{{ get_image_src($reply->user_id, 'users', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
		@can('view', $reply->user)
            <a href="{{ route('admin.admin.user.show', $reply->user_id) }}" data-target="myDynamicModal" data-toggle="modal" class="small">{{ trans('app.view_detail') }}</a>
		@endcan
	</div>
	<div class="col-md-11">
		<blockquote style="font-size: 1em;">
    		{!! $reply->reply !!}

			<footer>{{ $reply->user->getName() }} | {{ $reply->updated_at->diffForHumans() }}

				@if(count($reply->attachments))
					<div class="pull-right no-print">
						{{ trans('app.attachments') . ': ' }}
						@foreach($reply->attachments as $attachment)
				            <a href="{{ route('attachment.download', $attachment->path) }}"><i class="fa fa-file"></i></a>
						@endforeach
					</div>
				@endif
			</footer>
    	</blockquote>
	</div>
</div>
