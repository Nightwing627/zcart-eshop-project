<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>

    	    <dir class="spacer30"></dir>

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
					{{ trans('app.customer') }}
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
				            @if(count($cart->inventories) > 0)
								@foreach($cart->inventories as $item )
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
										<td>{{ number_format($item->pivot->unit_price, 2) }}</td>
										<td>{{ $item->pivot->quantity * $item->pivot->unit_price }}</td>
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
								<td style="width: 75%;">{{ $cart->created_at->toDayDateTimeString() }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.tax') }}:</th>
								<td style="width: 75%;">{{ $cart->tax->name }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.carrier') }}:</th>
								<td style="width: 75%;">{{ $cart->carrier->name }}</td>
							</tr>
							@if($cart->message_to_customer)
								<tr>
									<th class="text-right">{{ trans('app.message_to_customer') }}: </th>
									<td style="width: 75%;">{!! $cart->message_to_customer !!}</td>
								</tr>
							@endif
							@if($cart->admin_note)
								<tr>
									<th class="text-right">{{ trans('app.admin_note') }}: </th>
									<td style="width: 75%;">{!! $cart->admin_note !!}</td>
								</tr>
							@endif
							<tr>
								<th class="text-right">{{ trans('app.shipping_address') }}: </th>
								<td style="width: 75%;">{{ $cart->shipping_address }}</td>
							</tr>
							<tr>
								<th class="text-right">{{ trans('app.billing_address') }}:</th>
								<td style="width: 75%;">{{ $cart->billing_address }}</td>
							</tr>
						</table>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_3">

					    <div class="row">
				            <div class="col-md-3 nopadding">
								<img src="{{ get_image_src($cart->customer->id, 'customers', '35x35') }}" class="thumbnail" width="60%" alt="{{ trans('app.avatar') }}">
							</div>
				            <div class="col-md-9 nopadding">
				        	    <dir class="spacer20"></dir>
								<table class="table no-border">
									<tr>
										<th class="text-right">{{ trans('app.name') }}: </th>
										<td style="width: 75%;">{{ $cart->customer->name }}</td>
									</tr>
									<tr>
										<th class="text-right">{{ trans('app.nice_name') }}: </th>
										<td style="width: 75%;">{{ $cart->customer->nice_name }}</td>
									</tr>
									<tr>
										<th class="text-right">{{ trans('app.email') }}:</th>
										<td style="width: 75%;">{{ $cart->customer->email }}</td>
									</tr>
									<tr>
										<th class="text-right">{{ trans('app.member_since') }}:</th>
										<td style="width: 75%;">{{ $cart->customer->created_at->toFormattedDateString() }}</td>
									</tr>
								</table>
							</div>
					    </div>

						<h4>{{ trans('app.addresses') }}</h4>
						<table class="table table-bordered">
							<tr>
								@foreach($cart->customer->addresses as $address)
									<td>{!! $address->toHtml() !!}</td>
								@endforeach
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