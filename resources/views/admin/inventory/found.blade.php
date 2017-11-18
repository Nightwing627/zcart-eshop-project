@extends('admin.layouts.master')

@section('buttons')
    @can('index', App\Inventory::class)
        <a href="{{ route('admin.stock.inventory.index') }}" class="btn btn-new btn-flat">{{ trans('app.back_to_inventory') }}</a>
    @endcan
    @can('create', App\Inventory::class)
        <a href="{{ route('admin.stock.inventory.search') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.search_again') }}</a>
    @endcan

    @can('create', App\Product::class)
        <a href="{{ route('admin.catalog.product.create') }}" data-target="myDynamicModal" data-toggle="modal" class="btn btn-new btn-flat">{{ trans('app.add_product') }}</a>
    @endcan
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{ trans('app.search_result') }}
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div> <!-- /.box-header -->

        <div class="box-body">
            @forelse($products as $product )
                <div class="admin-user-widget">
                    <span class="admin-user-widget-img">
                        <img src="{{ get_image_src($product->id, 'products', '150x150') }}" class="thumbnail" alt="{{ trans('app.image') }}">
                    </span>

                    <div class="admin-user-widget-content">
                        <span class="admin-user-widget-title">
                            {{ $product->name }}
                        </span>
                        <span class="admin-user-widget-text text-muted">
                            {{ $product->gtin_type.': '.$product->gtin }}
                        </span>
                        <span class="admin-user-widget-text text-muted">
                            {{ trans('app.model_number').': '.$product->model_number }}
                        </span>
                        <span class="admin-user-widget-text text-muted">
                            {{ trans('app.brand').': '.$product->brand }}
                        </span>

                        @can('view', $product)
                            <a href="{{ route('admin.catalog.product.show', $product->id) }}" data-target="myDynamicModal" data-toggle="modal" class="small">{{ trans('app.view_detail') }}</a>
                        @endcan

                        <span class="option-btn" style=" margin-top: -50px;">
                            @if($product->has_variant)
                                <a href="{{ route('admin.stock.inventory.setVariant', $product->id) }}" data-target="myDynamicModal" data-toggle="modal" class="btn bg-olive btn-flat">{{ trans('app.add_to_inventory_with_variant') }}</a>
                            @endif

                            <a href="{{ route('admin.stock.inventory.add', $product->id) }}" class="btn bg-purple btn-flat">{{ trans('app.add_to_inventory') }}</a>
                        </span>
                    </div>            <!-- /.admin-user-widget-content -->
                </div>          <!-- /.admin-user-widget -->
            @empty
                <p class="lead"><i class="fa fa-warning"></i> {{ trans('help.no_product_found') }}</p>
            @endforelse
        </div> <!-- /.box-body -->
    </div> <!-- /.box -->
@endsection