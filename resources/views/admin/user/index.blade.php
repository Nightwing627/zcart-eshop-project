@extends('admin.layouts.master')

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.users') }}</h3>
	      <div class="box-tools pull-right">
			@can('create', App\User::class)
				<a href="javascript:void(0)" data-link="{{ route('admin.admin.user.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_user') }}</a>
			@endcan
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
			<table class="table table-hover table-2nd-short">
				<thead>
					<tr>
					  <th>{{ trans('app.nice_name') }}</th>
					  <th>{{ trans('app.full_name') }}</th>
					  <th>{{ trans('app.email') }}</th>
					  <th>{{ trans('app.role') }}</th>
					  <th>{{ trans('app.status') }}</th>
					  <th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($users as $user )
				        <tr>
							<td>
			            		<img src="{{ get_avatar_src($user, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.avatar') }}">
								<p class="indent10">
									<a href="javascript:void(0)" data-link="{{ route('admin.admin.user.show', $user->id) }}" class="ajax-modal-btn">
										{{ $user->nice_name }}
									</a>
								</p>
							</td>
							<td>
								<a href="javascript:void(0)" data-link="{{ route('admin.admin.user.show', $user->id) }}" class="ajax-modal-btn">
									{{ $user->name }}
								</a>
							</td>
							<td>{{ $user->email }}</td>
							<td>
								<span class="label label-outline">{{ optional($user->role)->name }}</span>
							</td>
				          <td>{{ ($user->active) ? trans('app.active') : trans('app.inactive') }}</td>
				          <td class="row-options">
							@can('secretLogin', $user)
								<a href="{{ route('admin.user.secretLogin', $user) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.secret_login_user') }}" class="fa fa-user-secret"></i></a>&nbsp;
							@endcan

							@can('update', $user)
					            <a href="javascript:void(0)" data-link="{{ route('admin.admin.user.edit', $user->id) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

							    <a href="javascript:void(0)" data-link="{{ route('admin.admin.user.changePassword', $user->id) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.change_password') }}" class="fa fa-lock"></i></a>&nbsp;

								@if($user->primaryAddress)
									<a href="javascript:void(0)" data-link="{{ route('address.edit', $user->primaryAddress->id) }}" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.update_address') }}" class="fa fa-map-marker"></i></a>&nbsp;
								@else
									<a href="javascript:void(0)" data-link="{{ route('address.create', ['user', $user->id]) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.add_address') }}" class="fa fa-plus-square-o"></i></a>&nbsp;
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
								<p class="indent10">
									{{ $trash->nice_name }}
								</p>
							</td>
					        <td>{{ $trash->name }}</td>
					        <td>{{ $trash->email }}</td>
					        <td>
					        	<span class="label label-outline">{{ $trash->role->name or '' }}</span>
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