<div class="admin-user-widget">
    <span class="admin-user-widget-img">
        <img src="{{ get_image_src($customer->id, 'customers', '150x150') }}" class="thumbnail" alt="{{ trans('app.avatar') }}">
    </span>

    <div class="admin-user-widget-content">

        <span class="admin-user-widget-title">
            {{ trans('app.customer') . ': ' . $customer->name }}
        </span>
        <span class="admin-user-widget-text text-muted">
            {{ trans('app.email') . ': ' . $customer->email }}
        </span>
        @if($customer->primaryAddress)
            <span class="admin-user-widget-text text-muted">
                {{ trans('app.phone') . ': ' . $customer->primaryAddress->phone }}
            </span>
            <span class="admin-user-widget-text text-muted">
                {{ trans('app.zip_code') . ': ' . $customer->primaryAddress->zip_code }}
            </span>
        @endif

        @can('view', $customer)
            <a href="{{ route('admin.admin.customer.show', $customer->id) }}" class="ajax-modal-btn small">{{ trans('app.view_detail') }}</a>
        @endcan

        <span class="pull-right" style="margin-top: -60px;margin-right: 30px;font-size: 40px; color: rgba(0, 0, 0, 0.2);">
            <i class="fa fa-check-square-o"></i>
        </span>
    </div>            <!-- /.admin-user-widget-content -->
</div>          <!-- /.admin-user-widget -->