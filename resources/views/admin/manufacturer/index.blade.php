@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Manufacturer::class)
		<a href="{{ route('admin.exim', 'manufacturers') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

		<a href="{{ route('admin.catalog.manufacturer.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_manufacturer') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.manufacturers') }}</h3>
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
						<th>{{ trans('app.phone') }}</th>
						<th>{{ trans('app.email') }}</th>
						<th>{{ trans('app.country') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($manufacturers as $manufacturer )
					<tr>
						<td>
							<img src="{{ get_image_src($manufacturer->id, 'manufacturers', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $manufacturer->name }}</td>
						<td>{{ $manufacturer->phone }}</td>
						<td>{{ $manufacturer->email }}</td>
						<td>{{ $manufacturer->country->name or '' }}</td>
						<td>{{ ($manufacturer->active) ? trans('app.active') : trans('app.inactive') }}</td>
						<td class="row-options">
							@can('view', $manufacturer)
								<a href="{{ route('admin.catalog.manufacturer.show', $manufacturer->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;
							@endcan

							@can('update', $manufacturer)
								<a href="{{ route('admin.catalog.manufacturer.edit', $manufacturer->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan

							@can('delete', $manufacturer)
								{!! Form::open(['route' => ['admin.catalog.manufacturer.trash', $manufacturer->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.phone') }}</th>
						<th>{{ trans('app.email') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
							<img src="{{ get_image_src($trash->id, 'manufacturers', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $trash->name }}</td>
						<td>{{ $trash->phone }}</td>
						<td>{{ $trash->email }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.catalog.manufacturer.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.catalog.manufacturer.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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

