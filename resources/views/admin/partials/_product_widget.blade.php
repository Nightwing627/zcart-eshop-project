<div class="admin-user-widget">
    <span class="admin-user-widget-img">
        <img src="{{ get_image_src($product->id, 'products', 'medium') }}" class="thumbnail" alt="{{ trans('app.image') }}">
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
        <span class="admin-user-widget-text text-muted">
            {{ trans('app.manufacturer').': '.$product->manufacturer->name }}
        </span>
        <span class="pull-right" style="margin-top: -60px;margin-right: 30px;font-size: 40px; color: rgba(0, 0, 0, 0.2);">
            <i class="fa fa-check-square-o"></i>
        </span>
    </div>            <!-- /.admin-user-widget-content -->
</div>          <!-- /.admin-user-widget -->
