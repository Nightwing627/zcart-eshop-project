@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('admin.exim', 'warehouse') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

	<a href="{{ route('admin.stock.warehouse.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_warehouse') }}</a>
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.warehouses') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-short">
				<thead>
					<tr>
						<th>{{ trans('app.image') }}</th>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.email') }}</th>
						<th>{{ trans('app.incharge') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($warehouses as $warehouse )
					<tr>
						<td>
							<img src="{{ get_image_src($warehouse->id, 'warehouses', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>
							{{ $warehouse->name }}
						</td>
						<td>
							{{ $warehouse->email }}
						</td>
						<td>
							{{ $warehouse->manager->name or '' }}
						</td>
						<td>
							{{ ($warehouse->active) ? trans('app.active') : trans('app.inactive') }}
						</td>
						<td class="row-options">
							<a href="{{ route('admin.stock.warehouse.show', $warehouse->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;

							<a href="{{ route('admin.stock.warehouse.edit', $warehouse->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

							@if($warehouse->primaryAddress)
								<a href="{{ route('address.edit', $warehouse->primaryAddress->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.update_address') }}" class="fa fa-map-marker"></i></a>&nbsp;
							@else
								<a href="{{ route('address.create', ['warehouse', $warehouse->id]) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.add_address') }}" class="fa fa-plus-square-o"></i></a>&nbsp;
							@endif

							{!! Form::open(['route' => ['admin.stock.warehouse.trash', $warehouse->id], 'method' => 'delete', 'class' => 'data-form']) !!}

								{!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}

							{!! Form::close() !!}
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
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.email') }}</th>
						<th>{{ trans('app.incharge') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
							<img src="{{ get_image_src($trash->id, 'warehouses', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>
							{{ $trash->name }}
						</td>
						<td>
							{{ $trash->email }}
						</td>
						<td>
							{{ $trash->manager->name or '' }}
						</td>
						<td>
							{{ $trash->deleted_at->diffForHumans() }}
						</td>
						<td class="row-options">
							<a href="{{ route('admin.stock.warehouse.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;
							{!! Form::open(['route' => ['admin.stock.warehouse.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
							{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection
