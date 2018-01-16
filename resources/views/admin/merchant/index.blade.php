@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Merchant::class)
		<a href="{{ route('admin.vendor.merchant.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_merchant') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.merchants') }}</h3>
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
					  <th>{{ trans('app.shop') }}</th>
					  <th>{{ trans('app.status') }}</th>
					  <th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($merchants as $merchant )
				        <tr>
				          <td>
							<img src="{{ get_image_src($merchant->id, 'users', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
				          </td>
				          <td>{{ $merchant->nice_name }}</td>
				          <td>{{ $merchant->name }}</td>
				          <td>{{ $merchant->email }}</td>
				          <td>
				          	@if($merchant->owns)
					            <a href="{{ route('admin.vendor.shop.show', $merchant->owns->id) }}" class="ajax-modal-btn">
									<img src="{{ get_image_src($merchant->owns->id, 'shops', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">&nbsp;
						          	<span class="label label-outline">{{ $merchant->owns->name }}</span>
						          </a>
				          	@endif
				          </td>
				          <td>{{ ($merchant->active) ? trans('app.active') : trans('app.inactive') }}</td>
				          <td class="row-options">
							@can('view', $merchant)
					            <a href="{{ route('admin.vendor.merchant.show', $merchant->id) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-user-circle-o"></i></a>&nbsp;
							@endcan

							@can('secretLogin', $merchant)
								<a href="{{ route('admin.user.secretLogin', $merchant) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.secret_login_user') }}" class="fa fa-user-secret"></i></a>&nbsp;
							@endcan

							@can('update', $merchant)
					            <a href="{{ route('admin.vendor.merchant.edit', $merchant->id) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

								@if($merchant->primaryAddress)
									<a href="{{ route('address.edit', $merchant->primaryAddress->id) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.update_address') }}" class="fa fa-map-marker"></i></a>&nbsp;
								@else
									<a href="{{ route('address.create', ['merchant', $merchant->id]) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.add_address') }}" class="fa fa-plus-square-o"></i></a>&nbsp;
								@endif
							@endcan

							@can('delete', $merchant)
					            {!! Form::open(['route' => ['admin.vendor.merchant.trash', $merchant->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
		          <th>{{ trans('app.avatar') }}</th>
		          <th>{{ trans('app.nice_name') }}</th>
		          <th>{{ trans('app.full_name') }}</th>
		          <th>{{ trans('app.email') }}</th>
		          <th>{{ trans('app.shop') }}</th>
		          <th>{{ trans('app.deleted_at') }}</th>
		          <th>{{ trans('app.option') }}</th>
		        </tr>
		        </thead>
		        <tbody>
			        @foreach($trashes as $trash )
				        <tr>
				          	<td>
								<img src="{{ get_image_src($trash->id, 'users', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
							</td>
					        <td>{{ $trash->nice_name }}</td>
					        <td>{{ $trash->name }}</td>
					        <td>{{ $trash->email }}</td>
					        <td>
					        	<span class="label label-outline">{{ $trash->shop->name or '' }}</span>
				          	</td>
				          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
				          <td class="row-options">
							@can('delete', $trash)
			                    <a href="{{ route('admin.vendor.merchant.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

			                    {!! Form::open(['route' => ['admin.vendor.merchant.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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