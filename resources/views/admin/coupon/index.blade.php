@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Coupon::class)
		<a href="{{ route('admin.promotion.coupon.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_coupon') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.coupons') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-short">
				<thead>
					<tr>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.code') }}</th>
						<th>{{ trans('app.value') }}</th>
						<th>{{ trans('app.starting_time') }}</th>
						<th>{{ trans('app.ending_time') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($coupons as $coupon )
					<tr>
						<td>{{ $coupon->name }}</td>
						<td>{{ $coupon->code }}</td>
						<td>
							{{ $coupon->type == 'amount' ? get_formated_currency($coupon->value) : get_formated_decimal($coupon->value) . ' ' . trans('app.percent') }}
						</td>
						<td>{{ $coupon->starting_time ? $coupon->starting_time->toDayDateTimeString() : '' }}</td>
						<td>{{ $coupon->ending_time ? $coupon->ending_time->toDayDateTimeString() : '' }}</td>
						<td>
							@if($coupon->ending_time < \Carbon\Carbon::now())
								{{ trans('app.expired') }}
							@else
								{{ ($coupon->active) ? trans('app.active') : trans('app.inactive') }}
							@endif
						</td>
						<td class="row-options">
							@can('view', $coupon)
								<a href="{{ route('admin.promotion.coupon.show', $coupon->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;
							@endcan

							@can('update', $coupon)
								<a href="{{ route('admin.promotion.coupon.edit', $coupon->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan

							@can('delete', $coupon)
								{!! Form::open(['route' => ['admin.promotion.coupon.trash', $coupon->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.code') }}</th>
						<th>{{ trans('app.value') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>{{ $trash->name }}</td>
						<td>
							{{ $trash->code }}
							@if($trash->ending_time < \Carbon\Carbon::now())
								({{ trans('app.expired') }})
							@endif
						</td>
						<td>
							{{ $trash->type == 'amount' ? get_formated_currency($trash->value) : get_formated_decimal($trash->value) . ' ' . trans('app.percent') }}
						</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.promotion.coupon.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.promotion.coupon.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
