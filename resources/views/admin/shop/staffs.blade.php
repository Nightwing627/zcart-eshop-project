@extends('admin.layouts.master')

@section('buttons')
	@can('index', App\Shop::class)
		<a href="{{ route('admin.vendor.shop.index') }}" class="btn btn-new btn-flat">{{ trans('app.shops') }}</a>
	@endcan
@endsection

@section('content')

    @include('admin.partials._shop_widget')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.staffs') }}</h3>
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
					  <th>{{ trans('app.role') }}</th>
					  <th>{{ trans('app.status') }}</th>
					  <th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($staffs as $user )
				        <tr>
				          <td>
				            @if($user->image)
								<img src="{{ get_storage_file_url(optional($user->image)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
				            @else
			            		<img src="{{ get_gravatar_url($user->email, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
				            @endif
				          </td>
				          <td>{{ $user->nice_name }}</td>
				          <td>{{ $user->name }}</td>
				          <td>{{ $user->email }}</td>
				          <td>
					          	<span class="label label-outline">{{ $user->role->name }}</span>
				          </td>
				          <td>{{ ($user->active) ? trans('app.active') : trans('app.inactive') }}</td>
				          <td class="row-options">
							@can('view', $user)
				        	    <a href="{{ route('admin.admin.user.show', $user->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-user-circle-o"></i></a>&nbsp;
							@endcan

							@can('secretLogin', $user)
								<a href="{{ route('admin.user.secretLogin', $user) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.secret_login_user') }}" class="fa fa-user-secret"></i></a>&nbsp;
							@endcan

							@can('update', $user)
				            	<a href="{{ route('admin.admin.user.edit', $user->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

								@if($user->primaryAddress)
									<a href="{{ route('address.edit', $user->primaryAddress->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.update_address') }}" class="fa fa-map-marker"></i></a>&nbsp;
								@else
									<a href="{{ route('address.create', ['user', $user->id]) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.add_address') }}" class="fa fa-plus-square-o"></i></a>&nbsp;
								@endif
							@endcan

							@can('delete', $user)
					            {!! Form::open(['route' => ['admin.admin.user.trash', $user->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
		          <th>{{ trans('app.role') }}</th>
		          <th>{{ trans('app.deleted_at') }}</th>
		          <th>{{ trans('app.option') }}</th>
		        </tr>
		        </thead>
		        <tbody>
			        @foreach($trashes as $trash )
				        <tr>
				          <td>
							<img src="{{ get_storage_file_url(optional($trash->image)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
						  </td>
				          <td>{{ $trash->nice_name }}</td>
				          <td>{{ $trash->name }}</td>
				          <td>{{ $trash->email }}</td>
				          <td>
					          	<span class="label label-outline">{{ $user->role->name }}</span>
				          </td>
				          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
				          <td class="row-options">
							@can('delete', $trash)
			                    <a href="{{ route('admin.admin.user.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

			                    {!! Form::open(['route' => ['admin.admin.user.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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