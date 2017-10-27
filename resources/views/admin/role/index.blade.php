@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('admin.utility.role.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_role') }}</a>
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.roles') }}</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div> <!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th>{{ trans('app.name') }}</th>
						<th style="width: 60%;">{{ trans('app.access_control') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($roles as $role )
						<td>
				          	<h5>{{ $role->name }}</h5>
				          	@if($role->description)
					          	<p class="excerpt-td small">{!! $role->description !!}</p>
				          	@endif
						</td>
						<td>
							@foreach($role->permissions as $permission)
								<span class="label label-outline">{{ str_replace('_', ' ', title_case($permission->slug)) }}</span>
							@endforeach
						</td>
						<td>{{ ($role->public) ? trans('app.public') : trans('app.restricted') }}</td>
						<td class="row-options">
							<a href="{{ route('admin.utility.role.show', $role->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;

							<a href="{{ route('admin.utility.role.edit', $role) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

							{!! Form::open(['route' => ['admin.utility.role.trash', $role->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
						<th>{{ trans('app.name') }}</th>
						<th style="width: 40%;">{{ trans('app.access_control') }}</th>
						<th>{{ trans('app.status') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>
				          	<h5>{{ $trash->name }}</h5>
				          	@if($trash->description)
					          	<p class="excerpt-td small">{!! $trash->description !!}</p>
				          	@endif
						</td>
						<td>{{ '' }}</td>
						<td>{{ ($trash->public) ? trans('app.public') : trans('app.restricted') }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							<a href="{{ route('admin.utility.role.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;
							{!! Form::open(['route' => ['admin.utility.role.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
