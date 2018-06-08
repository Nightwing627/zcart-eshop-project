@extends('admin.layouts.master')

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.announcements') }}</h3>
	      <div class="box-tools pull-right">
				<a href="{{ route('admin.setting.announcement.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_announcement') }}</a>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-no-sort">
	        <thead>
	        <tr>
	          <th>{{ trans('app.body') }}</th>
	          <th>{{ trans('app.author') }}</th>
	          <th>{{ trans('app.action_text') }}</th>
	          <th>{{ trans('app.action_url') }}</th>
	          <th>{{ trans('app.created_at') }}</th>
	          <th>&nbsp;</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($announcements as $announcement )
			        <tr>
			          <td>{!! $announcement->parsed_body !!}</td>
			          <td>{{ $announcement->creator->getName() }}</td>
			          <td>{{ $announcement->action_text }}</td>
			          <td>{{ $announcement->action_url }}</td>
			          <td>{{ $announcement->created_at->diffForHumans() }}</td>
			          <td class="row-options text-muted small">
		                    <a href="{{ route('admin.setting.announcement.edit', $announcement->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
		                    {!! Form::open(['route' => ['admin.setting.announcement.destroy', $announcement->id], 'method' => 'delete', 'class' => 'data-form']) !!}
		                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
							{!! Form::close() !!}
			          </td>
			        </tr>
		        @endforeach
	        </tbody>
	      </table>
	    </div> <!-- /.box-body -->
	</div> <!-- /.box -->
@endsection
