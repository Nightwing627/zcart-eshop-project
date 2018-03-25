@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\Blog::class)
		<a href="{{ route('admin.exim', 'blogs') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.exim') }}</a>
		<a href="{{ route('admin.blog.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_blog') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.blogs') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div> <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-option">
	        <thead>
	        <tr>
	          <th>{{ trans('app.image') }}</th>
	          <th>{{ trans('app.blog_title') }}</th>
	          <th>{{ trans('app.author') }}</th>
	          <th><i class="fa fa-comments"></i></th>
	          <th>{{ trans('app.status') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($blogs as $blog )
			        <tr>
			          <td>
						<img src="{{ get_storage_file_url(optional($blog->image)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.logo') }}">
			          </td>
			          <td>
				          	<strong>{!! $blog->title !!}</strong>
				          	<span class="excerpt-td">{!! $blog->excerpt !!}</span>
			          </td>
			          <td>{{ $blog->author->getName() }}</td>
			          <td>{{ $blog->comments_count }}</td>
			          <td>
			          	@if($blog->status)
				          	{{ trans('app.published') }}
				        @else
				          	 {{ trans('app.draft') }}
				        @endif
				      </td>
			          <td class="row-options">
						@can('update', $blog)
		                    <a href="{{ route('admin.blog.edit', $blog->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
						@endcan
						@can('delete', $blog)
		                    {!! Form::open(['route' => ['admin.blog.trash', $blog->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
	          <th>{{ trans('app.image') }}</th>
	          <th>{{ trans('app.blog_title') }}</th>
	          <th>{{ trans('app.author') }}</th>
	          <th>{{ trans('app.deleted_at') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($trashes as $trash )
			        <tr>
			          <td>
						<img src="{{ get_storage_file_url(optional($trash->image)->path, 'tiny') }}" class="img-circle img-sm" alt="{{ trans('app.logo') }}">
			          </td>
			          <td>
				          	<strong>{!! $trash->title !!}</strong>
				          	<span class="excerpt-td">{!! $trash->excerpt !!}</span>
			          </td>
			          <td>{{ $trash->user->getName() }}</td>
			          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
			          <td class="row-options">
						@can('delete', $trash)
		                    <a href="{{ route('admin.blog.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;
		                    {!! Form::open(['route' => ['admin.blog.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
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
