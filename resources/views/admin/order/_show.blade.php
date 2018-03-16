<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

            <div class="col-md-3 nopadding" style="margin-top: 10px;">
				<img src="{{ get_image_src($order->customer_id, 'customers', 'medium') }}" class="thumbnail" width="80%" alt="{{ trans('app.avatar') }}">
			</div>
            <div class="col-md-9 nopadding">
            	<div class="spacer10"></div>
				<table class="table no-border">
					<tr>
						<th class="text-right">{{ trans('app.customer') }}: </th>
						<td style="width: 75%;"><span class="lead">{{ $order->customer->getName() }}</span></td>
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

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#info_tab" data-toggle="tab">
					{{ trans('app.order_info') }}
				  </a></li>
				  <li><a href="#items_tab" data-toggle="tab">
					{{ trans('app.items') }}
				  </a></li>
				  <li><a href="#invoice_tab" data-toggle="tab">
					{{ trans('app.invoice') }}
				  </a></li>
				  @if($order->refunds)
					  <li><a href="#refund_tab" data-toggle="tab">
						{{ trans('app.refund') }}
					  </a></li>
				  @endif
				  <li><a href="#shipping_tab" data-toggle="tab">
					{{ trans('app.shipping') }}
				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="info_tab">
						<table class="table no-border">
							<tr>
								<th class="text-right">{{ trans('app.order_number') }}: </th>
								<td style="width: 75%;">
									<span class="lead">{{ $order->order_number }}</span>
									@if($order->disputed)
										<span class="label label-danger indent10">{{ trans('app.statuses.disputed') }}</span>
									@endif
								</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.status') }}:</th>
								<td style="width: 75%;">
									{{ $order->orderStatus ? $order->orderStatus->name : trans('app.statuses.new') }}
								</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.order_date') }}:</th>
								<td style="width: 75%;">{{ $order->created_at->toDayDateTimeString() }}</td>
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
						</table>
				    </div>
				    <!-- /.tab-pane -->

				    <div class="tab-pane" id="items_tab">
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
												<img src="{{ get_image_src($item->pivot->inventory_id, 'inventories', 'small') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
											@else
												<img src="{{ get_image_src($item->product->id, 'products', 'small') }}" class="img-circle img-sm" alt="{{ trans('app.image') }}">
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

				    <div class="tab-pane" id="invoice_tab">
						<table class="table no-border">
							<tr>
								<th class="text-right">{{ trans('app.grand_total') }}:</th>
								<td style="width: 75%;"><span class="lead"> {{ get_formated_currency($order->grand_total) }}</span></td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.total') }}:</th>
								<td style="width: 75%;">{{ get_formated_currency($order->total) }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.discount') }}:</th>
								<td style="width: 75%;"> - {{ get_formated_currency($order->discount) }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.shipping') }}:</th>
								<td style="width: 75%;">{{ get_formated_currency($order->shipping) }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.handling') }}:</th>
								<td style="width: 75%;">{{ get_formated_currency($order->handling) }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.taxes') }}:</th>
								<td style="width: 75%;">{{ get_formated_currency($order->taxes) }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.payment_method') }}:</th>
								<td style="width: 75%;">{{ $order->paymentMethod->name }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.payment_status') }}:</th>
								<td style="width: 75%;">{{ $order->paymentStatus->name }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.billing_address') }}:</th>
								<td style="width: 75%;">{{ $order->billing_address }}</td>
							</tr>
						</table>
					</div>
				    <!-- /.tab-pane -->

				    <div class="tab-pane" id="refund_tab">
						<table class="table table-hover table-option">
							<thead>
								<tr>
									<th>{{ trans('app.return_goods') }}</th>
									<th>{{ trans('app.order_amount') }}</th>
									<th>{{ trans('app.refund_amount') }}</th>
									<th>{{ trans('app.status') }}</th>
									<th>{{ trans('app.created_at') }}</th>
									<th>{{ trans('app.updated_at') }}</th>
								</tr>
							</thead>
							<tbody>
								@foreach($order->refunds as $refund )
									<tr>
										<td>{!! get_yes_or_no($refund->return_goods) !!}</td>
										<td>{{ get_formated_currency($refund->order->total) }}</td>
										<td>{{ get_formated_currency($refund->amount) }}</td>
										<td>{!! $refund->statusName() !!}</td>
							          	<td>{{ $refund->created_at->diffForHumans() }}</td>
							          	<td>{{ $refund->updated_at->diffForHumans() }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
				    </div>
				    <!-- /.tab-pane -->

				    <div class="tab-pane" id="shipping_tab">
						<table class="table no-border">
							@if($order->shippingRate)
								<tr>
									<th class="text-right">{{ trans('app.carrier') }}:</th>
									<td style="width: 75%;">
										{{ $order->shippingRate->name }}
										@if($order->carrier)
									    	<small class="indent20"> {{ trans('app.by') . ' ' . $order->carrier->name }} </small>
										@endif
									</td>
								</tr>
							@endif
							@if($order->shippingPackage)
								<tr>
									<th class="text-right">{{ trans('app.packaging') }}:</th>
									<td style="width: 75%;">{{ $order->shippingPackage->name }}</td>
								</tr>
							@endif
							@if($order->shipping_date)
								<tr>
									<th class="text-right">{{ trans('app.shipping_date') }}:</th>
									<td style="width: 75%;">{{ $order->shipping_date }}</td>
								</tr>
							@endif
							<tr>
								<th class="text-right">{{ trans('app.tracking_id') }}:</th>
								<td style="width: 75%;">{{ $order->tracking_id }}</td>
							</tr>
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