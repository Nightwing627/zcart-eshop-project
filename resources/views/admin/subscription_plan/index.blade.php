@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\SubscriptionPlan::class)
		<a href="{{ route('admin.setting.subscriptionPlan.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_subscription_plan') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.subscription_plans') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-no-option">
				<thead>
					<tr>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.cost_per_month') }}</th>
						<th>{{ trans('app.team_size') }}</th>
						<th>{{ trans('app.inventory_limit') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($subscription_plans as $subscriptionPlan )
						<tr>
							<td>
								{{ $subscriptionPlan->name }}
								@if($subscriptionPlan->featured)
									<span class="label label-primary indent10">{{ trans('app.featured') }}</span>
								@endif
							</td>
							<td>{{ get_formated_currency($subscriptionPlan->cost) }}</td>
							<td>{{ $subscriptionPlan->team_size }}</td>
							<td>{{ $subscriptionPlan->inventory_limit }}</td>
							<td class="row-options">
								@can('view', $subscriptionPlan)
									<a href="{{ route('admin.setting.subscriptionPlan.show', $subscriptionPlan->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;
								@endcan

								@can('update', $subscriptionPlan)
									<a href="{{ route('admin.setting.subscriptionPlan.edit', $subscriptionPlan->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
								@endcan

								@can('delete', $subscriptionPlan)
									{!! Form::open(['route' => ['admin.setting.subscriptionPlan.trash', $subscriptionPlan->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
			<table class="table table-hover table-no-option">
				<thead>
					<tr>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.cost_per_month') }}</th>
						<th>{{ trans('app.team_size') }}</th>
						<th>{{ trans('app.inventory_limit') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>{{ $trash->name }}</td>
						<td>{{ get_formated_currency($trash->cost) }}</td>
						<td>{{ $trash->team_size }}</td>
						<td>{{ $trash->inventory_limit }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.setting.subscriptionPlan.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.setting.subscriptionPlan.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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