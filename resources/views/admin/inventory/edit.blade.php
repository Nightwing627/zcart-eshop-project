@extends('admin.layouts.master')

@section('buttons')
    @can('index', App\Inventory::class)
        <a href="{{ route('admin.stock.inventory.index') }}" class="btn btn-new btn-flat">{{ trans('app.form.cancel_update') }}</a>
    @endcan
@endsection

@section('content')
    {!! Form::model($inventory, ['method' => 'POST', 'route' => ['admin.stock.inventory.update', $inventory->id], 'files' => true, 'id' => 'form-ajax-upload', 'data-toggle' => 'validator']) !!}

        @include('admin.inventory._form')

    {!! Form::close() !!}
@endsection

@section('page-script')
    @include('plugins.dropzone-upload')
@endsection