@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('admin.exim', 'products') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

	<a href="{{ route('admin.catalog.product.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_product') }}</a>
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.products') }}</h3>
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
						<th>{{ trans('app.gtin') }}</th>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.model_number') }}</th>
						<th>{{ trans('app.category') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product )
					<tr>
						<td>
							<img src="{{ get_image_src($product->id, 'products', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $product->gtin }}</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->model_number }}</td>
						<td>
							@foreach($product->categories as $category)
								<span class="label label-outline">{{ $category->name }}</span>
							@endforeach
						</td>
						<td>{{ ($product->active) ? trans('app.active') : trans('app.inactive') }}</td>
						<td class="row-options">
							<a href="{{ route('admin.catalog.product.show', $product->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;

							<a href="{{ route('admin.catalog.product.edit', $product->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

							{!! Form::open(['route' => ['admin.catalog.product.trash', $product->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.model_number') }}</th>
						<th>{{ trans('app.category') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
							<img src="{{ get_image_src($trash->id, 'products', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $trash->name }}</td>
						<td>{{ $trash->model_number }}</td>
						<td>
							@foreach($trash->categories as $category)
							<span class="label label-outline">{{ $category->name }}</span>
							@endforeach
						</td>
						<td class="row-options">
							<a href="{{ route('admin.catalog.product.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;
							{!! Form::open(['route' => ['admin.catalog.product.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
