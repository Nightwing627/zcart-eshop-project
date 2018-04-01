<div class="row">
	<div class="col-md-1 no-print">
        @if($reply->user->image)
			<img src="{{ get_storage_file_url(optional($reply->user->image)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
        @else
    		<img src="{{ get_gravatar_url($reply->user->email, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
        @endif

		@if(Gate::allows('view', $reply->user))
            <a href="{{ route('admin.admin.user.show', $reply->user_id) }}" class="ajax-modal-btn small">{{ $reply->user->getName() }}</a>
		@else
			<span class="small">{{ $reply->user->getName() }}</span>
		@endif
	</div>

	<div class="col-md-11">
		<blockquote style="font-size: 1em;">
    		{!! $reply->reply !!}
			<footer>{{ $reply->user->getName() }} | {{ $reply->updated_at->diffForHumans() }}
				@if(count($reply->attachments))
					<div class="pull-right no-print">
						{{ trans('app.attachments') . ': ' }}
						@foreach($reply->attachments as $attachment)
				            <a href="{{ route('attachment.download', $attachment) }}"><i class="fa fa-file"></i></a>
						@endforeach
					</div>
				@endif
			</footer>
    	</blockquote>
	</div>
</div>