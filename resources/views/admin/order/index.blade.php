@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('admin.order.order.searchCutomer') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_order') }}</a>
@endsection

@section('content')

	@include('admin.partials._filter')

	<div class="box">
		<div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-cart-arrow-down"></i> {{ trans('app.orders') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-2nd-short">
				<thead>
					<tr>
						<th>{{ trans('app.order_number') }}</th>
						<th>{{ trans('app.order_date') }}</th>
						<th>{{ trans('app.customer') }}</th>
						<th>{{ trans('app.grand_total') }}</th>
						<th>{{ trans('app.payment') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order )
					<tr>
						<td>{{ $order->order_number }}</td>
				        <td>{{ $order->created_at->toDayDateTimeString() }}</td>
						<td>{{ $order->customer->name }}</td>
						<td>{{ get_formated_currency($order->grand_total )}}</td>
						<td>{{ $order->paymentStatus->name }}</td>
						<td>{{ $order->status->name }}</td>
						<td class="row-options">
							<a href="{{ route('admin.order.order.show', $order->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;

							<a href="{{ route('admin.order.order.edit', $order->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

							{!! Form::open(['route' => ['admin.order.order.trash', $order->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.order_number') }}</th>
						<th>{{ trans('app.order_date') }}</th>
						<th>{{ trans('app.customer') }}</th>
						<th>{{ trans('app.grand_total') }}</th>
						<th>{{ trans('app.payment') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($archives as $archive )
					<tr>
						<td>{{ get_formated_order_number($archive->id) }}</td>
				        <td>{{ $archive->created_at->toDayDateTimeString() }}</td>
						<td>{{ $archive->customer->name }}</td>
						<td>{{ $archive->amount_total }}</td>
						<td>{{ $archive->payment_method }}</td>
						<td>{{ $archive->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							<a href="{{ route('admin.order.order.restore', $archive->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection
