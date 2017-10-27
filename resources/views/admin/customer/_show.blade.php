<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>
			<div class="card hovercard">
			    <div class="card-background">

					<img src="{{ get_image_src($customer->id, 'customers', '150x150') }}" class="card-bkimg img-circle" alt="{{ trans('app.avatar') }}">

			    </div>
			    <div class="useravatar">

					<img src="{{ get_image_src($customer->id, 'customers', '150x150') }}" class="img-circle" alt="{{ trans('app.avatar') }}">

			    </div>
			    <div class="card-info">
			        <span class="card-title">{{ $customer->name or $customer->nice_name }}</span>
			    </div>
			</div>

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#tab_1" data-toggle="tab">
				  	{{ trans('app.basic_info') }}
				  </a></li>
				  <li><a href="#tab_2" data-toggle="tab">
				  	{{ trans('app.description') }}
				  </a></li>
				  <li><a href="#tab_3" data-toggle="tab">
				  	{{ trans('app.addresses') }}
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
				    <div class="tab-pane" id="tab_2">
			            {!! $customer->description or trans('app.info_not_found') !!}
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_3">
				    	@foreach($customer->addresses as $address)

					        {!! $address->toHtml() !!}

				    		@unless($loop->last)
						        <hr/>
					        @endunless
				    	@endforeach
				        <br/>
	            		@if(config('system_settings.address_geocode'))
					        <div class="row">
			                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q={{ urlencode($customer->primaryAddress->toString()) }}&output=embed"></iframe>
					        </div>
					        <div class="help-block" style="margin-bottom: -10px;"><i class="fa fa-warning"></i> {{ trans('app.map_location') }}</div>
				       	@endif
				    </div> <!-- /.tab-pane -->
				</div> <!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->