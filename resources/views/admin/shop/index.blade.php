@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Shop::class)
		<a href="{{ route('admin.merchant.shop.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_shop') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.shops') }}</h3>
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
						<th>{{ trans('app.owner') }}</th>
						<th>{{ trans('app.email') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($shops as $shop )
					<tr>
						<td>
							<img src="{{ get_image_src($shop->id, 'shops', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $shop->name }}</td>
						<td>{{ $shop->owner->name }}</td>
						<td>{{ $shop->email }}</td>
						<td>{{ ($shop->active) ? trans('app.active') : trans('app.inactive') }}</td>
						<td class="row-options">
							@can('view', $shop)
								<a href="{{ route('admin.merchant.shop.show', $shop->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;

								<a href="{{ route('admin.merchant.shop.staffs', $shop->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.staffs') }}" class="fa fa-users"></i></a>&nbsp;
							@endcan

							@can('secretLogin', $shop->owner)
								<a href="{{ route('admin.user.secretLogin', $shop->owner->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.secret_login_merchant') }}" class="fa fa-user-secret"></i></a>&nbsp;
							@endcan

							@can('update', $shop)
								<a href="{{ route('admin.merchant.shop.edit', $shop->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

								@if($shop->primaryAddress)
									<a href="{{ route('address.edit', $shop->primaryAddress->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.update_address') }}" class="fa fa-map-marker"></i></a>&nbsp;
								@else
									<a href="{{ route('address.create', ['shop', $shop->id]) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.add_address') }}" class="fa fa-plus-square-o"></i></a>&nbsp;
								@endif
							@endcan

							@can('delete', $shop)
								{!! Form::open(['route' => ['admin.merchant.shop.trash', $shop->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.logo') }}</th>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.email') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
							<img src="{{ get_image_src($trash->id, 'shops', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
						</td>
						<td>{{ $trash->name }}</td>
						<td>{{ $trash->email }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.merchant.shop.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.merchant.shop.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
