@extends('admin.layouts.master')

@section('buttons')
	@can('create', App\CategoryGroup::class)
		<a href="{{ route('admin.catalog.categoryGroup.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_category_group') }}</a>
	@endcan
@endsection

@section('content')
	<div class="box">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{ trans('app.category_groups') }}</h3>
	      <div class="box-tools pull-right">
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-hover table-option">
	        <thead>
	        <tr>
	          <th>{{ trans('app.category_group') }}</th>
	          <th style="width: 35%;">{{ trans('app.sub_groups') }}</th>
	          <th>{{ trans('app.status') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($categoryGrps as $categoryGrp )
			        <tr>
			          <td>
			          	<h5>{{ $categoryGrp->name }}</h5>
			          	@if($categoryGrp->description)
				          	<span class="excerpt-td small">{!! str_limit($categoryGrp->description, 150) !!}</span>
			          	@endif
			          </td>
			          <td>
				          	<span class="label label-default">{{ $categoryGrp->sub_groups_count }}</span>
				      </td>
			          <td>{{ ($categoryGrp->active) ? trans('app.active') : trans('app.inactive') }}</td>
			          <td class="row-options">
						@can('update', $categoryGrp)
	                	    <a href="{{ route('admin.catalog.categoryGroup.edit', $categoryGrp->id) }}"  class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.edit') }}" class="fa fa-edit"></i></a>&nbsp;
						@endcan

						@can('delete', $categoryGrp)
		                    {!! Form::open(['route' => ['admin.catalog.categoryGroup.trash', $categoryGrp->id], 'method' => 'delete', 'class' => 'data-form']) !!}
		                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
							{!! Form::close() !!}
						@endcan
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
	          <th>{{ trans('app.category_group') }}</th>
	          <th>{{ trans('app.sub_group') }}</th>
	          <th>{{ trans('app.deleted_at') }}</th>
	          <th>{{ trans('app.option') }}</th>
	        </tr>
	        </thead>
	        <tbody>
		        @foreach($trashes as $trash )
			        <tr>
			          <td>{{ $trash->name }}</td>
			          <td>{{ $trash->sub_groups_count }}</td>
			          <td>{{ $trash->deleted_at->diffForHumans() }}</td>
			          <td class="row-options">
						@can('delete', $trash)
	                	    <a href="{{ route('admin.catalog.categoryGroup.restore', $trash->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.restore') }}" class="fa fa-database"></i></a>&nbsp;

		                    {!! Form::open(['route' => ['admin.catalog.categoryGroup.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']) !!}
		                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
							{!! Form::close() !!}
						@endcan
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