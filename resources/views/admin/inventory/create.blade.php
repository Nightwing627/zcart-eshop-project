@extends('admin.layouts.master')

@section('buttons')
    @can('create', App\Category::class)
        <a href="{{ route('admin.import', 'inventory') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.exim') }}</a>

        <a href="{{ route('admin.stock.inventory.showSearchForm') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.search_again') }}</a>
    @endcan

    @can('create', App\Product::class)
        <a href="{{ route('admin.catalog.product.create') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.add_product') }}</a>
    @endcan
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.stock.inventory.store', 'files' => true, 'id' => 'form-ajax-upload', 'data-toggle' => 'validator']) !!}

        @include('admin.inventory._form')

    {!! Form::close() !!}
@endsection

@section('page-script')
    @include('plugins.dropzone-upload')
@endsection