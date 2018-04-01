<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>
			<div class="card hovercard">
			    <div class="card-background">
					<img src="{{ get_storage_file_url(optional($customer->image)->path, 'medium') }}" class="card-bkimg img-circle" alt="{{ trans('app.avatar') }}">
			    </div>
			    <div class="useravatar">
		            @if($customer->image)
						<img src="{{ get_storage_file_url(optional($customer->image)->path, 'small') }}" class="img-circle" alt="{{ trans('app.avatar') }}">
		            @else
	            		<img src="{{ get_gravatar_url($customer->email, 'small') }}" class="img-circle" alt="{{ trans('app.avatar') }}">
		            @endif
			    </div>
			    <div class="card-info">
			        <span class="card-title">{{ $customer->getName() }}</span>
			    </div>
			</div>

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#tab_1" data-toggle="tab">
				  	{{ trans('app.basic_info') }}
				  </a></li>
				  <li><a href="#desc_tab" data-toggle="tab">
				  	{{ trans('app.description') }}
				  </a></li>
				  <li><a href="#address_tab" data-toggle="tab">
				  	{{ trans('app.addresses') }}
				  </a></li>
				  <li><a href="#orders_tab" data-toggle="tab">
				  	{{ trans('app.latest_orders') }}
				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="tab_1">
				        <table class="table">
				            @if($customer->nice_name)
				                <tr>
				                	<th>{{ trans('app.nice_name') }}: </th>
				                	<td>{{ $customer->nice_name }}</td>
				                </tr>
				            @endif
				            @if($customer->name)
				                <tr>
				                	<th>{{ trans('app.full_name') }}: </th>
				                	<td>{{ $customer->name }}</td>
				                </tr>
				            @endif

			                <tr>
			                	<th>{{ trans('app.email') }}: </th>
			                	<td>{{ $customer->email }}</td>
			                </tr>

				            @if($customer->dob)
				                <tr>
				                	<th>{{ trans('app.dob') }}: </th>
				                	<td>{!! date('F j, Y', strtotime($customer->dob)) . '<small> (' . get_age($customer->dob) . ')</small>' !!}</td>
				                </tr>
				            @endif

				            @if($customer->sex)
				                <tr>
				                	<th>{{ trans('app.sex') }}: </th>
				                	<td>{!! get_formated_gender($customer->sex) !!}</td>
				                </tr>
				            @endif

			                <tr>
			                	<th>{{ trans('app.status') }}: </th>
			                	<td>{{ ($customer->active) ? trans('app.active') : 	trans('app.inactive') }}</td>
			                </tr>

				            @if($customer->created_at)
				                <tr>
				                	<th>{{ trans('app.member_since') }}: </th>
				                	<td>{{ $customer->created_at->diffForHumans() }}</td>
				                </tr>
				            @endif
				        </table>
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="desc_tab">
			            {!! $customer->description or trans('app.info_not_found') !!}
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="address_tab">
				    	@foreach($customer->addresses as $address)

					        {!! $address->toHtml() !!}

				    		@unless($loop->last)
						        <hr/>
					        @endunless
				    	@endforeach
				        <br/>
	            		@if(config('system_settings.address_geocode') && $customer->primaryAddress)
					        <div class="row">
			                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q={{ urlencode($customer->primaryAddress->toGeocodeString()) }}&output=embed"></iframe>
					        </div>
					        <div class="help-block" style="margin-bottom: -10px;"><i class="fa fa-warning"></i> {{ trans('app.map_location') }}</div>
				       	@endif
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="orders_tab">
						<table class="table table-hover table-2nd-short">
							<thead>
								<tr>
									<th>{{ trans('app.order_number') }}</th>
									<th>{{ trans('app.grand_total') }}</th>
									<th>{{ trans('app.payment') }}</th>
									<th>{{ trans('app.status') }}</th>
									<th>{{ trans('app.order_date') }}</th>
								</tr>
							</thead>
							<tbody>
								@foreach($customer->latest_orders as $order )
									<tr>
										<td>{{ get_formated_order_number($order->order_number) }}</td>
										<td>{{ get_formated_currency($order->grand_total)}}</td>
										<td>{!! $order->paymentStatusName() !!}</td>
										<td>{{ optional($order->status)->name }}</td>
								        <td>{{ $order->created_at->toFormattedDateString() }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
				    </div> <!-- /.tab-pane -->
				</div> <!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->