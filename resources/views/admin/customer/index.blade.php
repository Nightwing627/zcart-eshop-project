@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('admin.exim', 'customers') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

	<a href="{{ route('admin.admin.customer.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_customer') }}</a>
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
	          <th>{{ trans('app.avatar') }}</th>
	          <th>{{ trans('app.nice_name') }}</th>
	          <th>{{ trans('app.full_name') }}</th>
	          <th>{{ trans('app.email') }}</th>
	          <th>{{ trans('app.status') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($customers as $customer )
			          <td>
						<img src="{{ get_image_src($customer->id, 'customers', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
			          </td>
			          <td>{{ $customer->nice_name }}</td>
			          <td>{{ $customer->name }}</td>
			          <td>{{ $customer->email }}</td>
			          <td>{{ ($customer->active) ? trans('app.active') : trans('app.inactive') }}</td>
			          <td class="row-options">
	                    <a href="{{ route('admin.admin.customer.show', $customer->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.profile') }}" class="fa fa-user-secret"></i></a>&nbsp;

	                    <a href="{{ route('admin.admin.customer.edit', $customer->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

						<a href="{{ route('address.addresses', ['customer', $customer->id]) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.show_addresses') }}" class="fa fa-address-card-o"></i></a>&nbsp;

	                    {!! Form::open(['route' => ['admin.admin.customer.trash', $customer->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
	          <th>{{ trans('app.avatar') }}</th>
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
						<img src="{{ get_image_src($trash->id, 'customers', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
			          </td>
			          <td>{{ $trash->nice_name }}</td>
			          <td>{{ $trash->name }}</td>
			          <td>{{ $trash->email }}</td>
			          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
			          <td class="row-options">
	                    <a href="{{ route('admin.admin.customer.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

	                    {!! Form::open(['route' => ['admin.admin.customer.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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