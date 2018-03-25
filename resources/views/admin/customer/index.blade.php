@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Customer::class)
		<a href="{{ route('admin.exim', 'customers') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.exim') }}</a>

		<a href="{{ route('admin.admin.customer.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_customer') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.customers') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-2nd-short">
	        <thead>
	        <tr>
	          <th>{{ trans('app.nice_name') }}</th>
	          <th>{{ trans('app.full_name') }}</th>
	          <th>{{ trans('app.email') }}</th>
	          <th>{{ trans('app.orders') }}</th>
	          <th>{{ trans('app.status') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($customers as $customer )
				<tr>
					<td>
			            @if($customer->image)
							<img src="{{ get_storage_file_url(optional($customer->image)->path, 'tiny') }}" class="img-circle" alt="{{ trans('app.avatar') }}">
			            @else
		            		<img src="{{ get_gravatar_url($customer->email, 'tiny') }}" class="img-circle" alt="{{ trans('app.avatar') }}">
			            @endif
						<p class="indent10">
							{{ $customer->nice_name }}
						</p>
					</td>
			        <td>{{ $customer->name }}</td>
			        <td>{{ $customer->email }}</td>
					<td>
						<span class="label label-default">{{ $customer->orders_count }}</span>
					</td>
			        <td>{{ ($customer->active) ? trans('app.active') : trans('app.inactive') }}</td>
			        <td class="row-options">
						@can('view', $customer)
		                    <a href="{{ route('admin.admin.customer.show', $customer->id) }}" class="ajax-modal-btn modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.profile') }}" class="fa fa-user-circle-o"></i></a>&nbsp;
						@endcan

						@can('update', $customer)
		                    <a href="{{ route('admin.admin.customer.edit', $customer->id) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
						@endcan

						@can('view', $customer)
							@if($customer->hasAddress())
								<a href="{{ route('address.addresses', ['customer', $customer->id]) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.show_addresses') }}" class="fa fa-address-card-o"></i></a>&nbsp;
							@else
								<a href="{{ route('address.create', ['customer', $customer->id]) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.add_address') }}" class="fa fa-plus-square-o"></i></a>&nbsp;
							@endif
						@endcan

						@can('delete', $customer)
		                    {!! Form::open(['route' => ['admin.admin.customer.trash', $customer->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
	          <th>{{ trans('app.nice_name') }}</th>
	          <th>{{ trans('app.full_name') }}</th>
	          <th>{{ trans('app.email') }}</th>
	          <th>{{ trans('app.deleted_at') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($trashes as $trash )
			        <tr>
			          <td>
						<img src="{{ get_storage_file_url(optional($trash->image)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
						<p class="indent10">
							{{ $trash->nice_name }}
						</p>
			          </td>
			          <td>{{ $trash->name }}</td>
			          <td>{{ $trash->email }}</td>
			          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
			          <td class="row-options">
						@can('delete', $trash)
		                    <a href="{{ route('admin.admin.customer.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

		                    {!! Form::open(['route' => ['admin.admin.customer.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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