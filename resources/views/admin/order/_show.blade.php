<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-3 nopadding" style="margin-top: 10px;">
				<img src="{{ get_image_src($order->customer->id, 'customers', '150x150') }}" class="thumbnail" width="80%" alt="{{ trans('app.avatar') }}">
			</div>
            <div class="col-md-9 nopadding">
        	    <dir class="spacer20"></dir>
				<table class="table no-border">
					<tr>
						<th class="text-right">{{ trans('app.customer') }}: </th>
						<td style="width: 75%;">{{ $order->customer->name }}</td>
					</tr>
					<tr>
						<th class="text-right">{{ trans('app.email') }}:</th>
						<td style="width: 75%;">{{ $order->customer->email }}</td>
					</tr>
					<tr>
						<th class="text-right">{{ trans('app.member_since') }}:</th>
						<td style="width: 75%;">{{ $order->customer->created_at->toFormattedDateString() }}</td>
					</tr>
					<tr>
						<th class="text-right">{{ trans('app.order_date') }}:</th>
						<td style="width: 75%;">{{ $order->created_at->toDayDateTimeString() }}</td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12">

	    	        @include('admin.partials._cart_summary')

				</div>
			</div>

    	    <dir class="spacer30"></dir>

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#tab_1" data-toggle="tab">
					{{ trans('app.items') }}
				  </a></li>
				  <li><a href="#tab_2" data-toggle="tab">
					{{ trans('app.additional_info') }}
				  </a></li>
				  <li><a href="#tab_3" data-toggle="tab">
					{{ trans('app.shipping') }}
				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="tab_1">
					    <table class="table table-sripe">
					      <thead>
					        <tr>
					          <th>{{ trans('app.image') }}</th>
					          <th>{{ trans('app.description') }}</th>
					          <th>{{ trans('app.quantity') }}</th>
					          <th>{{ trans('app.price') }}</th>
					          <th>{{ trans('app.total') }}</th>
					        </tr>
					      </thead>
					      <tbody id="items">
				            @if(count($order->inventories) > 0)
								@foreach($order->inventories as $item )
									<tr>
										<td>
										  	@if(File::exists(image_path('inventories') . $item->pivot->inventory_id . '_35x35.png'))
												<img src="{{ get_image_src($item->pivot->inventory_id, 'inventories', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
											@else
												<img src="{{ get_image_src($item->product->id, 'products', '35x35') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
											@endif
										</td>
										<td>{{ $item->pivot->item_description }}</td>
										<td>{{ $item->pivot->quantity }}</td>
										<td>{{ get_formated_currency($item->pivot->unit_price) }}</td>
										<td>{{ get_formated_currency($item->pivot->quantity * $item->pivot->unit_price) }}</td>
									</tr>
								@endforeach
							@else
						        <tr id='empty-cart'><td colspan="5">{{ trans('help.empty_cart') }}</td></tr>
							@endif
					      </tbody>
					    </table>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_2">
						<table class="table no-border">
							<tr>
								<th class="text-right">{{ trans('app.created_at') }}:</th>
								<td style="width: 75%;">{{ $order->created_at->toDayDateTimeString() }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.tax') }}:</th>
								<td style="width: 75%;">{{ $order->tax->name }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.carrier') }}:</th>
								<td style="width: 75%;">{{ $order->carrier->name }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.payment_method') }}:</th>
								<td style="width: 75%;">{{ $order->paymentMethod->name }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.payment_status') }}:</th>
								<td style="width: 75%;">{{ $order->paymentStatus->name }}</td>
							</tr>
							@if($order->message_to_customer)
								<tr>
									<th class="text-right">{{ trans('app.message_to_customer') }}: </th>
									<td style="width: 75%;">{!! $order->message_to_customer !!}</td>
								</tr>
							@endif
							@if($order->admin_note)
								<tr>
									<th class="text-right">{{ trans('app.admin_note') }}: </th>
									<td style="width: 75%;">{!! $order->admin_note !!}</td>
								</tr>
							@endif
							<tr>
								<th class="text-right">{{ trans('app.billing_address') }}:</th>
								<td style="width: 75%;">{{ $order->billing_address }}</td>
							</tr>
						</table>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_3">
						<table class="table no-border">
							<tr>
								<th class="text-right">{{ trans('app.shipping_address') }}: </th>
								<td style="width: 75%;">{{ $order->shipping_address }}</td>
							</tr>
						</table>
				    </div>
				  	<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
        </div> <!-- / .modal-body -->
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->