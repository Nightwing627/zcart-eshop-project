@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('admin.utility.paymentMethod.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_payment_method') }}</a>
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.payment_methods') }}</h3>
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
						<th>{{ trans('app.company_name') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($payment_methods as $payment_method )
					<tr>
						<td>
							<img src="{{ get_image_src($payment_method->id, 'payment-methods', '150x150') }}" class="img-circle img-md" alt="{{ trans('app.logo') }}">
						</td>
						<td>
							<h5>{{ $payment_method->name }}</h5>
				          	@if($payment_method->description)
					          	<p class="excerpt-td small">{!! str_limit($payment_method->description, 150) !!}</p>
				          	@endif
						</td>
						<td>{{ $payment_method->company_name }}</td>
						<td>{{ ($payment_method->active) ? trans('app.active') : trans('app.inactive') }}</td>
						<td class="row-options">
				          	@if($payment_method->website)
								<a href="{{ $payment_method->website }}" target="_blank"><i data-toggle="tooltip" data-placement="top" title="{{ trans('help.website') }}" class="fa fa-link"></i></a>&nbsp;
				          	@endif
				          	@if($payment_method->help_doc_link)
								<a href="{{ $payment_method->help_doc_link }}" target="_blank"><i data-toggle="tooltip" data-placement="top" title="{{ trans('help.help_doc_link') }}" class="fa fa-file-o"></i></a>&nbsp;
				          	@endif

							<a href="{{ route('admin.utility.paymentMethod.edit', $payment_method->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

							{!! Form::open(['route' => ['admin.utility.paymentMethod.trash', $payment_method->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th>{{ trans('app.logo') }}</th>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.company_name') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
							<img src="{{ get_image_src($trash->id, 'payment-methods', '150x150') }}" class="img-circle img-md" alt="{{ trans('app.logo') }}">
						</td>
						<td>
							<h5>{{ $trash->name }}</h5>
				          	@if($trash->description)
					          	<p class="excerpt-td small">{!! str_limit($trash->description, 150) !!}</p>
				          	@endif
						</td>
						<td>{{ $trash->company_name }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							<a href="{{ route('admin.utility.paymentMethod.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

							{!! Form::open(['route' => ['admin.utility.paymentMethod.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
