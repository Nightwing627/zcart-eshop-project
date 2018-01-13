@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Packaging::class)
		<a href="{{ route('admin.shipping.packaging.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_packaging') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.packagings') }}</h3>
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
						<th>{{ trans('app.cost') }}</th>
						<th class="text-center">{{ trans('app.packaging_charge_customer') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($packagings as $packaging )
					<tr>
						<td>
							<img src="{{ get_image_src($packaging->id, 'packagings', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $packaging->name }}</td>
						<td>{{ get_formated_currency($packaging->cost) }}</td>
						<td class="text-center">
							{{ ($packaging->charge_customer) ? trans('app.yes') : '-'}}
						</td>
						<td class="row-options">
							@can('update', $packaging)
								<a href="{{ route('admin.shipping.packaging.edit', $packaging->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan

							@can('delete', $packaging)
								{!! Form::open(['route' => ['admin.shipping.packaging.trash', $packaging->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.cost') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
							<img src="{{ get_image_src($trash->id, 'packagings', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $trash->name }}</td>
						<td>{{ get_formated_currency($trash->cost) }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.shipping.packaging.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.shipping.packaging.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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