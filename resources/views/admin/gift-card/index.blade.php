@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\GiftCard::class)
		<a href="{{ route('admin.exim', 'gift-card') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

		<a href="{{ route('admin.promotion.giftCard.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_gift_card') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.gift_cards') }}</h3>
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
						<th>{{ trans('app.pin_code') }}</th>
						<th>{{ trans('app.serial_number') }}</th>
						<th>{{ trans('app.value') }}</th>
						<th>{{ trans('app.activation_time') }}</th>
						<th>{{ trans('app.expiry_time') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($gift_cards as $card )
					<tr>
						<td>{{ $card->name }}</td>
						<td>{{ $card->pin_code }}</td>
						<td>{{ $card->serial_number }}</td>
						<td>{{ get_formated_currency($card->value) }}</td>
						<td>
							{{ $card->activation_time ? $card->activation_time->toDayDateTimeString() : '' }}
						</td>
						<td>{{ $card->expiry_time ? $card->expiry_time->toDayDateTimeString() : '' }}</td>
						<td>
							@if($card->expiry_time < \Carbon\Carbon::now())
								{{ trans('app.expired') }}
							@else
								{{ ($card->active) ? trans('app.active') : trans('app.inactive') }}
							@endif
						</td>
						<td class="row-options">
							@can('view', $card)
								<a href="{{ route('admin.promotion.giftCard.show', $card->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;
							@endcan

							@can('update', $card)
								<a href="{{ route('admin.promotion.giftCard.edit', $card->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan

							@can('delete', $card)
								{!! Form::open(['route' => ['admin.promotion.giftCard.trash', $card->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.serial_number') }}</th>
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
							{{ $trash->serial_number }}
							@if($trash->expiry_time < \Carbon\Carbon::now())
								({{ trans('app.expired') }})
							@endif
						</td>
						<td>{{ get_formated_currency($trash->value) }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.promotion.giftCard.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.promotion.giftCard.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
