@extends('admin.layouts.master')

@section('buttons')
	<a href="{{ route('admin.catalog.category.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_category') }}</a>
@endsection

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.categories') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-2nd-short">
	        <thead>
	        <tr>
			  <th>{{ trans('app.image') }}</th>
	          <th>{{ trans('app.category_name') }}</th>
	          <th>{{ trans('app.parents') }}</th>
	          <th>{{ trans('app.product') }}</th>
	          <th>{{ trans('app.status') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($categories as $category )
			        <tr>
			          <td>
						<img src="{{ get_image_src($category->id, 'categories', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
			          </td>
			          <td>
			          	<h5>{{ $category->name }}</h5>
			          	@if($category->description)
				          	<p class="excerpt-td small">{!! str_limit($category->description, 150) !!}</p>
			          	@endif
			          </td>
			          <td>
			          	@foreach($category->subGroups as $subGroup)
				          	<span class="label label-outline">{{ $subGroup->name }}</span>
				        @endforeach
			          </td>
			          <td>{{ $category->products_count }}</td>
			          <td>{{ ($category->active) ? trans('app.active') : trans('app.inactive') }}</td>
			          <td class="row-options">
	                    <a href="{{ route('admin.catalog.category.edit', $category->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;

	                    {!! Form::open(['route' => ['admin.catalog.category.trash', $category->id], 'method' => 'delete', 'class' => 'data-form']) !!}
	                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
						{!! Form::close() !!}
			          </td>
			        </tr>
		        @endforeach
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	</div>
	<!-- /.box -->

	<div class="box collapsed-box">
	    <div class="box-header with-border">
	      <h3 class="box-title"><i class="fa fa-trash-o"></i>{{ trans('app.trash') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-option">
	        <thead>
	        <tr>
	          <th>{{ trans('app.category_name') }}</th>
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
				          	<p class="excerpt-td small">{!! str_limit($trash->description, 150) !!}</p>
			          	@endif
			          </td>
			          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
			          <td class="row-options">
	                    <a href="{{ route('admin.catalog.category.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

	                    {!! Form::open(['route' => ['admin.catalog.category.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
	                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
						{!! Form::close() !!}
			          </td>
			        </tr>
		        @endforeach
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	</div>
	<!-- /.box -->

@endsection