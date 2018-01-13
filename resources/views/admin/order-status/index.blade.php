@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\OrderStatus::class)
		<a href="{{ route('admin.utility.orderStatus.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_status') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.order_statuses') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.color') }}</th>
						<th>{{ trans('app.appearance') }}</th>
						<th>{{ trans('app.send_email_to_customer') }}</th>
						<th>{{ trans('app.email_template') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($statuses as $status )
					<tr>
						<td>{{ $status->name }}</td>
						<td>{{ $status->label_color }}</td>
						<td>
							<span class="label label-outline" style="background-color: {{ $status->label_color }}">
								{{ strToupper($status->name) }}
							</span>
						</td>
						<td class='text-center'>
							<i class="fa fa-{{ $status->send_email_to_customer ? 'check' : '-'}}"></i>
						</td>
						<td>{{ ($status->email_template_id) ? $status->emailTemplate->name : '' }}</td>
						<td class="row-options">
							@can('update', $status)
								<a href="{{ route('admin.utility.orderStatus.edit', $status->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan

							@can('delete', $status)
								{!! Form::open(['route' => ['admin.utility.orderStatus.trash', $status->id], 'method' => 'delete', 'class' => 'data-form']) !!}
									{!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
								{!! Form::close() !!}
							@endcan
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->

	<div class="box collapsed-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-trash-o"></i>{{ trans('app.trash') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.color') }}</th>
						<th>{{ trans('app.appearance') }}</th>
						<th>{{ trans('app.send_email_to_customer') }}</th>
						<th>{{ trans('app.email_template') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>{{ $trash->name }}</td>
						<td>{{ $trash->label_color }}</td>
						<td>
							<span class="label label-outline" style="background-color: {{ $trash->label_color }}">
								{{ $trash->name }}
							</span>
						</td>
						<td>{{ ($trash->send_email_to_customer == 1) ? trans('app.yes') : trans('app.no') }}</td>
						<td>{{ ($trash->email_template_id) ? $trash->emailTemplate->name : '' }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.utility.orderStatus.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.utility.orderStatus.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
									{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
								{!! Form::close() !!}
							@endcan
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection