@extends('admin.layouts.master')

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.languages') }}</h3>
	      <div class="box-tools pull-right">
			@can('create', App\Language::class)
				<a href="javascript:void(0)" data-link="{{ route('admin.setting.language.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_language') }}</a>
			@endcan
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-no-sort">
	        <thead>
	        <tr>
	          <th>{{ trans('app.language') }}</th>
	          <th>{{ trans('app.code') }}</th>
	          <th>{{ trans('app.php_locale_code') }}</th>
	          <th>&nbsp;</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($languages as $language )
			        <tr>
			          <td width="45%">
			              	<img src="{{ asset(sys_image_path('flags') . array_slice(explode('_', $language->php_locale_code), -1)[0] . '.png') }}" class="lang-flag small" alt="{{ $language->code }}">
			              	<span class="indent10">{{ $language->language }}</span>
				          	@if($language->rtl)
					          	<span class="indent10 label label-primary pull-right">{{ trans('app.rtl') }}</span>
					        @endif
				          	@unless($language->active)
					          	<span class="indent10 label label-default pull-right">{{ trans('app.inactive') }}</span>
					        @endunless
			          </td>
			          <td>{!! $language->code !!}</td>
			          <td>{!! $language->php_locale_code !!}</td>
			          <td class="row-options text-muted small">
							@can('update', $language)
			                    <a href="javascript:void(0)" data-link="{{ route('admin.setting.language.edit', $language) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
							@endcan
						@can('delete', $language)
							@if(in_array($language->id, config('system.freeze.languages')))
								<i class="fa fa-bell-o text-muted" data-toggle="tooltip" data-placement="left" title="{{ trans('messages.freezed_model') }}" ></i>
							@else
			                    {!! Form::open(['route' => ['admin.setting.language.trash', $language], 'method' => 'delete', 'class' => 'data-form']) !!}
			                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
								{!! Form::close() !!}
							@endif
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
	      <h3 class="box-title"><i class="fa fa-trash-o"></i> {{ trans('app.trash') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-2nd-short">
	        <thead>
	        <tr>
	          <th>{{ trans('app.language') }}</th>
	          <th>{{ trans('app.code') }}</th>
			  <th>{{ trans('app.deleted_at') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($trashes as $trash )
			        <tr>
			          <td width="45%">
			              	<img src="{{ asset(sys_image_path('flags') . array_slice(explode('_', $trash->php_locale_code), -1)[0] . '.png') }}" class="lang-flag small" alt="{{ $trash->code }}">
			              	<span class="indent10">{{ $trash->language }}</span>
				          	@if($trash->rtl)
					          	<span class="indent10 label label-primary pull-right">{{ trans('app.rtl') }}</span>
					        @endif
			          </td>
			          <td>{!! $trash->code !!}</td>
			          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
			          <td class="row-options text-muted small">
						@can('delete', $trash)
		                    <a href="{{ route('admin.setting.language.restore', $trash) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;
		                    {!! Form::open(['route' => ['admin.setting.language.destroy', $trash], 'method' => 'delete', 'class' => 'data-form']) !!}
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