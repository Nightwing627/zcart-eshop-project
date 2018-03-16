@extends('admin.layouts.master')

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.disputes') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-short">
				<thead>
					<tr>
						<th>{{ trans('app.customer') }}</th>
						<th>{{ trans('app.type') }}</th>
						<th>{{ trans('app.response') }}</th>
						<th>{{ trans('app.updated_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($disputes as $dispute )
						<tr>
							<td>
								<img src="{{ get_image_src($dispute->customer_id, 'customers', 'small') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}"> &nbsp;
								<strong>
									{{ $dispute->customer->name }}
								</strong>
	    						@if (Auth::user()->isFromPlatform())
									 <br><span>{{ $dispute->shop->name }}</span>
								@endif
							</td>
							<td>
	    						@if (!Auth::user()->isFromPlatform())
									{!! $dispute->statusName() !!}
								@endif
								{{ $dispute->dispute_type->detail }}
							</td>
							<td><span class="label label-default">{{ $dispute->replies_count }}</span></td>
				          	<td>{{ $dispute->updated_at->diffForHumans() }}</td>
							<td class="row-options">
								@can('view', $dispute)
									<a href="{{ route('admin.support.dispute.show', $dispute->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;
								@endcan

								@can('response', $dispute)
									<a href="{{ route('admin.support.dispute.response', $dispute) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.response') }}" class="fa fa-reply"></i></a>&nbsp;
								@endcan
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection