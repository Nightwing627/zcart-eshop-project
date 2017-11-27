@extends('admin.layouts.master')

@section('buttons')
    @can('create', App\Category::class)
        <a href="{{ route('admin.import', 'inventory') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.exim') }}</a>

        <a href="{{ route('admin.stock.inventory.showSearchForm') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.search_again') }}</a>
    @endcan

    @can('create', App\Product::class)
        <a href="{{ route('admin.catalog.product.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_product') }}</a>
    @endcan
@endsection

@section('content')

    @include('admin.partials._product_widget')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{ trans('app.add_inventory') }}
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div> <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'admin.stock.inventory.store', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']) !!}

                @include('admin.inventory._form')

                {!! Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-lg btn-new pull-right']) !!}
            {!! Form::close() !!}
        </div> <!-- /.box-body -->
    </div> <!-- /.box -->
@endsection

@section('page-script')
    <script language="javascript" type="text/javascript">
      ;(function($, window, document) {
        var errHelp = '<div class="help-block with-errors"></div>';
        $('#offer_price').keyup(
            function(){
                var offerPrice = this.value;

                if (offerPrice !== "")
                {
                    $('#offer_start').attr('required', 'required');
                    $('#offer_end').attr('required', 'required');
                }else
                {
                    $('#offer_start').removeAttr('required');
                    $('#offer_end').removeAttr('required');
                }
            }
        );
      }(window.jQuery, window, document));
    </script>
@endsection