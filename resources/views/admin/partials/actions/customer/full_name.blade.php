@can('view', $customer)
    <a href="javascript:void(0)" data-link="{{ route('admin.admin.customer.show', $customer->id) }}" class="ajax-modal-btn modal-btn">{{ $customer->name }}</a>
@else
	{{ $customer->name }}
@endcan