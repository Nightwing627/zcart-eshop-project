@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\EmailTemplate::class)
		<a href="{{ route('admin.exim', 'email-template') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

		<a href="{{ route('admin.setting.emailTemplate.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_template') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('app.email_templates') }}</h3>
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
						<th>{{ trans('app.subject') }}</th>
						<th>{{ trans('app.sender_email') }}</th>
						<th>{{ trans('app.type') }}</th>
						<th>{{ trans('app.template_for') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($templates as $template )
					<tr>
						<td>{{ $template->name }}</td>
						<td>{{ $template->subject }}</td>
						<td>{{ $template->sender_email }}</td>
						<td>{{ $template->type }}</td>
						<td>{{ $template->template_for }}</td>
						<td class="row-options">
							@can('update', $template)
								<a href="{{ route('admin.setting.emailTemplate.edit', $template->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan

							@can('delete', $template)
								{!! Form::open(['route' => ['admin.setting.emailTemplate.trash', $template->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
			<table class="table table-hover table-option">
				<thead>
					<tr>
						<th>{{ trans('app.name') }}</th>
						<th>{{ trans('app.subject') }}</th>
						<th>{{ trans('app.sender_email') }}</th>
						<th>{{ trans('app.type') }}</th>
						<th>{{ trans('app.deleted_at') }}</th>
						<th>{{ trans('app.option') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashes as $trash )
					<tr>
						<td>{{ $trash->name }}</td>
						<td>{{ $trash->subject }}</td>
						<td>{{ $trash->sender_email }}</td>
						<td>{{ $trash->type }}</td>
						<td>{{ $trash->deleted_at->diffForHumans() }}</td>
						<td class="row-options">
							@can('delete', $trash)
								<a href="{{ route('admin.setting.emailTemplate.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

								{!! Form::open(['route' => ['admin.setting.emailTemplate.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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