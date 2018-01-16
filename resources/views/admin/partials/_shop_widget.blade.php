<div class="admin-user-widget">
    <span class="admin-user-widget-img">
        <img src="{{ get_image_src($shop->id, 'shops', '150x150') }}" class="thumbnail" alt="{{ trans('app.image') }}">
    </span>

    <div class="admin-user-widget-content">

        <span class="admin-user-widget-title">
            {{ trans('app.shop') . ': ' . $shop->name }}
        </span>
        <span class="admin-user-widget-text text-muted">
            {{ trans('app.owner') . ': ' . $shop->owner->name }}
        </span>
        <span class="admin-user-widget-text text-muted">
            {{ trans('app.email') . ': ' . $shop->email }}
        </span>
        <span class="admin-user-widget-text text-muted">
            {{ trans('app.phone') . ': ' . $shop->primaryAddress->phone }}
        </span>

        @can('view', $shop)
            <a href="{{ route('admin.vendor.shop.show', $shop->id) }}" class="ajax-modal-btn small">{{ trans('app.view_detail') }}</a>
        @endcan

        <span class="pull-right" style="margin-top: -60px;margin-right: 30px;font-size: 40px; color: rgba(0, 0, 0, 0.2);">
            <i class="fa fa-check-square-o"></i>
        </span>
    </div>            <!-- /.admin-user-widget-content -->
</div>          <!-- /.admin-user-widget -->
