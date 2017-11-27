@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Carrier::class)
		<a href="{{ route('admin.exim', 'carriers') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

		<a href="{{ route('admin.shipping.carrier.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_carrier') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.carriers') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-short">
				<thead>
					<tr>
						<th>{{ trans('app.logo') }}</th>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.standard_delivery_time') }}</th>
						<th class="text-center">{{ trans('app.free_shipping') }}</th>
						<th class="text-center">{{ trans('app.handling_cost') }}</th>
						<th class="text-center">{{ trans('app.active') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($carriers as $carrier )
					<tr>
						<td>
							<img src="{{ get_image_src($carrier->id, 'carriers', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $carrier->name }}</td>
						<td>{{ $carrier->std_delivery_time .' ' }} {{ ($carrier->std_delivery_time > 1) ? $carrier->time_unit : str_singular($carrier->time_unit) }}</td>
						<td class="text-center">
							{{ ($carrier->is_free) ? trans('app.yes') : '-'}}
						</td>
						<td class="text-center">
							{{ ($carrier->handling_cost) ? trans('app.yes') : '-'}}
						</td>
						<td class="text-center">
							{{ ($carrier->active) ? trans('app.yes') : '-'}}
						</td>
						<td class="row-options">
							@can('view', $carrier)
								<a href="{{ route('admin.shipping.carrier.show', $carrier->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;
							@endcan
							@can('update', $carrier)
								<a href="{{ route('admin.shipping.carrier.edit', $carrier->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan
							@can('delete', $carrier)
								{!! Form::open(['route' => ['admin.shipping.carrier.trash', $carrier->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
			<table class="table table-hover table-2nd-short">
				<thead>
					<tr>
						<th>{{ trans('app.image') }}</th>
						<th>{{ trans('app.email') }}</th>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.tracking_url') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
							<img src="{{ get_image_src($trash->id, 'carriers', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $trash->name }}</td>
						<td>{{ $trash->email }}</td>
						<td>{{ $trash->tracking_url }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.shipping.carrier.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.shipping.carrier.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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