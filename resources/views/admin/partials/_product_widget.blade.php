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
        <span class="pull-right" style="margin-top: -60px;margin-right: 30px;font-size: 40px; color: rgba(0, 0, 0, 0.2);">
            <i class="fa fa-check-square-o"></i>
        </span>
    </div>            <!-- /.admin-user-widget-content -->
</div>          <!-- /.admin-user-widget -->
